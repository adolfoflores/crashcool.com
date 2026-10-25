<?php
// Codigo de seguridad del registro del torneo
session_start();
$letras = 'ABCDEFGHJKLMNPRSTUVWXYZ23456789';
$codigo = '';
for ($i = 0; $i < 5; $i++) $codigo .= $letras[random_int(0, strlen($letras) - 1)];
$_SESSION['torneo_codigo'] = $codigo;

$im = imagecreate(70, 20);
$fondo = imagecolorallocate($im, 0, 0, 0);
$texto = imagecolorallocate($im, 0xFF, 0xCC, 0x00);
$ruido = imagecolorallocate($im, 0x66, 0x52, 0x00);
for ($i = 0; $i < 6; $i++) imageline($im, random_int(0, 70), random_int(0, 20), random_int(0, 70), random_int(0, 20), $ruido);
for ($i = 0; $i < 5; $i++) imagestring($im, 5, 6 + $i * 12, random_int(1, 4), $codigo[$i], $texto);

header('Content-Type: image/png');
header('Cache-Control: no-store');
imagepng($im);
