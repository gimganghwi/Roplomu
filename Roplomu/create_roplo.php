<?php 
include_once('./_common.php');

include_once(G5_THEME_PATH.'/head.php');

// 불법접근을 막도록 토큰생성
set_session('ss_check_mb_id', $mb_id);

$title='roplo';
if ($w == '') {
$title.= ' 생성';

// To-Do : 생성 권한 확인
// if () {}

} else if ($w == 'u') {
$title.= ' 수정';

// 수정 권한 확인
if($member['mb_id'] && $roplo['admin_id'] === $member['mb_id']) {
    ;
} else {
	alert('수정할 권한이 없습니다.');
}
}
$g5['title'] = $title;
?>
<!-- 메인 시작 -->
<main>
	<?php include SKIN_PATH.'/create.skin.php'; ?> 
</main>
<!-- 메인 끝 -->
<?php
//include('./footer.php');
include_once(G5_THEME_PATH.'/tail.php');
?>