<?php 
include('./common.php');
include('./head.php');
include('./header.php');

// 불법접근을 막도록 토큰생성
set_session('ss_check_mb_id', $mb_id);

if ($w == '') {
	$title = '가입';
} else if ($w == 'u') {
	$title = '프로필 수정';
}

?>
<!-- 메인 시작 -->
<main>
	<h1><?php echo $title; ?></h1>
	<form method="post" action="profile_update.php">
		<input type="hidden" name="w" value="<?php echo $w ?>">
		<input type="hidden" name="member_id" value="<?php echo $member['mb_id']?>">
		<input type="hidden" name="roplo_id" value="<?php echo $roplo_id ?>">
		<input type="hidden" name="profile_id" value="<?php echo $w=='u' ? $profile['id'] : '' ?>">
		
		<?php if ($w == '') {?>
		
		<?php echo $roplo['title'] ?>에 가입
		<button type="submit">가입</button>
		
		<?php } else if ($w == 'u') {?>
		
		<label for='title'> 이름 : </label>
		<input type="text" name="profile_name" <?php echo $w=='u'?"value='".$profile['name']."'":"" ?>><br>
		<label for='title'> 가명 : </label>
		<input type="text" name="profile_subname"<?php echo $w=='u'?"value='".$profile['subname']."'":"" ?>><br>
		<label for='title'> age_flag : </label>
		<select name="profile_age_flag">
			<option value="none">none</option>
			<option value="unknown">unknown</option>
			<option value="normal">normal</option>
			<option value="demigod">demigod</option>
		</select><br>
		<label for='title'> 나이 : </label>
		<input type="text" name="profile_age"<?php echo $w=='u'?"value='".$profile['age']."'":"" ?>><br>
		<label for='title'> 신체나이 : </label>
		<input type="text" name="profile_physical_age"<?php echo $w=='u'?"value='".$profile['physical_age']."'":"" ?>><br>
		<label for='title'> 실제나이 : </label>
		<input type="text" name="profile_biological_age"<?php echo $w=='u'?"value='".$profile['biological_age']."'":"" ?>><br>
		<label for='title'> 소개글 : </label>
		<input type="text" name="profile_biology"<?php echo $w=='u'?"value='".$profile['biology']."'":"" ?>><br>

		<button type="submit">저장</button>
		
		<?php } ?>
		
	</form>
</main>
<!-- 메인 끝 -->
<?php
include('./footer.php');
include('./tail.php');
?>