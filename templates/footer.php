<div id="reading-panel"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	$('.typekit-badge').hide();
	
	
	$('#news-panel ul li a').click(function(event){
		
		$('#inpictures').hide();
		
		var content_id = $(this).attr('rel');
		$('#loading-panel, #blackout').show();
		
		$("#reading-panel").load('parser.php?'+content_id,
			function(){
				$('#loading-panel').fadeOut('fast');	
				$('#reading-panel').fadeIn('fast');					
				$('body').removeClass('flow').addClass('noflow');
	 	});
				
		event.preventDefault();

	});
	
	
	
	$('#sections-panel a').click(function(event) { 
			
		$('body').removeClass('noflow').addClass('flow');
			

		if ($(this).attr('id') == 'pictures') {
			
			$('#reading-panel').hide();
			
			$('#news-panel').children().each(function (i) {
				$(this).hide();
			});
			
			$('#inpictures').show();
			
		} else {
			
			
			$('#reading-panel').hide();
			$('#sections-panel ul').children().each(function (i) {
				$(this).removeClass('active');
			});
		
			$('#news-panel').children().each(function (i) {
				$(this).hide();
			});
		
			var x = $(this)[0].href.split('#');
			$('#sections-panel .'+x[1]).addClass('active');
			$('#'+x[1]).fadeIn('fast');
					
			event.preventDefault(); 
		}
		
	});

	
	$('#blackout').click(function(event) {
		$('body').removeClass('noflow').addClass('flow');
		$('#blackout,#reading-panel, #toolbar').hide();	
	});
	
	$('#back-panel').click(function(event) {
		
	});
	
	$('#article-back').live('click', function(event){
		$('#article-view').hide();
	});
	

});
</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1600117-12");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>

