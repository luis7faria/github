<?php
/*$a=1;
$b=1;
$GLOBALS['b'];
while($a==$b){
$i=$i+1;
echo $i.'<br />';
if($i==33){$b=2;}
#http://gdata.youtube.com/feeds/api/users/luis2faria/uploads/?start-index=50&max-results=50;
}*/
$user = $_GET['user'];
if($user==NULL){exit;}
header('Content-Type: text/html; charset=utf-8');
function api($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_NTLM);    
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
    #curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
 	
	curl_setopt($ch, CURLOPT_COOKIESESSION, true);
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	
    $data = curl_exec($ch); 
    curl_close($ch);
 
    return $data;
}
#1 51 101 151
$api = api('http://gdata.youtube.com/feeds/api/users/'.$user.'/uploads/?start-index=1&max-results=50');

$api = explode('http://gdata.youtube.com/feeds/api/videos',$api);
for($i=0;$i<count($api);$i++){
	$apix[$i] = explode('/related',$api[$i]);
}
#print_r($apix);
$k=5;
$r=0;
for($y=0;$y<count($apix);$y++){
if(!$apix[$k][0]==NULL){
$apiy[$r] = str_replace('/','',$apix[$k][0]);
$r=$r+1;
$k=$k+3;}
}

$total = api('http://www.youtube.com/watch?v='.$apiy[0]);
$total = explode('data-sessionlink=',$total);
$total = strip_tags($total[3]);
$total = explode('watch">',$total);
$totaly = $total[1];
preg_match_all('!\d+!', $totaly, $matches);
$totalcanal = $matches[0][0].$matches[0][1];
echo $total = ceil($totalcanal/50);


#print_r($apiy)
?>