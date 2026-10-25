<?php
// I Torneo Hacking CrashCool.com (2004)
require_once dirname(__DIR__, 2) . '/includes/torneo.php';
session_start();
$sec = isset($_GET['sec']) ? $_GET['sec'] : '';
$torneo_aviso = '';

if ($sec == 'salir') {
    unset($_SESSION['torneo_nick']);
    $sec = '';
}
if ($sec == 'registrar' && isset($_GET['ac']) && $_GET['ac'] == 'go' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = torneo_registrar(
        isset($_POST['nick']) ? $_POST['nick'] : '',
        isset($_POST['pass']) ? $_POST['pass'] : '',
        isset($_POST['repass']) ? $_POST['repass'] : '',
        isset($_POST['email']) ? $_POST['email'] : '',
        isset($_POST['codsec']) ? $_POST['codsec'] : ''
    );
    if ($error == '') {
        $torneo_aviso = torneo_aviso('Registro completado, ya puedes entrar con tu nick y contrase&ntilde;a', '#006600');
        $sec = '';
    } else {
        $torneo_aviso = torneo_aviso($error, '#990000');
    }
}
if ($sec == '' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $usuario = torneo_login($_POST['login'], isset($_POST['password']) ? $_POST['password'] : '');
    if ($usuario) {
        session_regenerate_id(true);
        $_SESSION['torneo_nick'] = $usuario['nick'];
    } else {
        $torneo_aviso = torneo_aviso('Usuario o contrase&ntilde;a incorrectos', '#990000');
    }
}
$torneo_usuario = ($sec == '' && isset($_SESSION['torneo_nick'])) ? torneo_usuario($_SESSION['torneo_nick']) : null;
?><HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=iso-8859-1">
<META HTTP-EQUIV="Content-Language" CONTENT="es-es">
<META NAME="Author" CONTENT="CrashCool">
<META HTTP-EQUIV="Page-Enter" CONTENT="blendTrans(Duration='1')">
<TITLE>I torneo crashcool.com</TITLE>
</HEAD>
<body bgcolor="#FFCC00">
<STYLE>
.boton  {

     font-family : Verdana;
     color : #ffcc00;
     font-size : 8pt;
     background : #000000;
     border-top : 0.5pt solid #f3f3f3;
     border-left : 0.5pt solid #f3f3f3;
     border-bottom : 0.5pt solid #333333;
     border-right : 0.5pt solid #333333;

}
.textBox {

     font-family : Verdana;
     color : #ffcc00;
     font-size : 8pt;
     background : #000000;
     border-top : 0.5pt solid #dedede;
     border-left : 0.5pt solid #dedede;
     border-bottom : 0.5pt solid #ffffff;
     border-right : 0.5pt solid #ffffff;

}

BODY{
		scrollbar-FACE-COLOR: #FFCC00;
    	scrollbar-HIGHLIGHT-COLOR: #FFCC00;
    	scrollbar-SHADOW-COLOR: #FFFFFF;
    	scrollbar-3DLIGHT-COLOR: #FFCC00;
    	scrollbar-ARROW-COLOR: #000000;
    	scrollbar-TRACK-COLOR: #000000;
    	scrollbar-DARKSHADOW-COLOR: #FFCC00;
    
}

A:link {

     color : #000066;
     text-decoration : none;

}
A:visited {

     color : #000066;
     text-decoration : none;

}
A:hover {

     color : #003399;
     text-decoration : overline;

}
</STYLE><center>
<a href="index.php"><img src="top.jpg" border="0"></a>
</center><?php if ($sec == 'registrar') { ?><br>
<?php echo $torneo_aviso; ?><table width="34" height="150" border="0" align="center">
  <tr>
    <td><img src="registroTop.jpg" width="347" height="28"></td>
  </tr>
  <tr>
    <td><form name="form1" method="post" action="index.php?sec=registrar&ac=go">
       <div align="center"><br>
          <strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">*Nick:</font></strong>
          <input name="nick" type="text" id="nick3" size="20" maxlength="25" CLASS="textBox">
          <br>
          <br>
          <strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">*Pass:</font></strong>
          <input name="pass" type="password" id="pass3" size="20" maxlength="25" CLASS="textBox">
          <br>
          <br>
          <strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">**Pass:</font></strong>
          <input name="repass" type="password" id="repass" size="20" maxlength="25" CLASS="textBox">
          <br>
          <br>
          <strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">*email:</font></strong>
          <input name="email" type="text" id="email3" size="20" maxlength="30" CLASS="textBox">
          <br>
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><em>Codigo:</em></font> <img src="image.php"> 
		   			
		   <br>
          <strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">*Repite
          c&oacute;digo:</font></strong>
          <input name="codsec" type="text" CLASS="textBox" id="codsec" size="9" maxlength="9">
          <br>
          <br>
          <input type="submit" name="Submit" value="Registrar" CLASS="boton">
&nbsp;
    <input type="reset" name="Submit2" value="Borrar" CLASS="boton">
    </div>
    </form></td>
  </tr>
  <tr>
    <td width="74%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">*Campos
    obligatorios</font><br>      
    <img src="regsitroDown.jpg" width="347" height="27"></td>
  </tr>
</table>
<br>
<center><a href="index.php?sec=reglas"><font  size="2" face="Verdana, Arial, Helvetica, sans-serif">>> Reglas <<<</font></a></center></html><?php } elseif ($sec == 'reglas') { ?>
<br>
<table width="56%" height="27" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td height="23"><ul>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">El torneo
          consta de 5 niveles escalables, y en cada nivel hay una prueba/reto
          a superar para acceder al siguiente nivel.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">El Torneo
          como mismo finaliza en el momento en que alguien llegue al nivel 5
          , y seguir&aacute; online para los que querais superarlo.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Todos las
          pruebas est&aacute;n correctas y no contienen ningun error, son asi.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">En ningun
          caso se admite el ataque de fuerza bruta contra los formularios de
          comprobaci&oacute;n, ya que NINGUNA prueba se supera mediante este tipo de
          ataques.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">El torneo
          est&aacute; alojado en un servidor de un hosting de pago y totalmente ajeno
          al concurso, es decir en ningun caso ninguna prueba se realizar&aacute; mediante
          algun ataque / infliltraci&oacute;n en el servidor.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">En cada
          nivel disponeis de un tag diferente a vuestra derecha, en el que podeis
          compartir experiencias y comentarios, pero no soluciones..., se ruega
          un uso moderado y formal de los mismos.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">El torneo
          es superable, tenedlo claro en todo momento.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Para cualquier
          duda, problema o sugerencia puedes escribir a <a href="mailto:torneo@crashcool.com">torneo@crashcool.com</a></font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Espero
          que disfruteis con los retos que humildemente he preparado.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Mucha suerte
          a todos! y gracias por participar.</font></li>
      <li><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Espero
          que todo salga bien.... [cruzo los dedos :)]<br>
             </font></li>
    </ul>
	<center><a href="javascript:history.back(1)">Volver</center></a><br>
    <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><em>*Este
          torneo es un proyecto independiente desarrollado en exclusiva por CrashCool
          y ajeno
          a cualquier entidad / empresa.</em></font></p></td>
  </tr>
</table>
<br>
</HTML><?php } elseif ($torneo_usuario) { include dirname(__DIR__, 2) . '/includes/torneo_nivel.php'; } else { ?><br>
<?php echo $torneo_aviso; ?><table width="35" height="116" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td height="19" colspan="2" ><img src="LoginTop.jpg" width="347" height="27"></td>
  </tr>
  <tr>
    <td width="73%" height="27" ><form name="form1" method="post" action="index.php">
          <div align="right"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
          Usuario
                  :&nbsp;</font>
            <input name="login" type="text" id="login4" size="20" maxlength="25" CLASS="textBox">
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
              <font color="#000000">Contrase&ntilde;a :</font></font>
            <input name="password" type="password" id="password2" size="20" maxlength="25" CLASS="textBox">
            <br>
            <input type="submit" name="Submit" value="Enviar" CLASS="boton">
            <br>
          </div>
    </form></td>
    <td width="27%" ><br>
    <br>
    <br>
    <br>
    <br></td>
  </tr>
  <tr>
    <td height="21" colspan="2" ><img src="regsitroDown.jpg" width="347" height="27"></td>
  </tr>
</table>
<div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">#Ganador
    del torneo: Phas [1-8-2004]<br>
</font></div>
</HTML><center><a href="index.php?sec=registrar"><font  size="2" face="Verdana, Arial, Helvetica, sans-serif">>> Registrarse <<</font></a></center><br><center><a href="index.php?sec=reglas"><font  size="2" face="Verdana, Arial, Helvetica, sans-serif">>> Reglas <<<</font></a></center><br><center><a href="mailto:torneo@crashcool.com"><font color ="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Email: torneo@crashcool.com</font></center><?php } ?>