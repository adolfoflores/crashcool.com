<?php
// Funciones comunes de CrashCool.com
if (!defined('CC_INICIO')) define('CC_INICIO', microtime(true));
define('CC_RAIZ', dirname(__DIR__));
define('CC_DATOS', getenv('CC_DATOS') ?: CC_RAIZ . '/data');

// Tiempo de generacion de la pagina
function cc_tiempo($decimales)
{
    return round(microtime(true) - CC_INICIO, $decimales);
}

// Rangos de Cloudflare (https://www.cloudflare.com/ips/)
function cc_es_cloudflare($ip)
{
    static $rangos = array(
        '173.245.48.0/20', '103.21.244.0/22', '103.22.200.0/22', '103.31.4.0/22', '141.101.64.0/18',
        '108.162.192.0/18', '190.93.240.0/20', '188.114.96.0/20', '197.234.240.0/22', '198.41.128.0/17',
        '162.158.0.0/15', '104.16.0.0/13', '104.24.0.0/14', '172.64.0.0/13', '131.0.72.0/22',
        '2400:cb00::/32', '2606:4700::/32', '2803:f800::/32', '2405:b500::/32', '2405:8100::/32',
        '2a06:98c0::/29', '2c0f:f248::/32',
    );
    $binario = @inet_pton($ip);
    if ($binario === false) return false;
    foreach ($rangos as $rango) {
        list($red, $bits) = explode('/', $rango);
        $red = inet_pton($red);
        if (strlen($red) != strlen($binario)) continue;
        $bytes = intdiv((int) $bits, 8);
        $resto = $bits % 8;
        if (substr($binario, 0, $bytes) !== substr($red, 0, $bytes)) continue;
        if ($resto == 0) return true;
        $mascara = chr((0xFF << (8 - $resto)) & 0xFF);
        if (($binario[$bytes] & $mascara) === ($red[$bytes] & $mascara)) return true;
    }
    return false;
}

// IP del visitante. Detras de Coolify (Traefik) REMOTE_ADDR es el proxy inverso,
// asi que se usa la ultima IP que este anade a X-Forwarded-For.
function cc_cadena_proxies()
{
    $ips = array();
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        foreach (explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']) as $ip) {
            $ip = trim($ip);
            if (filter_var($ip, FILTER_VALIDATE_IP)) $ips[] = $ip;
        }
    }
    $saltos = (int) (getenv('CC_PROXIES_CONFIABLES') !== false ? getenv('CC_PROXIES_CONFIABLES') : 1);
    if (!$ips || $saltos <= 0) {
        $cadena = array(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0');
    } else {
        // Quitar los saltos confiables (Traefik ya anadio la IP que vio)
        $cadena = array_slice($ips, 0, max(1, count($ips) - $saltos + 1));
    }

    // Detras de Cloudflare, Traefik descarta su X-Forwarded-For y solo queda la IP del nodo de
    // Cloudflare; la del visitante llega en CF-Connecting-IP. Solo se acepta si la peticion
    // viene realmente de Cloudflare, para que no se pueda falsificar atacando el servidor directo.
    $cf = isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? trim($_SERVER['HTTP_CF_CONNECTING_IP']) : '';
    if ($cf !== '' && filter_var($cf, FILTER_VALIDATE_IP) && cc_es_cloudflare(end($cadena))) {
        array_pop($cadena);
        if (!$cadena || end($cadena) !== $cf) $cadena[] = $cf;
    }
    return $cadena;
}

function cc_ip()
{
    $cadena = cc_cadena_proxies();
    return end($cadena);
}

function cc_archivo_datos($nombre)
{
    if (!is_dir(CC_DATOS)) @mkdir(CC_DATOS, 0775, true);
    return CC_DATOS . '/' . $nombre;
}

// Lee y modifica un archivo de datos de forma atomica (serialize: la web es ISO-8859-1)
function cc_datos_actualizar($nombre, $inicial, $funcion)
{
    $fp = fopen(cc_archivo_datos($nombre), 'c+');
    if (!$fp) return $funcion($inicial);
    flock($fp, LOCK_EX);
    $contenido = stream_get_contents($fp);
    $datos = $contenido ? @unserialize($contenido, array('allowed_classes' => false)) : null;
    if (!is_array($datos)) $datos = $inicial;
    $datos = $funcion($datos);
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, serialize($datos));
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
    return $datos;
}

function cc_datos_leer($nombre, $inicial)
{
    $archivo = cc_archivo_datos($nombre);
    if (!is_file($archivo)) return $inicial;
    $datos = @unserialize((string) @file_get_contents($archivo), array('allowed_classes' => false));
    return is_array($datos) ? $datos : $inicial;
}

// Las semillas (datos archivados) se guardan en JSON UTF-8 y se pasan a ISO-8859-1
function cc_semilla($nombre)
{
    $archivo = CC_RAIZ . '/includes/semillas/' . $nombre . '.json';
    $datos = is_file($archivo) ? json_decode(file_get_contents($archivo), true) : null;
    if (!is_array($datos)) return array();
    array_walk_recursive($datos, function (&$valor) {
        if (is_string($valor)) $valor = mb_convert_encoding($valor, 'ISO-8859-1', 'UTF-8');
    });
    return $datos;
}

function cc_html($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'ISO-8859-1');
}
