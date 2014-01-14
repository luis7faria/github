<?php error_reporting(0); header('Content-Type: text/html; charset=utf-8'); if(!$_POST['listar']==NULL){ echo '<br /><br /><br />';} ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="lua.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>YMD - Extrair ids apartir do yahoo - Tools</title>

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
  <h4>Extrair ids apartir do yahoo:</h4>
  <form action="" method="post">
  Palavra/s Chave/s: 
    <input name="listar" value="<?php if(!$_POST['listar']==NULL){ echo $_POST['listar'];} ?>" class="listar" type="text" />
     
     <br /><br />
     Numero de páginas de pesquisa: 
    <input name="n" value="<?php if(!$_POST['n']==NULL){ echo $_POST['n'];} ?>" class="n" type="text" />
    <input name="OK" class="ok" type="Submit" value="OK" /><br />
     <font size="1">(O máximo de páginas permitidas pelo yahoo é de 100, cada página apresenta 9 ids, sendo possível extrair 900 ids por palavra chave)</font>
  </form>
<?php
#
if($_POST['listar']==NULL || $_POST['n']==NULL){?><br />
  --<br /> <br />
<a href="bot-loader.php?y=tools">Voltar</a><br /><br />
V 1.3 &amp; Estável | By LuyZ | <a href="bot-loader.php?y=contato" target="_blank">Contato</a><font color="#FF0000"> &lt;</font></div>
</body>
</html><?php exit;}
echo '(carregando aguarde..)<br /><textarea name="lista" class="lista">';
function yahoo($url) {
	$ch = curl_init();
	#$timeout = 30;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$string = str_replace(' ','%20',$_GET['b']);
#paginas &b=991
$k = 0;
for($a=0;$a<$_POST['n'];$a++){
$var = 'http://search.yahoo.com/search;_ylc=?gprid=&pvid=&p=site:youtube.com%20'.$string.'&fr2=sb-top&fr=&b='.$k;
$k = $k+11;
$var = yahoo($var);
preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+".
                    "(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", 
                    $var, &$matches);
$matches = $matches[1];
$i=0;
$list = array();
    foreach($matches as $var)
    {    
        if(strpos($var,'v=')){
		$vary[$i] = $var;
		$i=$i+1;
		}
    }
	
#print_r( $vary);
for($i=0;$i<count($vary);$i++){
$var = explode("fv=", $vary[$i]);
if($i%2 == 0){
if(!$var[1]==NULL){
echo trim($var[1]).'
';
flush();	}}
}
	}

?></textarea> <?php if(!$_POST['listar'] == NULL){ ?><font color="#006600">Você carregou todas as ids com sucesso.</font> <?php } ?>
<br />
  --<br /> <br />
<a href="bot-loader.php?y=tools">Voltar</a><br /><br />
V 1.3 &amp; Estável | By LuyZ | <a href="bot-loader.php?y=contato" target="_blank">Contato</a><font color="#FF0000"> &lt;</font></div>
</body>
</html>