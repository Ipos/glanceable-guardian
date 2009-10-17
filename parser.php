<?php
/*
	Annoyingly there's no way to get the correct item ID from the urls in the rss feed, 
	so we must parse each url and grab the url from the email to a friend link

	Once we've got it we shove it in an sqlite database so we don't have to go and get it again.
	
	
*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$db = new SQLiteDatabase("./cache/article-lookup.sqlite"); 

// parsing bit
$url = $_SERVER['QUERY_STRING'];
if (!$url) { die('Bye'); }

/*
	debug and show all the rows
*/
if ($url == 'debug') {
	
	$result = $db->query("SELECT * FROM cache"); 

	while ($result->valid()) { 
	    // fetch current row 
	    $row = $result->current();      
	    print_r($row); 
	    $result->next(); 
	} 
	die('all rows');
	
} else if ($url == 'create') {
	

	$db->query("
		CREATE TABLE cache(id INTEGER PRIMARY KEY, url CHAR(500), content_id INTEGER); 
	");
	die('new cache db created');	
}



// check if exists in cache
$known_id = $db->arrayQuery("SELECT content_id FROM cache WHERE url = '$url'", SQLITE_ASSOC); 

// check if is in cache
if ($known_id){
	
	echo 'content id:' .$known_id[0]['content_id'];
	die();

} else {
	
	echo "not in cache";
	
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

echo "added to cache";
echo 'content id:' .$content_id[0];


// destroy cache db connection
unset($db); 

}

?>