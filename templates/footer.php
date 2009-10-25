<div id="reading-panel"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	
	


	$('#news-panel ul li a').click(function(event){

		var url = $(this).attr('href');
		$('#reading-panel').show();
		$('#reading-panel').html('Loading ...');
		$("#reading-panel").load(url);		
		
		event.preventDefault();

	});
	
	
	
	$('#sections-panel a').click(function(event) { 
		console.log($(this).id);

		if ($(this).attr('id') == 'pictures') {
			
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
</body>
</html>

