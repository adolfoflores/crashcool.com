<?php require_once dirname(dirname(__DIR__)) . '/includes/tagboard.php'; ?><HTML>
<head>
<title>PhpTagCool 1.0.3</title>
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

<?php tag_mensajes('phptagcool'); ?></body>

</HTML>