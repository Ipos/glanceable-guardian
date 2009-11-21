<?php
include('./lib/phpthumb/ThumbLib.inc.php');	
$fileName = (isset($_GET['file'])) ? urldecode($_GET['file']) : null;

if (fileExists('/Users/tom/Sites/glanceable-guardian/cache/img-'.md5($fileName)) {
	// send 
} else {
	// generate and cache
	$thumb = PhpThumbFactory::create($fileName);	
	$thumb->adaptiveResize(170, 150);
	$thumb->save('/Users/tom/Sites/glanceable-guardian/cache/img-'.md5($fileName),'jpg');	
	$thumb->show();
}



