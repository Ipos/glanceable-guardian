<?php

function ShowOneRSS($url) { 	
    global $rss; 
    if ($rs = $rss->get($url)) { 
			$count = 0;

            foreach ($rs['items'] as $item) { 
				// 12 letters per line
				if ($count == 0) {
					echo '<li class="first">';
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']), 160)."&hellip;</p>";					

				} else if ($count < 3) {
				// 9 letters per line
					echo '<li class="bigger">';
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']), 140)."&hellip;</p>";
	                
				} else if ($count > 11) {
					echo '<li class="hidden">';					
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']))."&hellip;</p>";					
					
				} else {
					// 12 letters per line
					echo '<li class="normal">';
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']))."&hellip;</p>";
					
				}
				echo "</li>\n"; 
				$count++;	
            } 

            if ($rs['items_count'] <= 0) { echo "<li>Sorry, no items found in the RSS file :-(</li>"; } 
    } 
    else { 
        echo "Sorry: It's not possible to reach RSS file $url\n<br />"; 
        // you will probably hide this message in a live version 
    } 
} 

// turns string into a HTML/CSS slug for referencing other stuff
function slugit($slug) {
	$badness = array('&amp;',' ');
    $slug =	trim(str_replace($badness,'-',$slug));
	$slug = strtolower($slug);
	return $slug;
}

function trundicate($what, $limit = 100) {
	return substr($what, 0, $limit);
}

function widont($str = '')
{
	$str = rtrim($str);
	$space = strrpos($str, ' ');
	if ($space !== false)
	{
		$str = substr($str, 0, $space).'&nbsp;'.substr($str, $space + 1);
	}
	return $str;
}

function get_content_id($url) {
	
	/*
		Annoyingly there's no way to get the correct item ID from the urls in the rss feed, 
		so we must parse each url and grab the url from the email to a friend link

		Once we've got it we shove it in an sqlite database so we don't have to go and get it again.

	*/
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$db = new SQLiteDatabase("./cache/article-lookup.sqlite"); 
	$parser_debug = false;


	// check if exists in cache
	$known_id = $db->arrayQuery("SELECT content_id FROM cache WHERE url = '$url'", SQLITE_ASSOC); 

	// check if is in cache
	if ($known_id){

		if ($parser_debug) { echo 'content id:' .$known_id[0]['content_id']; }
		return $known_id[0]['content_id']; 
		die();

	} else {

		if ($parser_debug) { echo "not in cache"; } 

		$dom = new domDocument;
		@$dom->loadHTML(file_get_contents($url));
		$dom->preserveWhiteSpace = false;
		$xpath = new DOMXpath($dom);
		// need to find all links with the classname .sendlink
		$links = $xpath->query("//a[span/text()='Send to a friend']/@href");

		// eliminate this foreach array rubbish
		$content_id = array();

		foreach ($links as $tag) {
			$value = split('/', $tag->childNodes->item(0)->nodeValue);
			$content_id[] = $value[4];
		}



	// found link, now add url and content ID to cache
	// http://devzone.zend.com/article/760

	$db->query("BEGIN; 
	        INSERT INTO cache (url, content_id) VALUES('$url', $content_id[0]);
	        COMMIT;");

	if ($parser_debug) { 
		echo "added to cache";
		echo 'content id:' .$content_id[0];
	}

	return $content_id[0];

	// destroy cache db connection
	unset($db); 

	}
	
	
}


function show_contentid_cache() {
	$db = new SQLiteDatabase("./cache/article-lookup.sqlite"); 
	

	$result = $db->query("SELECT * FROM cache"); 

	while ($result->valid()) { 
	    // fetch current row 
	    $row = $result->current();      
	    print_r($row); 
	    $result->next(); 
	} 
} 

function created_contentid_cache() {
	$db = new SQLiteDatabase("./cache/article-lookup.sqlite"); 

	$db->query("
		CREATE TABLE cache(id INTEGER PRIMARY KEY, url CHAR(500), content_id INTEGER); 
	");
	die('new cache db created');	

}

