<?php

header('Content-Type: text/html; charset=utf-8');

if ( !isset( $_GET['user'] ) || empty( $_GET['user'] ) ) {
	die( 'Nome de usu&aacute;rio inv&aacute;lido' );
}

$user = $_GET['user'];

function GetNumberUploads( $user ) {
	if ( ( $url = "http://gdata.youtube.com/feeds/api/users/{$user}/uploads/?start-index=1&max-results=0" ) && ( $sxml = @simplexml_load_file( $url ) ) === false ) die( "Canal inexistente" );
	return $sxml->children( 'http://a9.com/-/spec/opensearchrss/1.0/' )->totalResults;
}

echo GetNumberUploads( trim( $user ) );
die();


?>