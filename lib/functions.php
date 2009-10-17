<?php

function ShowOneRSS($url) { 	
    global $rss; 
    if ($rs = $rss->get($url)) { 
			$count = 0;

            foreach ($rs['items'] as $item) { 
				// 12 letters per line
				if ($count == 0) {
					echo '<li class="first">';
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']), 160)."&hellip;</p>";					

				} else if ($count < 3) {
				// 9 letters per line
					echo '<li class="bigger">';
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']), 140)."&hellip;</p>";
	                
				} else if ($count > 11) {
					echo '<li class="hidden">';					
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']))."&hellip;</p>";					
					
				} else {
					// 12 letters per line
					echo '<li class="normal">';
					echo "\t<a href=\"parser.php?$item[link]\">".widont($item[title])."</a>";
					echo "<p>".trundicate(strip_tags($item['description']))."&hellip;</p>";
					
				}
				echo "</li>\n"; 
				$count++;	
            } 

            if ($rs['items_count'] <= 0) { echo "<li>Sorry, no items found in the RSS file :-(</li>"; } 
    } 
    else { 
        echo "Sorry: It's not possible to reach RSS file $url\n<br />"; 
        // you will probably hide this message in a live version 
    } 
} 

// turns string into a HTML/CSS slug for referencing other stuff
function slugit($slug) {
	$badness = array('&amp;',' ');
    $slug =	trim(str_replace($badness,'-',$slug));
	$slug = strtolower($slug);
	return $slug;
}

function trundicate($what, $limit = 100) {
	return substr($what, 0, $limit);
}

function widont($str = '')
{
	$str = rtrim($str);
	$space = strrpos($str, ' ');
	if ($space !== false)
	{
		$str = substr($str, 0, $space).'&nbsp;'.substr($str, $space + 1);
	}
	return $str;
}