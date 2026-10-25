<html>
<head>
<title>CrashCool.com</title>
<link rel="shortcut icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="crashcool, troyano, jodeitor, php-nukehack, ccbot, bot irc, phptagcool, tag-board, tag board gratis, base64, brute force, sockets, perl ,java , rpc-jodejode,Mini-Servidor Web, agenda de contactos, ccagenda, telnel server fake, keycool, keyloger,fake messenger,parches multisesion, msn patch, open source,ordena contenido, algoritmo basico brute force, formulario contacto mail(), sistema autetificacion, tag-board, hack, hacking etico, programación, proyectos propios, datos navegador, saber mi ip, recursos programacion">
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
</style></head><body bgcolor="#FFFFFF">
<TABLE WIDTH="95%" BORDER="0" HEIGHT="135" CELLSPACING="0" CELLPADDING="0" ALIGN="CENTER"><TR><TD HEIGHT="20" COLSPAN="5">&nbsp;</TD></TR><TR><TD WIDTH="4%" HEIGHT="15" bgcolor="#FFCC00"><B></B></TD><TD HEIGHT="15" BGCOLOR="#FFCC00" COLSPAN="3"><DIV ALIGN="CENTER"><B><FONT FACE="Verdana, Arial, Helvetica, sans-serif" SIZE="1">Ejemplo 
de uso de IO::Socket</FONT></B></DIV></TD><TD HEIGHT="15" WIDTH="5%" BGCOLOR="#FFCC00">&nbsp;</TD></TR>
  <TR>
    <TD HEIGHT="20" COLSPAN="5">&nbsp;</TD>
  </TR>
  <TR><TD HEIGHT="20" WIDTH="4%">&nbsp;</TD><TD HEIGHT="20" BGCOLOR="#000000" COLSPAN="3"><DIV ALIGN="LEFT"><FONT COLOR="#FF0000" SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif">&nbsp;#!/usr/bin/perl 
<BR><BR> &nbsp;##############################<BR> &nbsp;# CRASHCOOL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<BR> 
&nbsp;# 21/12/03 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<BR> 
&nbsp;#ejemplo de uso de IO::SOCKET &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<BR> 
&nbsp;#Script CLIENTE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#<BR> 
&nbsp;##############################</FONT><FONT COLOR="#FFFFFF" SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif"><BR> 
<FONT COLOR="#00FF00">&nbsp;use IO::Socket;</FONT></FONT><P><FONT COLOR="#00FF00" SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif"> 
&nbsp;print &quot;Introduce la ip de destino=&gt;&quot;;<BR> &nbsp;chop($ip=&lt;STDIN&gt;);<BR> 
&nbsp;print &quot;Introduce el puerto de destino=&gt;&quot;;<BR> &nbsp;chop($puerto=&lt;STDIN&gt;);<BR> 
<FONT COLOR="#FF0000">&nbsp;#creamos el Socket tcp...</FONT><BR> &nbsp;$socket 
= new IO::Socket::INET (PeerAddr =&gt; $ip , PeerPort =&gt; $puerto, &nbsp;Proto 
=&gt; 'tcp', ); <BR> &nbsp;die &quot;No se puede crear el Socket&quot; unless 
$socket;<BR> &nbsp;<BR>&nbsp;print &quot;\nCONECTADO A $ip : $puerto\n&quot;; 
<FONT COLOR="#FF0000">#mostramos un mensaje al &nbsp;conectar</FONT><BR>&nbsp;print 
&quot;\t=&gt; Para terminar escriba :quit &lt;=\n&quot;;<BR>&nbsp;while (&quot;:quit\n&quot; 
ne ($datos=&lt;STDIN&gt;) ) <FONT COLOR="#FF0000">#Para salir escribimos :quit</FONT><BR>&nbsp;{<BR>&nbsp;print 
$socket $datos ;<BR>&nbsp;}<BR>&nbsp;close($socket);</FONT><FONT COLOR="#FFFFFF" SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif"> 
<FONT COLOR="#FF0000">#cerramos el socket</FONT></FONT></P></DIV></TD><TD HEIGHT="20" WIDTH="5%" BGCOLOR="#FFFFFF">&nbsp;</TD></TR><TR bgcolor="#FFFFFF"><TD WIDTH="4%" HEIGHT="20">&nbsp;</TD><TD HEIGHT="20" WIDTH="37%"><DIV ALIGN="CENTER"><B></B></DIV></TD><TD HEIGHT="20" WIDTH="16%"><DIV ALIGN="CENTER"></DIV></TD><TD HEIGHT="20" WIDTH="38%">&nbsp;</TD><TD HEIGHT="20" WIDTH="5%">&nbsp;</TD></TR><TR bgcolor="#FFFFFF"><TD WIDTH="4%" HEIGHT="20">&nbsp;</TD><TD HEIGHT="20" COLSPAN="3"><FONT SIZE="1" FACE="Verdana, Arial, Helvetica, sans-serif" COLOR="#000000">Este 
simple script se conecta a una ip y un puerto especificado por el usuario y permite 
mandar datos hasta que nos cierren/ o cerremos la conexion con &quot;:quit &quot;, 
podeis probarlo poniendo el netcat a la escucha en vuestro propio pc -&gt; nc 
-vvlp 7575 y conectando con el script al 7575</FONT></TD><TD HEIGHT="20" WIDTH="5%">&nbsp;</TD></TR><TR bgcolor="#FFFFFF"><TD WIDTH="4%" HEIGHT="20">&nbsp;</TD><TD HEIGHT="20" WIDTH="37%">&nbsp;</TD><TD HEIGHT="20" WIDTH="16%"><div align="center"><FONT FACE="Verdana, Arial, Helvetica, sans-serif" SIZE="1"><A HREF="javascript:;">Download</A></FONT></div></TD><TD HEIGHT="20" WIDTH="38%">&nbsp;</TD><TD HEIGHT="20" WIDTH="5%">&nbsp;</TD></TR></TABLE>
</body>
</html>