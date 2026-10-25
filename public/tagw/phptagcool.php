<HTML>
<head>
<title>PhpTagCool </title>
<meta name="description" content="phpTagCool">
<meta name="keywords" content="PhpTagCool">
<style>
BODY{
	
		background-color: #FFFFFF;
		scrollbar-FACE-COLOR: #FFCC00;
    	scrollbar-HIGHLIGHT-COLOR: #FFCC00;
    	scrollbar-SHADOW-COLOR: #FFFFFF;
    	scrollbar-3DLIGHT-COLOR: #FFCC00;
    	scrollbar-ARROW-COLOR: #000000;
    	scrollbar-TRACK-COLOR: #000000;
    	scrollbar-DARKSHADOW-COLOR: #FFCC00;
    
}

A:link {

     color : blue;
     text-decoration : none;

}
A:visited {

     color : blue;
     text-decoration : none;

}
A:hover {

     color : black;
     text-decoration : none;

}
.boton  {

     border-top : 0.5pt solid #FFCC00;
     border-left : 0.5pt solid #FFCC00;
     border-bottom : 0.5pt solid #FFCC00;
     border-right : 0.5pt solid #FFCC00;
	 font-family : Verdana;
     color : #000000;
     font-size : 8pt;
     background : #FFFFFF;

}

.textBox {

     border-top : 0.5pt solid #FFCC00;
     border-left : 0.5pt solid #FFCC00;
     border-bottom : 0.5pt solid #FFCC00;
     border-right : 0.5pt solid #FFCC00;
	 font-family : Verdana;
     color : #666666;
     font-size : 8pt;
     background : #ffffff;

}

.tabla1{
background: #FFFFFF;
padding: 1pt 2.0pt 1pt 2.0pt;
}
.tabla2{
background: #FFCC00;
padding: 1pt 2.0pt 1pt 2.0pt;
}

.nick_protegido {

	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	font-size: 8pt;	
	color: red;

}
.nick_protegido_url {

	 color : red;
     text-decoration : none;

}
.nick_normal {
	font-family: verdana;
	font-weight: bold;
	font-size: 7.5pt;	
	color:black;
}

.texto_mensaje{
	font-family: verdana;
	font-size: 7.5pt;	
	color:black;

}
</style>
</head>
<body>
<script language="JavaScript">

function reload(){location.reload();}	

function abrir()
	{
	   window.open('caritas/ver.php','','scrollbars=1, resizable=1, width=200, height=275, status=0, location=0, menubar=0');
	}
</script>
<table width="406" height="361" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="382" height="182"><div align="center"><iframe src="mensajes.php" name="iframe" frameborder="0" height="100%" width="100%"></iframe>
    </div></td>
  </tr>
  <tr>
    <td height="179">
	<form action="mensajes.php" method="post" name="form" target="iframe" id="form">
      <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nick:</font><br>
            <input name="nick" type="text" class="textBox" id="nick2" size="25" maxlength="30">
            <br>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Url/email</font><br>
            <input name="url" type="text" class="textBox" id="url" value="http://" size="25" maxlength="40">
            <br>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Mensaje:
            (<a href="#"  onClick="javascript:abrir()">smilies</a>)</font><br>
            <textarea name="mensaje" cols="25" rows="2" id="textarea" class="textBox"></textarea>
            <br>
            <input type="submit" name="Submit" value="Enviar" class="boton">
          <input type="reset" name="Submit2" value="Reset" class="boton">
          <input type="button" value="Reload" onClick="reload()" class="boton">
          
    </div>
	</form>
	</td>
  </tr>
</table>
</body>

</HTML>