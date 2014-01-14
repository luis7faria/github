<?php
//processamento
$id = $_GET['id'];
if($id==NULL){exit;}
header('Content-Type: text/html; charset=utf-8');

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
$localiza = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
$localiza = str_replace('api-bot.php','getvideo.php',$localiza);
$web = yt($localiza.'?videoid='.$id.'&type=Download');
$download = explode('<span class="itag">18</span> <a href="',$web);
$download = explode('" class="mime">',$download[1]);
$titulo = explode('\title',$web);
$titulo = explode('/title',$titulo[1]);
$titulo = $titulo[0];
$download = yt($download[0]);
if($download==NULL){?><style type="text/css">
body {
	background-color:#FFF359;
}
</style><?php exit;}
file_put_contents('videos/'.$titulo.' .mp4',$download);
?><style type="text/css">
body {
	background-color: #900;
}
</style>