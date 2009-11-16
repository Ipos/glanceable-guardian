<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

define("GUARDIANAPI_DEBUG", false);

require_once('config.php');
require_once('lib/functions.php');
require_once('lib/openplatform/content/search.php');
require_once('lib/openplatform/content/tag.php');
require_once('lib/openplatform/content/tags.php');
require_once('lib/openplatform/content/item.php');

$content_id = $_SERVER['QUERY_STRING'];

$item = new GuardianAPI_item();
$item->id = $content_id;
$item->get_item();

include('templates/article-view.php');




