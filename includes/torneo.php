<?php
// Datos del I Torneo Hacking (torneo04)
require_once __DIR__ . '/comun.php';

define('CC_TORNEO_BASE', 1670); // participantes registrados en el torneo original

function cc_torneo_participantes()
{
    return CC_TORNEO_BASE;
}

function torneo_aviso($texto, $color)
{
    return '<div align="center"><font color="' . $color . '" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>'
        . $texto . '</b></font></div><br>' . "\n";
}

function torneo_usuario($nick)
{
    $clave = strtolower($nick);
    return isset($_SESSION['torneo_usuarios'][$clave]) ? $_SESSION['torneo_usuarios'][$clave] : null;
}

// Devuelve un mensaje de error o '' si el registro fue correcto
function torneo_registrar($nick, $pass, $repass, $email, $codigo)
{
    $nick = trim($nick);
    $email = trim($email);
    $esperado = isset($_SESSION['torneo_codigo']) ? $_SESSION['torneo_codigo'] : '';
    unset($_SESSION['torneo_codigo']);

    if ($nick == '' || $pass == '' || $email == '') return 'Rellena todos los campos obligatorios';
    if (!preg_match('/^[A-Za-z0-9_\-\.\[\]]{2,25}$/', $nick)) return 'El nick solo puede tener letras, n&uacute;meros y _ - . [ ]';
    if ($pass != $repass) return 'Las contrase&ntilde;as no coinciden';
    if (strlen($pass) > 25) return 'La contrase&ntilde;a es demasiado larga';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 30) return 'El email no es v&aacute;lido';
    if ($esperado == '' || strtoupper(trim($codigo)) != $esperado) return 'El c&oacute;digo no coincide';

    $clave = strtolower($nick);
    if (torneo_usuario($nick) || $clave == 'phas' || $clave == 'crashcool') return 'Ese nick ya est&aacute; registrado';
    $_SESSION['torneo_usuarios'][$clave] = array(
        'nick' => $nick,
        'pass' => password_hash($pass, PASSWORD_DEFAULT),
        'nivel' => 1,
    );
    return '';
}

function torneo_login($nick, $pass)
{
    $usuario = torneo_usuario(trim($nick));
    if ($usuario && password_verify($pass, $usuario['pass'])) return $usuario;
    return null;
}
