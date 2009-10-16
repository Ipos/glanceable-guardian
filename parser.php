<?php
/*
	Annoyingly there's no way to get the correct item ID from the urls in the rss feed, 
	so we must parse each url and grab the url from the email to a friend link
*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);


// parsing bit
$url = $_SERVER['QUERY_STRING'];



// check if exists in cache
$db = new SQLiteDatabase("./cache/article-lookup.sqlite"); 
$know_id = $db->query("
	SELECT content_id FROM cache WHERE url = '$url'
");

while ($know_id->valid()) { 
    // fetch current row 
    $content_id = $know_id->current();      
	
}


if (!$url) {
	die('Bye');
}

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


echo $content_id[0];




// caching bit
// http://devzone.zend.com/article/760


// create new database (OO interface) 
$db = new SQLiteDatabase("./cache/article-lookup.sqlite"); 
// $db->query("
// 	CREATE TABLE cache(id INTEGER PRIMARY KEY, url CHAR(500), content_id INTEGER); 
// ");

// create table foo and insert sample data 

$db->query("BEGIN; 
        INSERT INTO cache (url, content_id) VALUES('$url', $content_id[0]); 
        COMMIT;"); 

// execute a query     
$result = $db->query("SELECT * FROM cache"); 
// iterate through the retrieved rows 
while ($result->valid()) { 
    // fetch current row 
    $row = $result->current();      
    print_r($row); 
	// echo $row['content_id'];
// proceed to next row 
    $result->next(); 
} 

// not generally needed as PHP will destroy the connection 
unset($db); 

?>