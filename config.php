<?php

// Set cache dir and cache time limit
$rss->cache_dir = './cache'; 
$rss->cache_time = 1200;
$rss->stripHTML = true;
$rss->items_limit = 15;

// Guardian API
define("GUARDIANAPI_KEY", "");
define("GUARDIANAPI_URL", "http://api.guardianapis.com/content/");
define("GUARDIANAPI_DEBUG", true);


$toplevel = array (
	'News' => 'http://feeds.guardian.co.uk/theguardian/rss',
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
	'UK' => 'http://feeds.guardian.co.uk/theguardian/uk/rss',
	'World' => 'http://feeds.guardian.co.uk/theguardian/world/rss',	
	'Politics' => 'http://feeds.guardian.co.uk/theguardian/politics/rss',			
	'Media' => 'http://feeds.guardian.co.uk/theguardian/media/rss',				
	'Education' => 'http://feeds.guardian.co.uk/theguardian/education/rss',		
	'Society' => 'http://feeds.guardian.co.uk/theguardian/society/rss',				
	'Science' => 'http://www.guardian.co.uk/science/rss',
	'Technology' => 'http://feeds.guardian.co.uk/theguardian/technology/rss'
);

