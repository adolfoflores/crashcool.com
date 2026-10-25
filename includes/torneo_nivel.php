<?php
// Panel del participante. Las pruebas de los 5 niveles no se conservan en web.archive.org,
// asi que solo se muestra el nivel y el tag del torneo.
?>
<br>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Usuario:
      <b><?php echo cc_html($torneo_usuario['nick']); ?></b> &nbsp;|&nbsp; Nivel: <b><?php echo (int) $torneo_usuario['nivel']; ?></b>
      &nbsp;|&nbsp; <a href="index.php?sec=salir">Salir</a></font><br>
      <br>
      <font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>NIVEL <?php echo (int) $torneo_usuario['nivel']; ?></b></font><br>
      <br>
      <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">El torneo finaliz&oacute; el 1-8-2004.<br>
      Las pruebas de los niveles no se han conservado.</font><br>
      <br>
      <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">#Ganador del torneo: Phas [1-8-2004]</font></div></td>
    <td width="170" valign="top"><iframe src="mitagphp/tag.php" name="tag" width="170" height="400" frameborder="0"></iframe></td>
  </tr>
</table>
<center><a href="index.php?sec=reglas"><font  size="2" face="Verdana, Arial, Helvetica, sans-serif">>> Reglas <<<</font></a></center></HTML>
