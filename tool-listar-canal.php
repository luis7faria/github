<?php error_reporting(0); header('Content-Type: text/html; charset=utf-8'); if(!$_POST['listar']==NULL){ echo '<br /><br /><br />';} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="lua.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>YMD - Listar ids por palavra chave - Tools</title>

<style type="text/css">
body {
	background: url(http://i.imgur.com/eTYmde3.jpg) center no-repeat #F1F1F1 ;
	font-family:Verdana, Geneva, sans-serif;
	background-attachment:fixed;
}
#box{
	margin:0 auto;
	width:400px;
	<?php if($_POST['listar']==NULL){ echo 'height:280px;'; }else{echo 'height:610px'; }?>
	
	margin-top:60px;
	background:#F1F1F1;
	border:solid 3px #000000;
	padding:10px;
	border-radius:17px;
}
.listar{
	width:200px;
	height:20px;
	border:solid 1px #FF0000;
}
.ok{
	background:#F00;
	border:dashed 1px #CCCCCC;
	color:#FFF;
	font-weight:bold;
	width:30px;
	height:23px;
}
.lista{
	border:solid 1px #FF0000;
	width:390px;
	height:50px;	
}
.n{
	width:50px;
	height:20px;
	border:solid 1px #FF0000;
}
</style>
</head>

<body>
<div id="box">
  <h2>YMD - Tools:</h2>
  <h4>Listar todos os ids de um canal:</h4>
  <form action="" method="post">
  Nome do canal: 
    <input name="listar" value="<?php if(!$_POST['listar']==NULL){ echo $_POST['listar'];} ?>" class="listar" type="text" /> <input name="OK" class="ok" type="Submit" value="OK" /><br />
    <font size="1">Exemplo: luis2faria</font>
  </form>
<?php
$palavra = $_POST['listar'];
if(!$palavra==NULL){
echo '(carregando aguarde..)<br /><textarea name="lista" class="lista">';

$canal = strtolower($palavra);
$palavra = str_replace(' ','+',$canal);

function yt($url) {
	$ch = curl_init();
	#$timeout = 30;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
for($x=0;$x<=50;$x++){
$web = yt('https://www.youtube.com/results?search_query='.$palavra.'&search_sort=video_view_count&page='.$y);

$web = explode('<div id="results">',$web);
$idx = explode('data-context-item-id="',$web[1]);
$regex='|<a.*?href="(.*?)"|';
	for($i=0;$i<count($idx);$i++){
		preg_match_all($regex,$idx[$i],$parts);
		$id = $parts[1];	
		if(('/user/'.$canal == $id[1]) && (strpos($id[0],'results')==NULL)){
		echo str_replace('/watch?v=','',$id[0]).'
';
		flush();
		}
	}
}
}
?></textarea> <?php if(!$_POST['listar'] == NULL){ ?><font color="#006600">Você carregou todas as ids com sucesso.</font> <?php } ?>
<br />
  --<br /> <br />
<a href="bot-loader.php?y=tools">Voltar</a><br /><br />
V 1.3 &amp; Estável | By LuyZ | <a href="bot-loader.php?y=contato" target="_blank">Contato</a><font color="#FF0000"> &lt;</font></div>
</body>
</html>