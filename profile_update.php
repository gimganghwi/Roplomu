<?php 
include('./common.php');

// 세션 확인
if ($tmp_session_check && get_session('ss_check_mb_id') != $mb_id ) {
	alert('올바른 방법으로 이용해 주십시오.');
}

// 폼으로부터 받을 값들
$profile_id = trim($_POST['profile_id']);
$profile_member_id = trim($_POST['member_id']);
$profile_roplo_id = trim($_POST['roplo_id']);
$profile_name = trim($_POST['profile_name']);
$profile_subname = trim($_POST['profile_subname']);
$profile_age_flag = trim($_POST['profile_age_flag']);
$profile_age = trim($_POST['profile_age']);
$profile_physical_age = trim($_POST['profile_physical_age']);
$profile_biological_age = trim($_POST['profile_biological_age']);
$profile_biology = trim($_POST['profile_biology']);

if ($w == '') {

	// 이미 가입되어있으면 가입할 수 없다.
	if ($is_roplomu){
		alert('올바른 방법으로 이용해주십시오.');
	}

	// 튜풀 삽입 
	$sql = "insert into {$table_profile}
			set member_id = '{$profile_member_id}',
			roplo_id = '{$profile_roplo_id}'";
	sql_fetch($sql);

	alert('가입 완료!');

} else if ($w == 'u') {

	// 수정 권환 확인 
	if ( $profile_member_id !== $member['mb_id'] ){
		alert('올바른 방법으로 이용해주십시오.');
	}

	// 튜풀 변경
	$sql = "update {$table_profile}
			set name = '{$profile_name}',
			subname = '{$profile_subname}',
			age_flag = '{$profile_age_flag}',
			age = '{$profile_age}',
			physical_age = '{$profile_physical_age}',
			biological_age = '{$profile_biological_age}',
			biology = '{$profile_biology}'
			where id = '{$profile_id}'";
	sql_fetch($sql);

	alert("변경 완료!");
}
?>