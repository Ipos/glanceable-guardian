<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>glance guardian</title>
	<link rel="stylesheet" href="./templates/screen.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
</head>

<body>
	
	<div id="sections-panel">
		<ul>
		<?php foreach ($toplevel as $section => $feedurl):?>
			<li class="<?=strtolower($section)?>"><a href="#<?=strtolower($section)?>"><?=$section?></a></li>
		<?php endforeach;?>
		</ul>
	</div>

	<div id="news-panel">	
	<?php foreach ($toplevel as $section => $feedurl):?>
	<div id="<?=strtolower($section)?>">
	<h2><?=$section;?></h2>
		<ul>
	<?php ShowOneRSS($feedurl); ?>
		</ul>
		</div>	
	<?php endforeach;?>

	
</div>



<?php include('footer.php')?>
