<div id="reading-panel" width="800px" height="1000px"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#sections-panel a').click(function () { 
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
		
	});
	
	$('#back-panel').click(function () {
		$(this).hide();
		
		$('#reading-panel, #sidebar, #toolbar').hide();
	})

	$('#news-panel ul li a').click(function(){
		var url = $(this).attr('href') + '/print';
		
		$("#reading-panel").load(url);		
		$('#reading-panel').show();
		$('#toolbar, #back-panel').show();		

		
		event.preventDefault();
	});
	

});
</script>
</body>
</html>

