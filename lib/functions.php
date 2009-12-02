<?php

function ShowRSSinPictures($url, $new = false) {
    global $rss; 

    if ($rs = $rss->get($url, $new)) { 
			$count = 0;
            foreach ($rs['items'] as $item) { 	
	
	
					if ($item[story_image]) {
						
						echo '<li class="picture" style="background: url(image.php?file='.$item[story_image].'&width=350&height=350) top center no-repeat">';					
						echo "\t<span><a href=\"parser.php?$item[link]\">".widont($item[title])."</a></span>";
						echo "</li>\n"; 
					}
            } 

            if ($rs['items_count'] <= 0) { echo "<li>Sorry, no items found in the RSS file :-(</li>"; } 
    } 
    else { 
        echo "Sorry: It's not possible to reach RSS file $url\n<br />"; 
        // you will probably hide this message in a live version 
    }
	
}

function ShowOneRSS($url, $new = false) { 	
    global $rss; 
    if ($rs = $rss->get($url, $new)) { 
			$count = 0;
            foreach ($rs['items'] as $item) { 	
				// 12 letters per line
				if ($count == 0) {
					echo '<li class="first">';
					if ($item[story_image]) {
						echo "<a href=\"parser.php?$item[link]\" class=\"storyimage\" rel=\"".$item['dc:identifier']."\"><img src=\"image.php?file=$item[story_image]&width=300&height=200&crop=true\"/></a>";
					}
					echo "\t<a href=\"parser.php?$item[link]\" class=\"storylink\" rel=\"".$item['dc:identifier']."\">".widont($item[title])."</a>";
					echo "<p>".trundicate(($item['description']), 160)."&hellip;</p>";					

				} else if ($count < 2) {
				//	echo $item['dc:identifier'];
					echo '<li class="bigger">';
					echo "\t<a href=\"parser.php?$item[link]\" rel=\"".$item['dc:identifier']."\">".widont($item[title])."</a>";
					echo "<p>".trundicate(($item['description']), 200)."&hellip;</p>";
	                
				} else if ($count > 13) {
					echo '<li class="hidden">';					
					echo "\t<a href=\"parser.php?$item[link]\" rel=\"".$item['dc:identifier']."\">".widont($item[title])."</a>";
					echo "<p>".trundicate($item['description'])."&hellip;</p>";					
					
				} else {
					// 12 letters per line
					echo '<li class="normal">';
					echo "\t<a href=\"parser.php?$item[link]\" rel=\"".$item['dc:identifier']."\">".widont($item[title])."</a>";
					echo "<p>".trundicate($item['description'])."&hellip;</p>";
					
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
	$text = array ('</p>', '•');
	return ltrim(substr(strip_tags(str_replace($text, " ", $what)), 0, $limit));
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


function objectToArray( $object )
{
    if( !is_object( $object ) && !is_array( $object ) )
    {
        return $object;
    }
    if( is_object( $object ) )
    {
        $object = get_object_vars( $object );
    }
    return array_map( 'objectToArray', $object );
}
