<?php


?>
<div id="toolbar">
	<ul>
		<li><a href="" id="article-back">X Close</a></li>
		<li><a href="#" id="instapaper">Read Later</a> (<a href="#">What&apos;s this?</a>) </li>
		<li><a href="#" id="twitter">Tweet this story</a></li>
		<li><a href="#">Link</a></li>
	</ul>
</div>
<div class="article">
	<h1><?=widont($item->headline);?></h1>

	<p><?=$item->type_specific['body']; ?></p>
	
</div>
