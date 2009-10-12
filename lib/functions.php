<?php

function ShowOneRSS($url) { 	
    global $rss; 
    if ($rs = $rss->get($url)) { 
			$count = 0;
            foreach ($rs['items'] as $item) { 
				if ($count == 0) {
					echo '<li class="first">';
				} else if ($count < 3) {
					echo '<li class="bigger">';
				} else {
					echo '<li class="normal">';	
				}
                echo "\t<a href=\"$item[link]\">$item[title]</a>";
								
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
