<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>glance guardian</title>
	
	<script type="text/javascript" src="http://use.typekit.com/uzb1zfd.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<link rel="stylesheet" href="./templates/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	
</head>

<body style="display: none" class="flow">

	<div id="blackout" style="display: none"></div>
	
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
			<li><a href="#" id="pictures">In Pictures</a></li>
		</ul>
	</div>

	<div id="news-panel">	
		<?php foreach ($news_zones as $zone => $feedurl):?>
		<div id="<?=slugit($zone)?>">	
		<h2 class="section-header"><?=$zone;?></h2>		
			<ul>
				<?php echo ShowOneRSS($feedurl); ?>
			</ul>
		</div>	
		<?php endforeach;?>	
	
		<?php foreach ($toplevel as $section => $feedurl):?>
		<div id="<?=slugit($section)?>" <?php if ($section == 'News'){?> style="display: block"<?php } ?>>
		<h2 class="section-header"><?=$section;?></h2>		
			<ul>
				<?php echo ShowOneRSS($feedurl); ?>
			</ul>
		</div>	
		<?php endforeach;?>

		<div id="inpictures">
			<h2 class="section-header">News in Pictures</h2>
			<ul>
				<?php foreach ($news_zones as $zone => $feedurl):?>
					<?php echo ShowRSSinPictures($feedurl)?>
				<?php endforeach;?>
			</ul>
		</div>
	</div>


<?php include('footer.php')?>
