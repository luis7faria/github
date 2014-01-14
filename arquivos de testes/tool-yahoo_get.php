<?php
if($_GET['b']==NULL || $_GET['n']==NULL){exit;}
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
for($a=0;$a<$_GET['n'];$a++){
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
echo trim($var[1]).'<br/>';
flush();	}}
}
	}
?>