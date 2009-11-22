<?php 
	if (stripos($_SERVER['HTTP_HOST'], '.site')) {
		error_reporting(E_ERROR | E_WARNING | E_PARSE);	
	} else {
		error_reporting(0);
	}
	
	include('./lib/lastRSS.php');
	include('./lib/functions.php');	
	
	$rss = new lastRSS; 

	include('config.php');

	include('./templates/body.php');