<?php
define('CC_INICIO', microtime(true));
require_once dirname(__DIR__) . '/includes/comun.php';

$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$sub = isset($_GET['sub']) ? $_GET['sub'] : '';
$archivo = CC_RAIZ . '/secciones/' . $menu . '/' . $categoria . ($sub != '' ? '/' . $sub : '') . '.php';

if (preg_match('/^[a-z_]+$/', $menu) && preg_match('/^[a-z0-9_+\-]+$/i', $categoria)
    && ($sub == '' || preg_match('/^[a-z0-9_\-]+$/i', $sub)) && is_file($archivo)) {
    include $archivo;
} else {
    include CC_RAIZ . '/secciones/error.php';
}
?><br><table width="50%" height="27" border="0" align="center"  cellpadding="0" cellspacing="1" bgcolor="#FFCC00">
<tr>
<td bgcolor="#FFFFFF">
<div align="center"><a href="index.php" target="_parent"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&gt;Pagina Principal&lt;</font></a></div>
<div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Generada en: <?php echo cc_tiempo(3); ?> s.</font></div>
</td>
</tr>
</table>
