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
	<?php if($_POST['listar']==NULL){ echo 'height:340px;'; }else{echo 'height:620px'; }?>
	
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
  <h4>Listar ids por palavra/s chave/s:</h4>
  <form action="" method="post">
  Palavra/s Chave/s: 
    <input name="listar" value="<?php if(!$_POST['listar']==NULL){ echo $_POST['listar'];} ?>" class="listar" type="text" />
     
     <br /><br />
     Numero de páginas de pesquisa 
     <input name="n" value="<?php if(!$_POST['n']==NULL){ echo $_POST['n'];} ?>" class="n" type="text" />
    <input name="OK" class="ok" type="Submit" value="OK" /><br />
     <font size="1">(O máximo de páginas permitidas pelo google é de 1-50, cada página apresenta 20 ids, sendo possível extrair 1000 ids por palavra chave)</font>
  </form>
<?php
$palavra = $_POST['listar'];
if(!$palavra==NULL){
echo '(carregando aguarde..)<br /><textarea name="lista" class="lista">';

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
for($y=1;$y<=$_POST['n'];$y++){
	
	$web = yt('http://www.youtube.com/results?search_query='.strtolower(str_replace(' ','+',$palavra)).'&page='.$y);
	$web = explode('<ol id="search-results" class="result-list context-data-container">',$web);
	$regex='|<a.*?href="(.*?)"|';
	preg_match_all($regex,$web[1],$parts);
	$links=$parts[1];
	$href = ($links);
	$a = 0;
	for($i=0;$i<count($href);$i++){
		if(!strpos($href[$i], 'watch') === false){
			#$id[$a] = $href[$i];
			#$a = $a +1;
			echo str_replace('/watch?v=','',$href[$i]).'
';
			flush();
		}
	}
}}
?></textarea> <?php if(!$_POST['listar'] == NULL){ ?><font color="#006600">Você carregou todas as ids com sucesso.</font> <?php } ?>
<br />
  --<br /> <br />
<a href="bot-loader.php?y=tools">Voltar</a><br /><br />
V 1.3 &amp; Estável | By LuyZ | <a href="bot-loader.php?y=contato" target="_blank">Contato</a><font color="#FF0000"> &lt;</font></div>
</body>
</html>