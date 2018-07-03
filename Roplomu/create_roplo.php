<?php 
include('./common.php');

include(G5_LIB_PATH.'/roplocreate.lib.php');
include_once(G5_THEME_MOBILE_PATH.'/head.php');
//include('./header.php');
?>
<!-- 메인 시작 -->
<main>
	<?php echo roplocreate('theme/basic', 60); ?> 
</main>
<!-- 메인 끝 -->
<?php
//include('./footer.php');
include_once(G5_THEME_PATH.'/tail.sub.php');
?>