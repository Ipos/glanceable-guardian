<?php 
	if(stripos($_SERVER["HTTP_HOST"], "glanceableguardian.nfshost.com") !== FALSE){
		$status = "live";
		error_reporting(0);
	}elseif(stripos($_SERVER["HTTP_HOST"], "glanceableguardianstaging.nfshost.com") !== FALSE){
		$status = "staging";
		error_reporting(E_ERROR | E_WARNING | E_PARSE);		
	}else{
		$status = "development";
		error_reporting(E_ERROR | E_WARNING | E_PARSE);		
	}

	include('./lib/lastRSS.php');
	include('./lib/functions.php');	
	
	$rss = new lastRSS; 

	include('config.php');

	include('./templates/body.php');