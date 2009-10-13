<?php 
	// Report simple running errors
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	include('./lib/lastRSS.php');
	include('./lib/functions.php');	
	$rss = new lastRSS; 

	include('config.php');

	include('./templates/body.php');