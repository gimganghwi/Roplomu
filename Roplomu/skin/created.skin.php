<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.SKIN_URL.'/style.css">', 0);
?>

<?php 
ob_start();
?>
<!-- <img src="" style=""> -->
<i class="fas fa-check" style=""></i>
<?php
$create_welcome_header=ob_get_clean();
?>

<?php
	ob_start();
?>
<article class="rp_atc">
	<h1>roplo 생성 완료!</h1>
	<p>
	 roplo를 초기 상태로 자동 준비해서 지금 당장 사용할 수 있습니다. 생성된 roplo로 바로 이동하세요.
	</p>
	<p>			 	
	 또는, roplo관리자 메뉴로 이동해서 roplo를 세부설정하세요.
	</p>
</article>
<div class="rp_button_wrapper" style="align-items: center;">
	<a href="<?php echo $r_url['$roplomu_ur'].'/'.$roplo_id ?>" class="itt rp_button"> 생성된 roplo로 이동 </a>
</div>
<div class="#" style="align-items: center;">
	<a href="<?php echo G5_BBS_URL ?>/login.php" class=" rp_button"> roplo 관리자 </a>
</div>

<?php
$create_welcome_content=ob_get_clean();
?>
	<div id="cre_ro_po"class="postcard">
	<div class="pc-dr">
		<?php echo $create_welcome_header ?>
		<?php echo $create_welcome_content ?>
	</div >
	<div class='pc-msg'>
	</div>
	</div>	