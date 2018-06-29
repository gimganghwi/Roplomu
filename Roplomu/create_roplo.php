<?php 
include('./common.php');
include('./head.php');
include('./header.php');

// 불법접근을 막도록 토큰생성
set_session('ss_check_mb_id', $mb_id);

$title='roplo';
if ($w == '') {
	$title.= ' 생성';
} else if ($w == 'u') {
	$title.= ' 수정';

	// 수정 권한 확인
	if($member['mb_id'] && $roplo['admin_id'] === $member['mb_id']) {
        ;
    } else {
		alert('수정할 권한이 없습니다.');
    }
}

?>
<!-- 메인 시작 -->
<main>
	<h1><?php echo $title; ?></h1>
	<form method="post" action="create_roplo_update.php">
		<input type="hidden" name="w" value="<?php echo $w ?>">
		<input type="text" name="admin_id" value="<?php echo $member['mb_id']?>" readonly ><br>
		<label for='id'> 주소 : </label> <?php echo $server_url.'/' ?><input type="text" name="id" <?php echo $w=='u'?'readonly':'' ?> <?php echo $w=='u'?"value='{$roplo['id']}'":"" ?>> <br>
		<label for='title'> 제목 : </label> <input type="text" name="title" <?php echo $w=='u'?"value='{$roplo['title']}'":"" ?> > <br>
		<label for='logofile'> 로고 이미지 : </label> <input type="file" name="logofile"> <br>
		<button type="submit">생성</button>
	</form>
</main>
<!-- 메인 끝 -->
<?php
include('./footer.php');
include('./tail.php');
?>