<?php 
include('./common.php');
include('./head.php');
include('./header.php');

?>
<!-- 메인 시작 -->
<main>
	<?php for ( $i=0; $i<count($roplo['pages']); ++$i) { ?>
	<!-- 페이지 시작 -->
	<div class='roplo_page'>
		<div>
			<span> <?php echo $roplo['pages'][$i]['writer'] ?></span>
		</div>
		<div>
			<img src="<?php echo $roplo['pages'][$i]['illustration'] ?>"/>
		</div>
		<div>
			<span> <?php echo $roplo['pages'][$i]['content'] ?></span>
		</div>
	</div>
	<div>
		
	</div>
	<!-- 페이지 끝-->
	<?php } ?>
</main>
<!-- 메인 끝 -->
<?php
include('./footer.php');
include('./tail.php');
?>