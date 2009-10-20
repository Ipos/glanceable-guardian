<?php



require_once('config.php');
require_once('lib/functions.php');

// Go and get the latest rss update, send to cache

foreach ($news_zones as $zone => $feedurl):
	ShowOneRSS($feedurl);
endforeach;

foreach ($toplevel as $section => $feedurl):
	ShowOneRSS($feedurl);
endforeach;

