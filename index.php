<?php 

	include('config.php');
	include('./lib/lastRSS.php');
	include('./lib/functions.php');
	
	$rss = new lastRSS; 

	// Set cache dir and cache time limit (5 seconds), (don't forget to chmod cahce dir to 777 to allow writing) 
	$rss->cache_dir = './cache'; 
	$rss->cache_time = 12000;
	$rss->stripHTML = true;
	$rss->items_limit = 15;
	
	
	include('./templates/body.php');