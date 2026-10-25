<?php
// PhpTagCool 1.0.3 - tag-board de CrashCool.com
require_once __DIR__ . '/comun.php';
if (session_status() == PHP_SESSION_NONE) session_start();

define('TAG_MAX_MENSAJES', 40);   // mensajes que se visualizan
define('TAG_MAX_NICK', 30);
define('TAG_MAX_URL', 40);
define('TAG_MAX_TEXTO', 300);
define('TAG_ANTIFLOOD', 15);      // segundos minimos entre mensajes de la misma IP

function tag_smilies()
{
    return array(
        ":'(" => 'icon_cry.gif', '^:@' => 'icon_evil.gif', '^_-' => 'icon_frown.gif',
        ':)' => 'icon_smile.gif', '8|' => 'icon_rolleyes.gif', ':D' => 'icon_biggrin.gif',
        'O_O' => 'icon_eek.gif', '^^' => 'icon_cheesygrin.gif', ':P' => 'icon_razz.gif',
        'xD' => 'icon_lol.gif', ':?' => 'icon_confused.gif', ':|' => 'icon_neutral.gif',
        ':(' => 'icon_sad.gif', '!(' => 'icon_mad.gif', ':O' => 'icon_surprised.gif',
        '^)' => 'icon_twisted.gif', 'B)' => 'icon_cool.gif', ';)' => 'icon_wink.gif',
    );
}

function tag_censuradas()
{
    return array('gilipollas', 'cabron', 'puta', 'mierda', 'hijoputa', 'maricon');
}

function tag_nicks_protegidos()
{
    return array('crashcool');
}

// Mensajes archivados en web.archive.org mas los que ha escrito este visitante
function tag_datos($instancia)
{
    $propios = isset($_SESSION['tag_' . $instancia]) ? $_SESSION['tag_' . $instancia] : array();
    return array('mensajes' => array_merge($propios, cc_semilla('tag_' . $instancia)));
}

function tag_formatear_texto($texto)
{
    $html = cc_html($texto);
    foreach (tag_censuradas() as $palabra) {
        $html = preg_replace('/' . preg_quote(cc_html($palabra), '/') . '/i', str_repeat('*', strlen($palabra)), $html);
    }
    $reemplazos = array();
    foreach (tag_smilies() as $codigo => $gif) {
        $reemplazos[cc_html($codigo)] = '<img src="caritas/' . $gif . '" >';
    }
    return strtr($html, $reemplazos);
}

function tag_formatear_nick($nick, $url, $protegido)
{
    $nick_html = cc_html($nick) . ': ';
    if ($url != '') {
        $clase = $protegido ? ' class="nick_protegido_url"' : '';
        $nick_html = '<a href="' . cc_html($url) . '" target="_blank"' . $clase . '>' . $nick_html . '</a>';
    }
    return $nick_html;
}

// Devuelve un mensaje de error o '' si se publico
function tag_publicar($instancia, $nick, $url, $texto)
{
    $nick = trim(preg_replace('/\s+/', ' ', $nick));
    $texto = trim(str_replace("\r", '', $texto));
    $url = trim($url);
    if ($url == 'http://') $url = '';

    if ($nick == '' || $texto == '') return 'Debes escribir un nick y un mensaje';
    if (strlen($nick) > TAG_MAX_NICK) return 'El nick es demasiado largo';
    if (strlen($url) > TAG_MAX_URL) return 'La url es demasiado larga';
    if (strlen($texto) > TAG_MAX_TEXTO) return 'El mensaje es demasiado largo (max. ' . TAG_MAX_TEXTO . ' caracteres)';
    if (in_array(strtolower($nick), tag_nicks_protegidos())) return 'Ese nick est&aacute; registrado';

    if ($url != '') {
        if (filter_var($url, FILTER_VALIDATE_EMAIL)) {
            $url = 'mailto:' . $url;
        } elseif (!preg_match('#^https?://[^\s"<>]+$#i', $url)) {
            return 'La url/email no es v&aacute;lida';
        }
    }

    $ahora = time();
    $clave = 'tag_' . $instancia;
    if (isset($_SESSION[$clave . '_ultimo']) && $ahora - $_SESSION[$clave . '_ultimo'] < TAG_ANTIFLOOD) {
        return 'Espera ' . TAG_ANTIFLOOD . ' segundos entre mensaje y mensaje';
    }
    $propios = isset($_SESSION[$clave]) ? $_SESSION[$clave] : array();
    array_unshift($propios, array(
        'fecha' => date('j-n-Y (H:i:s)', $ahora),
        'clase' => 'nick_normal',
        'nick' => tag_formatear_nick($nick, $url, false),
        'texto' => tag_formatear_texto($texto),
    ));
    $_SESSION[$clave] = array_slice($propios, 0, TAG_MAX_MENSAJES);
    $_SESSION[$clave . '_ultimo'] = $ahora;
    return '';
}

function tag_mostrar($instancia, $error = '')
{
    $datos = tag_datos($instancia);
    $mensajes = array_slice($datos['mensajes'], 0, TAG_MAX_MENSAJES);
    if ($error != '') {
        echo '<center><span class="texto_mensaje"><font color="red"><b>' . $error . '</b></font></span></center>' . "\n";
    }
    echo '<center><table width="100%" align="center" border="0" cellpadding="0" cellspacing="1" bordercolor="#000000" bgcolor="#000000">' . "\n";
    foreach ($mensajes as $i => $m) {
        echo "<tr>\n";
        echo '<td width="100%" class=tabla' . ($i % 2 + 1) . '><span class="' . $m['clase'] . '" title="' . $m['fecha'] . '">'
            . $m['nick'] . '</span><span class="texto_mensaje"> ' . $m['texto'] . "</span></td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
    echo '<br><span class="texto_mensaje">(' . count($mensajes) . ') mensajes</span><br>' . "\n";
    echo '<span class="nick_normal" title="http://www.CrashCool.com/">)PhpTagCool 1.0.3(</span><br>' . "\n";
}

// Controlador comun de mensajes.php
function tag_mensajes($instancia)
{
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mensaje'])) {
        $error = tag_publicar($instancia,
            isset($_POST['nick']) ? $_POST['nick'] : '',
            isset($_POST['url']) ? $_POST['url'] : '',
            $_POST['mensaje']);
    }
    tag_mostrar($instancia, $error);
}
