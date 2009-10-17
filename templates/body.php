<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>glance guardian</title>
	<link rel="stylesheet" href="./templates/screen.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
</head>

<body>

	<div id="toolbar">
		<a href="#">Read Later</a>
	</div>
		
	<div id="sections-panel">
		<ul>
		<?php foreach ($toplevel as $section => $feedurl):?>
			<li class="<?=slugit($section)?>"><a href="#<?=slugit($section)?>"><?=$section?></a></li>
		<?php endforeach;?>
		<li><a href="http://www.guardian.co.uk/news/gallery/2009/oct/11/1">In Pictures</a></li>
		</ul>
	</div>

	<div id="back-panel">
		Hello
	</div>

	<div id="news-panel">	
	<?php foreach ($toplevel as $section => $feedurl):?>
	<div id="<?=slugit($section)?>">
	<h2><?=$section;?></h2>
		<ul>
			<?php ShowOneRSS($feedurl); ?>
		</ul>
		</div>	
	<?php endforeach;?>

	
</div>



<?php include('footer.php')?>
