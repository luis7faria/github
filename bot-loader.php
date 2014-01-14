<?php  error_reporting(0); header('Content-Type: text/html; charset=utf-8'); if($_GET['y']=='contato'){ echo '<H1>Surprise</h1><h2>Leia o <a href="LEIA-ME.html">LEIA-ME.html</a> (;</h2>'; exit; } if($_GET['y']=='tools'){ include 'tools.php'; exit; }?>
<html>
<head>
<title>YMD</title>
<link rel="icon" href="lua.ico" type="image/x-icon"/>
</head>
<style type="text/css">
body {
	background: url(http://i.imgur.com/eTYmde3.jpg) no-repeat #F1F1F1 center;
	font-family:Verdana, Geneva, sans-serif;
}
#box{
	width:400px;
	height:375px;
	margin:0 auto;
	margin-top:60px;
	background:#F1F1F1;
	border:solid 3px #000000;
	padding:10px;
	border-radius:17px;
}
.carregar{
	background:#F00;
	border:dashed 1px #CCCCCC;
	width:90;
	height:30px;
	color:#FFF;
	font-weight:bold;
	font-size:15px;
}
#id{
	border:#ED462F 1px solid;
	width:375px;
	
}
#iframe{
	background:#FFF;
	width:1299px;
	border:#090 solid 2px;
	margin:0 auto;	
}
#novo{
	color:#F00;
	font-size:12px;
	width:40px;
	margin-left:330px;
	
}
</style>
<body>
<div id="box">
<form name="form1" method="post" action="">
  <h2>Youtube Mass Downloader via PHP</h2>
  <h4>Verifique a pasta 'videos/' após baixar.</h4>
  <h5>Coloque os ids do Youtube um de baixo do outro (exemplo: HF2T2W-x4jo)</h5>
  <textarea name="id" id="id" cols="45" rows="5"><?php if(!$_POST['id']==NULL){ echo $_POST['id']; }?></textarea><br /><br />
  <input name="Carregar" type="submit" class="carregar" id="Carregar" value="Carregar"><?php if(!$_POST['id']==NULL){ $m = explode('
',$_POST['id']); echo ' Baixando: '.count($m).' videos.'; }?>
  <div id="novo">(:</div>
V 1.3 &amp; Estável | By LuyZ | <a href="?y=contato" target="_blank">Contato</a> <font color="#FF0000">&gt;</font> <a href="?y=tools">Tools</a>
</form></div>
<?php
if($_POST['id']==NULL){echo '</body>
</html>'; exit;}
$id = explode('
',$_POST['id']);
$localiza = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
$localiza = str_replace('bot-loader.php','api-bot.php',$localiza);
echo '<br /><br /><div id="iframe">';
for($i=0;$i<count($id);$i++){
	echo '<iframe src="'.$localiza.'?id='.rtrim($id[$i]).'" frameborder="1" width="5" height="5" scrolling="no"></iframe>';
}echo '</div>'
?>
</body>
</html>