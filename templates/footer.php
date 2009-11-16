<div id="reading-panel"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	$('body').show();
	
	
	$('#news-panel ul li a').click(function(event){

		var content_id = $(this).attr('rel');
		$('#reading-panel').show();
		$('#reading-panel').html('Loading ...');
		$("#reading-panel").load('parser.php?'+content_id);		
		
		event.preventDefault();

	});
	
	
	
	$('#sections-panel a').click(function(event) { 
		console.log($(this).id);

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
			$('#'+x[1]).show('fast');
		
		
			event.preventDefault(); 
		}
		
	});

	
	$('#back-panel').click(function(event) {
		$(this).hide();
		
		$('#reading-panel, #sections-panel, #toolbar').hide();
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

