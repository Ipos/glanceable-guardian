<?php
include('./lib/phpthumb/ThumbLib.inc.php');	
$fileName = (isset($_GET['file'])) ? urldecode($_GET['file']) : null;
$width = (isset($_GET['width'])) ? urldecode($_GET['width']) : null;
$height = (isset($_GET['height'])) ? urldecode($_GET['height']) : null;
$filePath = './cache/imgcache_'.md5($fileName).$width.$height;

if (file_exists($filePath)) {
	// send 
	readFile($filePath);
} else {
	// generate and cache
	$options = array('resizeUp'=> true);
	$thumb = PhpThumbFactory::create($fileName, $options);	
	$thumb->adaptiveResize($height,$width)->save($filePath)->show();
}
