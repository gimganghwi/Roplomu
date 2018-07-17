
<script type="text/javascript">
	$(document).ready(function(){
		$("#aside-over-close").click(function(){
			$("#aside-over").hide();
		});
		$("#aside-over-open").click(function(){
			$("#aside-over").show();
		});
		$("#nav-masonry-open").click(function(){
			$("nav > .masonry").toggle();
		});

		if ( $( document ).width() < 400 ) {
			$("#aside-over").hide();
			$("nav > .masonry").hide();
		}
	});
</script>
<?php include_once(G5_PATH.'/tail.sub.php'); ?> 