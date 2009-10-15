<?php
/*
	Annoyingly there's no way to get the correct item ID from the urls in the rss feed, 
	so we must parse each url and grab the url from the email to a friend link
*/

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$url = 'http://www.guardian.co.uk/politics/2009/oct/14/gordon-brown-davidcameron';

$dom = new domDocument;
@$dom->loadHTML(file_get_contents($url));
$dom->preserveWhiteSpace = false;
$xpath = new DOMXpath($dom);
// need to find all links with the classname .sendlink
$links = $xpath->query("//div[contains(concat(' ',normalize-space(@class),' '),' sendlink ')]");
$ret = array();
foreach ($links as $tag) {
$ret[$tag->getAttribute('href')] = $tag->childNodes->item(0)->nodeValue;
}
print_r($ret);