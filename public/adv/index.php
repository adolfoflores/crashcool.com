<?php
// Adivina el pensamiento: el resultado de restar a un numero de 2 cifras su inverso
// siempre es multiplo de 9, y todos los multiplos de 9 de la tabla llevan el mismo simbolo.
session_start();
$paso = isset($_POST['paso']) ? (int) $_POST['paso'] : 0;
$simbolos = range(1, 40);
if ($paso == 1) {
    $_SESSION['adv_simbolo'] = $simbolos[array_rand($simbolos)];
}
?><html>
<HEAD>
<title>ADIVINA PENSAMIENTO</title>
</HEAD>
<body style=font-family:Verdana; font-size:9pt;>
<table align="center"><td width="733">

<?php if ($paso == 1) { ?>
<table width="75%" border="0">
  <tr>
    <td><p align="center"><strong>PASO 2: BUSCA EN LA TABLA EL N&Uacute;MERO QUE HAS MEMORIZADO Y F&Iacute;JATE EN SU S&Iacute;MBOLO</strong></p>
      <table border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#CCCCCC">
<?php
    $otros = array_values(array_diff($simbolos, array($_SESSION['adv_simbolo'])));
    $n = 99;
    while ($n >= -99) {
        echo "        <tr>\n";
        for ($col = 0; $col < 10 && $n >= -99; $col++, $n--) {
            $img = ($n % 9 == 0) ? $_SESSION['adv_simbolo'] : $otros[array_rand($otros)];
            echo '          <td align="center"><font size="1"><strong>' . $n . '</strong></font><br><img src="img/' . $img . '.jpg" width="42" height="40"></td>' . "\n";
        }
        echo "        </tr>\n";
    }
?>
      </table>
      <div align="center"><br><font color="#FF0000"><strong>-CONC&Eacute;NTRATE EN EL S&Iacute;MBOLO DE TU N&Uacute;MERO</strong></font>-<br>
        <form name="form1" method="post" action="">
        <input type="submit" name="Submit" value="Siguiente">
        <input name="paso" type="hidden" id="paso" value="2">
        </form>
        <br>
      </div></td>
  </tr>
</table>
<?php } elseif ($paso == 2 && isset($_SESSION['adv_simbolo'])) { ?>
<table width="75%" border="0">
  <tr>
    <td><p align="center"><strong>PASO 3: EL S&Iacute;MBOLO EN EL QUE EST&Aacute;S PENSANDO ES...</strong></p>
      <div align="center"><img src="img/<?php echo (int) $_SESSION['adv_simbolo']; ?>.jpg" width="42" height="40"><br>
        <br>
        <form name="form1" method="post" action="">
        <input type="submit" name="Submit" value="Jugar otra vez">
        </form>
        <br>
      </div></td>
  </tr>
</table>
<?php } else { ?>
<table width="75%" border="0">
  <tr>
    <td><p align="center"><strong>PASO 1: PIENSA UN N&Uacute;MERO DE 2 CIFRAS Y R&Eacute;STALE SU INVERSO</strong><br>
          <em>EJ: Pienso el 24<br> 
        su inverso es el 42<br>
      se lo resto 24-42=-18</em></p>
      <div align="center"><font color="#FF0000"><strong>-MEMORICE EL N&Uacute;MERO RESULTANTE</strong></font>-<br>
        <form name="form1" method="post" action="">
        <input type="submit" name="Submit" value="Siguiente">
        <input name="paso" type="hidden" id="paso" value="1">
        </form>
        <br>
      </div></td>
  </tr>
</table>



<?php } ?>
</td></table>
CrashCool&copy; 16 Febrero 2006
</BODY>
</html>