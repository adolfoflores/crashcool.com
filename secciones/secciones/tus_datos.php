<html>
<head>
<title>CrashCool.com</title>
<link rel="shortcut icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="crashcool, troyano, jodeitor, php-nukehack, ccbot, bot irc, phptagcool, base64, brute force, sockets, perl ,java , rpc-jodejode,Mini-Servidor Web, agenda de contactos, ccagenda, telnel server fake, keycool, keyloger,fake messenger,parches multisesion, msn patch, open source,ordena contenido, algoritmo basico brute force, formulario contacto mail(), sistema autetificacion, tag-board, hack, hacking etico, programación, proyectos propios, datos navegador, saber mi ip">
<style type=text/css>
a:link {
	COLOR: #000000; TEXT-DECORATION: none
}
a:visited {
	COLOR: #000000; TEXT-DECORATION: none
}
a:hover {
	COLOR: #990000; TEXT-DECORATION: underline
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

.proxy{
	COLOR: #FF0000; TEXT-DECORATION: none;
	FONT-FAMILY: Verdana;
	FONT-SIZE: 7pt;
	 font-weight:bold;
}
.noproxy{
	COLOR: #00CC00; TEXT-DECORATION: none;
	FONT-FAMILY: Verdana;
	FONT-SIZE: 8pt;
	 font-weight:bold;
}
.normal{
	COLOR: #000000; TEXT-DECORATION: none;
	FONT-FAMILY: Verdana;
	FONT-SIZE: 7pt;
	 font-weight:bold;
}
.normal2{
	COLOR: #990000; TEXT-DECORATION: none;
	FONT-FAMILY: Verdana;
	FONT-SIZE: 7pt;
	 font-weight:bold;
}

.tuip{
	COLOR: #006699; TEXT-DECORATION: underline;
	FONT-FAMILY: Verdana;
	FONT-SIZE: 7pt;
	 font-weight:bold;
}
</style>
</head>
<body bgcolor="#FFFFFF">
<TABLE WIDTH="95%" HEIGHT="71" BORDER="0" ALIGN="CENTER" CELLPADDING="0" CELLSPACING="0"><TR bgcolor="#FFFFFF"><TD HEIGHT="23" COLSPAN="5">&nbsp;</TD>
</TR><TR BGCOLOR="#FFCC00"><TD HEIGHT="12" COLSPAN="5"><DIV ALIGN="CENTER"><FONT FACE="Verdana, Arial, Helvetica, sans-serif"><B><FONT SIZE="1" COLOR="#000000">.::TU
              DATOS::.</FONT></B></FONT></DIV></TD></TR>
  <TR bgcolor="#FFFFFF">
    <TD HEIGHT="20">&nbsp;</TD>
    <TD HEIGHT="20" COLSPAN="3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>
          </strong></font></TD>
    <TD HEIGHT="20">&nbsp;</TD>
  </TR>
  <TR bgcolor="#FFFFFF">
    <TD width="15" HEIGHT="20">&nbsp;</TD>
    <TD HEIGHT="20" COLSPAN="3">
<?php
$cc_cadena = cc_cadena_proxies();
$cc_ip = end($cc_cadena);
$cc_proxy = count($cc_cadena) > 1 || !empty($_SERVER['HTTP_VIA']) || !empty($_SERVER['HTTP_CLIENT_IP']);
if ($cc_proxy) {
?>
   <center><span class="proxy">Se ha detectado proxy</span></center>
<?php } else { ?>
   <center><span class="noproxy">No se ha detectado proxy</span></center>
<?php } ?>
<hr><br>
<span class="tuip">Tus datos</span>
<br><hr><strong><font color="<?php echo $cc_proxy ? '#FF0000' : '#00CC00'; ?>" face="Verdana" size="+3">Ip: <?php echo cc_html($cc_ip); ?></font></strong>
<br>
<?php if ($cc_proxy && count($cc_cadena) > 1) { ?>
<span class="normal2">Ip real:</span> <span class="normal"> <?php echo cc_html($cc_cadena[0]); ?></span>
<br>
<?php } ?>
<span class="tuip">Datos del navegador</span>
<br><hr>
<span class="normal2">User-Agent:</span> <span class="normal"> <?php echo cc_html(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''); ?></span>
<br>
<span class="normal2">Accept:</span>
<span class="normal"> <?php echo cc_html(isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : ''); ?> </span>
<br><span class="normal2">Accept Charset:</span> <span class="normal"> <?php echo cc_html(isset($_SERVER['HTTP_ACCEPT_CHARSET']) ? $_SERVER['HTTP_ACCEPT_CHARSET'] : ''); ?></span>
<br>
<span class="normal2">Accept encoding:</span> <span class="normal"> <?php echo cc_html(isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : ''); ?></span>
<br>
<span class="normal2">Accept lang:</span> <span class="normal"> <?php echo cc_html(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : ''); ?></span>
<br> 
 
	</TD>
    <TD width="13" HEIGHT="20">&nbsp;</TD>
  </TR></TABLE>
  </body>
  </html>