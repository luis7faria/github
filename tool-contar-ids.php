<?php error_reporting(0);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="lua.ico" type="image/x-icon"/>
<title>YMD - Contar ids - Tools</title>
<style type="text/css">
body {
	background: url(http://i.imgur.com/eTYmde3.jpg) center no-repeat #F1F1F1 ;
	font-family:Verdana, Geneva, sans-serif;
	background-attachment:fixed;
}
#box{
	width:400px;
	height:345px;
	margin:0 auto;
	margin-top:60px;
	background:#F1F1F1;
	border:solid 3px #000000;
	padding:10px;
	border-radius:17px;
}
#id {	
	border:#ED462F 1px solid;
	width:375px;
}
.contar{
	background:#F00;
	border:dashed 1px #CCCCCC;
	width:90;
	height:30px;
	color:#FFF;
	font-weight:bold;
	font-size:15px;
}
</style>
</head>

<body>
<div id="box">
  <h2>YMD - Tools:</h2>
  <h4>Contar ids:</h4>
  <form name="form1" method="post">
  <textarea name="id" id="id" cols="45" rows="4"></textarea><br /><br />
    <input name="Contar" type="submit" class="contar" value="Contar" /> <?php  if(!$_POST['id']==NULL){ $var = explode('
',$_POST['id']); echo 'Total de ids: '.count($var); }?></form>
  <br />
  --<br /> <br />
<a href="bot-loader.php?y=tools">Voltar</a><br /><br />
V 1.3 &amp; Estável | By LuyZ | <a href="bot-loader.php?y=contato" target="_blank">Contato</a><font color="#FF0000"> &lt;</font></div>
</body>
</html>