<?php
$user = $_GET['user'];
if($user==NULL){exit;}

$a = 1;
$b = 1;
$d = 1;
$GLOBALS['b'];
function api($url) {
	$ch = curl_init();
	#$timeout = 30;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.8.1.14) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

while($a==$b){
	
#1 51 101 151

$api = api('http://gdata.youtube.com/feeds/api/users/'.$user.'/uploads/?start-index='.$d.'&max-results=50');
$d = $d + 50;
$api = explode('http://gdata.youtube.com/feeds/api/videos',$api);
for($i=0;$i<count($api);$i++){
	$apix[$i] = explode('/related',$api[$i]);
}
#print_r($apix);
#if($apix[5][0]==NULL){$b=2;}
$k=5;
for($y=0;$y<count($apix);$y++){
if(!$apix[$k][0]==NULL){
echo $apix[$k][0].'<br /> ';
$k=$k+3;}
}
flush();

}
?>