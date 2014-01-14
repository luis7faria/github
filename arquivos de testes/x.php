<?php
### ARQUIVO PARA TESTES
header('Content-Type: text/html; charset=utf-8');
$canal = strtolower('bandapitty');
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
		if('/user/'.$canal == $id[1]){
		echo str_replace('/watch?v=','',$id[0]).'<br />';
		flush();
		}
	}
}
?>