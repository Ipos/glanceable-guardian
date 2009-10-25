<!DOCTYPE html>
<html>
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
			<li class="<?=slugit($section)?> <?php if ($section == 'News'){?>active<?php } ?>"><a href="#<?=slugit($section)?>"><?=$section?></a>
			<?php if ($section == 'News'):?>
			
			<?php foreach ($news_zones as $zone => $feedurl):?>
			<li class="zone <?=slugit($zone)?>"><a href="#<?=slugit($zone)?>"><?=$zone?></a></li>
			<?php endforeach;?>
				
			<?php endif;?>
			</li>
		<?php endforeach;?>
			<li><a href="#pictures" id="pictures">In Pictures</a></li>
		</ul>
	</div>

	<div id="back-panel">
		Hello
	</div>

	<div id="news-panel">	
		<?php foreach ($news_zones as $zone => $feedurl):?>
		<div id="<?=slugit($zone)?>">	
		<h2 class="section-header"><?=$zone;?></h2>		
			<ul>
				<?php ShowOneRSS($feedurl); ?>
			</ul>
		</div>	
		<?php endforeach;?>	
	
		<?php foreach ($toplevel as $section => $feedurl):?>
		<div id="<?=slugit($section)?>" <?php if ($section == 'News'){?> style="display: block"<?php } ?>>
		<h2 class="section-header"><?=$section;?></h2>		
			<ul>
				<?php ShowOneRSS($feedurl); ?>
			</ul>
		</div>	
		<?php endforeach;?>

		<div id="inpictures">
			<h2 class="section-header">News in Pictures</h2>
			<ul>
				<?php foreach ($news_zones as $zone => $feedurl):?>
					<?php ShowRSSinPictures($feedurl)?>
				<?php endforeach;?>
			</ul>
		</div>
	</div>



<?php include('footer.php')?>
