<?php


?>
<div id="toolbar">
	<ul>
		<li><a href="" id="article-back">X Close</a></li>
		<li><a href="#" id="instapaper">Read Later</a> (<a href="#">What&apos;s this?</a>) </li>
		<li><a href="#" id="twitter">Tweet this story</a></li>
		<li><a href="<?= $item->web_url?>">Link</a></li>
	</ul>
</div>
<div class="article">
		
		
	<h1><?=widont($item->headline);?></h1>
	<h2 class="trail"><?=widont($item->trail_text)?></h2>
	
	<p class="byline"><?= $item->byline?></p>
	
	<div class="article-body">

		<?php if ($item->trail_image_url):?>
	 		<img src="<?= $item->trail_image_url ?>" />
		<?php endif;?>
	
		<p><?= htmlButTags($item->type_specific['body']) ?></p>
	
	</div>
	
</div>
