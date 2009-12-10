<?php 
	if(stripos($_SERVER["HTTP_HOST"], "glanceableguardian.nfshost.com") !== FALSE){
		$status = "live";
	    ini_set( 'display_errors', 0 );
		
	}elseif(stripos($_SERVER["HTTP_HOST"], "glanceableguardianstaging.nfshost.com") !== FALSE){
		$status = "staging";
	    error_reporting( E_ERROR | E_USER_ERROR );
	    ini_set( 'display_errors', 1 );
	}else{
	    error_reporting( E_ERROR | E_USER_ERROR | E_WARNING );
	    ini_set( 'display_errors', 1 );
	}

	include('./lib/lastRSS.php');
	include('./lib/functions.php');	
	
	$rss = new lastRSS; 

	include('config.php');

	include('./templates/body.php');