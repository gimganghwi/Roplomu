<?php 
include('./common.php');
include('./head.php');
include('./header.php');
?>
<!-- 메인 시작 -->
<main>
	<div>
		<span> <?php echo $roplo['profile']['name']?></span>
	</div>
	<div>
		<span> <?php echo $roplo['profile']['age']?></span>
	</div>
	<div>
		<span> <?php echo $roplo['profile']['biology']?></span>
	</div>
</main>
<!-- 메인 끝 -->
<?php
include('./footer.php');
include('./tail.php');
?>