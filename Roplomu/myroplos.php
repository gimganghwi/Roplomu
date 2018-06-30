<?php 
include('./common.php');
$g5['title'] = "roplo list";

include(G5_LIB_PATH.'/roplolist.lib.php');
include_once(G5_THEME_MOBILE_PATH.'/head.php');

?>
<!-- 메인 시작 -->
<main>
	<?php echo roplolist('theme/basic', 60); ?> 
</main>
<!-- 메인 끝 -->
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>