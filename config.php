<?php

// Set cache dir and cache time limit (5 seconds), (don't forget to chmod cahce dir to 777 to allow writing) 
$rss->cache_dir = './cache'; 
$rss->cache_time = 1200;
$rss->stripHTML = true;
$rss->items_limit = 15;

$toplevel = array (
	'Home' => 'http://feeds.guardian.co.uk/theguardian/rss',
	'Sport' => 'http://feeds.guardian.co.uk/theguardian/sport/rss',	
	'Comment' => 'http://feeds.guardian.co.uk/theguardian/commentisfree/rss',	
	'Culture' => 'http://feeds.guardian.co.uk/theguardian/culture/rss',
	'Business' => 'http://www.guardian.co.uk/business/rss',
	'Money' => 'http://feeds.guardian.co.uk/theguardian/money/rss',
	'Life and Style' => 'http://feeds.guardian.co.uk/theguardian/lifeandstyle/rss',
	'Travel' => 'http://feeds.guardian.co.uk/theguardian/travel/rss',
	'Environment' => 'http://feeds.guardian.co.uk/theguardian/environment/rss',
	'TV and Radio' => 'http://www.guardian.co.uk/tv-and-radio/rss'
);

$news_zones = array (
	'UK' => 'http://feeds.guardian.co.uk/theguardian/uk/rss'
);

