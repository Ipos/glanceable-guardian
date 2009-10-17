<?php
include('lib/functions.php');
$url = $_SERVER['QUERY_STRING'];

echo get_content_id($url);
