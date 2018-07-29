<?php
include_once('./_common.php');

@include_once(G5_ADM_PATH.'/safe_check.php');
if(function_exists('social_log_file_delete')){
    // social_log_file_delete(86400);      //소셜로그인 디버그 파일 24시간 지난것은 삭제
}

set_session('roplo_id', $roplo_id); 
// $g5['title'] = '관리자메인';

include_once(G5_PATH.'/head.sub.php');
?>

<noscript>
    스크립트 설정을 켜지 않으면 사용할 수가 없습니다.
</noscript>

<a href="<?php echo $r_url->roplo ?>">홈으로</a>>

<section id="basic">
<?php include('./basic.php')?>
</section>

<section id="nav">
<?php include('./nav.php')?>
</section>

<section id="profile_def">
<?php include('./profile_def.php')?>
</section>

<?php include_once(G5_PATH.'/tail.sub.php'); ?>