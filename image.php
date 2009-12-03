<?php
$fileName = (isset($_GET['file'])) ? urldecode($_GET['file']) : null;
$width = (isset($_GET['width'])) ? urldecode($_GET['width']) : null;
$height = (isset($_GET['height'])) ? urldecode($_GET['height']) : null;
$crop = (isset($_GET['crop'])) ? urldecode($_GET['crop']) : null;
$filePath = './cache/imgcache_'.md5($fileName).$width.$height.$crop;

if (file_exists($filePath)) {
	// send 
	readFile($filePath);
} else {
	include('./lib/phpthumb/ThumbLib.inc.php');	
	// generate and cache
	$options = array('resizeUp'=> true);
	$thumb = PhpThumbFactory::create($fileName, $options);	
	// 
	if ($crop == 'true') {
		$thumb->adaptiveResize($height,$width)->cropFromCenter(230,150)->save($filePath)->show();
	} else {
		$thumb->adaptiveResize($height,$width)->save($filePath)->show();
	}
}
