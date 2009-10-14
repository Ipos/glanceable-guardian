<iframe id="reading-panel" width="800px" height="1000px"></iframe>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="templates/js/jquery.localscroll-1.2.6-min.js" type="text/javascript" charset="utf-8"></script>
<script src="templates/js/jquery.scrollTo-1.4.0-min.js" type="text/javascript" charset="utf-8"></script>


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
	
	$('#news-panel ul li a').click(function(){
		var url = $(this).attr('href') + '/print';
		$('#reading-panel').attr('src', url);
		$('#reading-panel').show();
		$('#toolbar').show();		
		$('#sidebar').show();				
		
		event.preventDefault();
	});
	

	
	
});
</script>
</body>
</html>

