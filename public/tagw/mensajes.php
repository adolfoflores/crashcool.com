<?php require_once dirname(dirname(__DIR__)) . '/includes/tagboard.php'; ?><HTML>
<head>
<title>PhpTagCool 1.0.3</title>
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

<?php tag_mensajes('tagw'); ?></body>

</HTML>