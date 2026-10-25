<HTML>
<head>
<title>PhpTagCool </title>
<meta name="description" content="phpTagCool">
<meta name="keywords" content="PhpTagCool">
<style>
BODY{
	
		background-color: #FFFFFF;
		scrollbar-FACE-COLOR: #DDF4C4;
    	scrollbar-HIGHLIGHT-COLOR: #DDF4C4;
    	scrollbar-SHADOW-COLOR: #000000;
    	scrollbar-3DLIGHT-COLOR: #DDF4C4;
    	scrollbar-ARROW-COLOR: #000000;
    	scrollbar-TRACK-COLOR: #FFFFFF;
    	scrollbar-DARKSHADOW-COLOR: #DDF4C4;
    
}

A:link {

     color : #006699;
     text-decoration : none;

}
A:visited {

     color : #006699;
     text-decoration : none;

}
A:hover {

     color : #66CC00;
     text-decoration : none;

}
.boton  {

     border-top : 0.5pt solid #f3f3f3;
     border-left : 0.5pt solid #f3f3f3;
     border-bottom : 0.5pt solid #333333;
     border-right : 0.5pt solid #333333;
	 font-family : Verdana;
     color : #000000;
     font-size : 8pt;
     background : #DDF4C4;

}

.textBox {

     border-top : 0.5pt solid #000000;
     border-left : 0.5pt solid #000000;
     border-bottom : 0.5pt solid #000000;
     border-right : 0.5pt solid #000000;
	 font-family : Verdana;
     color : #666666;
     font-size : 8pt;
     background : #ffffff;

}

.tabla1{
background: #EAFAD3;
padding: 1pt 2.0pt 1pt 2.0pt;
}
.tabla2{
background: #ffffff;
padding: 1pt 2.0pt 1pt 2.0pt;
}

.nick_protegido {

	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	font-size: 8pt;	
	color:red;

}
.nick_protegido_url {

	 color : red;
     text-decoration : none;

}
.nick_normal {
	font-family: verdana;
	font-weight: bold;
	font-size: 7.5pt;	
	color:green;
}

.texto_mensaje{
	font-family: verdana;
	font-size: 7.5pt;	
	color:black;

}
</style>
</head>
<body>

<table width="160" height="366" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="158" height="171"><center><iframe src="mensajes.php" name="iframe" frameborder="0" height="100%" width="100%"></iframe>
    </center></td>
  </tr>
  <tr>
    <td height="195">
	<script language="JavaScript">
	function reload()
	{
		
		location.reload();
	
	}
	function abrir()
	{
	   window.open('caritas/ver.php','','scrollbars=1, resizable=1, width=200, height=275, status=0, location=0, menubar=0');
	}
	</script>
	
	<form action="mensajes.php" method="post" name="form" target="iframe" id="form">
      <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nick:</font><br>
          <input name="nick" type="text" class="textBox" id="nick2" size="17" maxlength="30">
          <br>
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Url/email</font><br>
          <input name="url" type="text" class="textBox" id="url" value="http://" size="17" maxlength="40">
          <br>
          <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Mensaje:
          (<a href="#" onClick="javascript:abrir()">smilies</a>)</font><br>
          <textarea name="mensaje" cols="17" rows="3" id="textarea" class="textBox"></textarea>
          <br>
          <input type="submit" name="Submit" value="Enviar" class="boton">
    <input type="reset" name="Submit2" value="Reset" class="boton">
    <br>
    <input type="button" value="Reload" onClick="reload()" class="boton">
        </div>
    </form></td>
  </tr>
</table>
<div align="center"></div>
</body>

</HTML>