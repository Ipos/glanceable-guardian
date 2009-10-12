<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="templates/js/jquery.localscroll-1.2.6-min.js" type="text/javascript" charset="utf-8"></script>
<script src="templates/js/jquery.scrollTo-1.4.0-min.js" type="text/javascript" charset="utf-8"></script>


<script type="text/javascript">
$(document).ready(function() {
	$('#sections-panel a').click(function () { 
		$('#news-panel').children().each(function (i) {
			$(this).hide();
		});
		var x = $(this)[0].href.split('#');
		$('#'+x[1]).show();
		console.log(x[1]);

		
		event.preventDefault(); 
	});
});
</script>
</body>
</html>

