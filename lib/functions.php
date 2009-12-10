<?php

function ShowRSSinPictures($url, $new = false) {
    global $rss; 

    if ($rs = $rss->get($url, $new)) { 
			$count = 0;
			$output = 0;
			
            foreach ($rs['items'] as $item) { 	
	
				if ($item[story_image]) {						
					$output .= '<li class="picture" style="background: url(image.php?file='.$item[story_image].'&width=350&height=350&crop=false) top center no-repeat">';					
					$output .= "\t<span><a href=\"parser.php?=".$item['dc:identifier']."\" class=\"storylink\" rel=\"".$item['dc:identifier']."\">".widont($item[title])."</span></a>";
					$output .= "</li>\n";
				}

            } 
		
		if ($rs['items_count'] <= 0) { echo "<li>Sorry, no items found in the RSS file :-(</li>"; } 
    } 
    else { 
        echo "Sorry: It's not possible to reach RSS file $url\n<br />"; 
        // you will probably hide this message in a live version 
    }

	return $output;

}

function ShowOneRSS($url, $new = false) { 	
    global $rss; 
    if ($rs = $rss->get($url, $new)) { 
			$count = 0;
			$output = '';

            foreach ($rs['items'] as $item) { 	
				$excerpt_length = 150;
				
				if ($item['dc:identifier']):
					
					if ($count == 0) {
						$output .= '<li class="first">';
				
						if ($item['story_image']) {
							$excerpt_length = 300;
							$output .= "<a href=\"parser.php?=".$item['dc:identifier']."\" class=\"storyimage\" rel=\"".$item['dc:identifier']."\"><img src=\"image.php?file=$item[story_image]&width=300&height=200&crop=true\"/></a>";
						}
					
					} elseif ($count < 2) {
						$output .= '<li class="bigger">';
						$excerpt_length = 200;
						
					} elseif ($count > 13) {
						$output .= '<li class="hidden">';
					} else {
						$output .= '<li class="normal">';
					}
									
					$output .= "\t<a href=\"parser.php?=".$item['dc:identifier']."\" class=\"storylink\" rel=\"".$item['dc:identifier']."\">".widont($item[title])."</a>";

					$output .= "<p>".trundicate(($item['description']), $excerpt_length)."&hellip;</p>";
				
					$output .= "</li>\n";
				
				endif;
				$count++;					
            } 
			
			return $output;
            if ($rs['items_count'] <= 0) { echo "<li>Sorry, no items found in the RSS file :-(</li>"; } 
    } 
    else { 
        echo "Sorry: It's not possible to reach RSS file $url\n<br />"; 
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


function htmlButTags($str) { 
	$str = htmlspecialchars($str);
	$str = str_replace("&lt;","<",$str);
	$str = str_replace("&gt;",">",$str);
	$str = str_replace("&quot;",'"',$str);
	$str = str_replace("&amp;",'&',$str);
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
