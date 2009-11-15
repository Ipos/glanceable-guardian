<?php

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include('./lib/lastRSS.php');
include('./lib/functions.php');	
$rss = new lastRSS; 

include('config.php');

// Go and get the latest rss update, send to cache

foreach ($news_zones as $zone => $feedurl):
	echo $zone;
	ShowOneRSS($feedurl, true);
endforeach;

foreach ($toplevel as $section => $feedurl):
	echo $section;
	ShowOneRSS($feedurl, true);
endforeach;

foreach ($toplevel as $section => $feedurl):
	echo $section;
	ShowRSSinPictures($feedurl, true);
endforeach;


