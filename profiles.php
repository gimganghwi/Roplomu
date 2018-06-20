<?php 
include('./common.php');
include('./head.php');
include('./header.php');
?>
<!-- 메인 시작 -->
<main>
	<?php for ( $i=0; $i<count($roplo['profiles']); ++$i) { ?>
	<!-- 프로필 시작 -->
	<div class='roplo_profile'>
		<div>
			<span> <?php echo $roplo['profiles'][$i]['name']?></span>
		</div>
		<div>
			<span> <?php echo $roplo['profiles'][$i]['age']?></span>
		</div>
	</div>
	<div>
		
	</div>
	<!-- 프로필 끝-->
	<?php } ?>
</main>
<!-- 메인 끝 -->
<?php
include('./footer.php');
include('./tail.php');
?>