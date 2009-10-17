<?php
/*
 * The Guardian Open Platform Content API PHP library
 * by Dave Nattriss (dave@natts.com)
 * V1.0 10/03/2009
 */

require_once("../../config.php");
require_once("content/search.php");
require_once("content/tag.php");
require_once("content/tags.php");
require_once("content/item.php");

define("GUARDIANAPI_DEBUG", true);


$item = new  GuardianAPI_item();
$item->id = '343985918';
$item->get_item();

echo 'a'.$item->headline;



// $search->get_results();
// 
// echo "Got " .
// 	(count($search->get_items()) == $search->get_total() ? "all " . $search->get_total() . " items" : count($search->get_items()) .
// 	" items from the total of " . $search->get_total() . 
// 	", starting from " . ($search->get_start_index() + 1) . ",") .
// 	" which should be cached for the next " . $search->get_maximum_age() . " seconds<br />";
// 
// 
// foreach ($search->get_items() as $item) {
// 	$memcache->set("GuardianAPI-item-" . $item->get_id(), $item, FALSE, $search->get_maximum_age());  // store the item in the memcache, using its ID as part of the key, and setting the cache appropriately
// 	if (GUARDIANAPI_DEBUG) var_dump($memcache->get("GuardianAPI-item-" . $item->get_id()));
// 	$last_item_id = $item->get_id();
// }
// 
// $last_item = new GuardianAPI_item($last_item_id);
// 
// echo "<br />The last item cached was this: ";
// var_dump($last_item);

?>