<?php

if ( ! defined( 'ROOT_PATH' ) ) {
	define( 'ROOT_PATH', __DIR__ . '/' );
}

if ( ! defined( 'ROOT_URI' ) ) {
	function pathUrl($dir = __DIR__) {
		$root = "";
		$dir = str_replace('\\', '/', realpath($dir));
		//HTTPS or HTTP
		$root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';
		//HOST
		$root .= '://' . $_SERVER['HTTP_HOST'];
		//ALIAS
		if(!empty($_SERVER['CONTEXT_PREFIX'])) {
			$root .= $_SERVER['CONTEXT_PREFIX'];
			$root .= substr($dir, strlen($_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ]));
		}
		else {
			$root .= substr($dir, strlen($_SERVER[ 'DOCUMENT_ROOT' ]));
		}
		$root .= '/';
		return $root;
	} 
	define( 'ROOT_URI', pathUrl(ROOT_PATH) );
}

// Get locale URI
function GetURI() {
	$URI = strtok($_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '?');
	if (substr($URI, -1) != "/") {
		$URI = substr($URI, 0, -iconv_strlen(basename($URI)));
	}
	return $URI;
}