<?php 
header("Content-Type:application/json");
function echo_json($msg='', $url='', $confirm=''){
	global $noajax;
	if ($noajax) {
		alert($msg, $url, $confirm);
	} else {
		$jsonObj = new \stdClass();
		$jsonObj->msg = $msg ? $msg : '올바른 방법으로 이용해 주십시오' ;
		echo json_encode( $jsonObj );
		exit;
	}
}

include('./common.php');

// 세션 확인
if (get_session('ss_check_mb_id') != $mb_id ) {
	alert();
}

// 폼으로부터 받을 값들
$roplo_id	= trim($_POST['id']);
$title		= trim($_POST['title']);
$admin_id	= trim($_POST['admin_id']);
$logourl = '';

if ($w == '') {
	// 에러 확인 시작

	// id가 중복되는지 확인한다.
	$sql = " select id from {$table_roplo} where id = '{$roplo_id}' ";
	$row = sql_fetch($sql);
	if ($row){
		echo_json('주소가 중복되었어요.');
	}
	// 에러 확인 끝

	// 로고 이미지 처리
	if ( file_exists($FILES['logofile']['tmp_name'])){
		// To-Do : 로고 이미지 검증(이미지 용량, 이미지 형식), 이미지 리사이징
		$logo_ext = array_pop(explode(".", strtolower($_FILES['logofile']['name'])));
		$logourl = $logoimgs_data_url.'/'.$roplo_id.".".$logo_ext;
		if (! move_uploaded_file($_FILES['logofile']['tmp_name'], $logourl)){
			echo_json("이미지 업로드 실패");
		};
	} else {
		// 로고 이미지 등록하지 않은 경우, 공란으로 둠.
		$logourl='';
	}
	

	// 튜풀 삽입 
	$sql = "insert into {$table_roplo}
			set id = '{$roplo_id}',
			title = '{$title}',
			admin_id = '{$admin_id}',
			logourl = '{$logourl}'";
	sql_fetch($sql);

	echo_json('생성 완료!');

} else if ($w == 'u') {

	// TO DO : 수정 권한 확인

	//로고 이미지가 새로 등록되었는지 확인
	$logourl_updated = $_FILES['logofile']['size'] !== 0;
	if ($logourl_updated){
		// 로고 이미지 처리
		$logo_ext = array_pop(explode(".", strtolower($_FILES['logofile']['name'])));
		$logourl = $logoimgs_data_url.'/'.$roplo_id.$logo_ext;
		move_uploaded_file($_FILES['logofile']['tmp_name'], $logourl);
	}

	// 튜풀 변경
	$sql = "update {$table_roplo}
			set title = '{$title}'";
	$sql .= $logourl_updated ? ", logourl = '{$logourl}'" : "";
	$sql .= " where id = '{$roplo_id}'";
	sql_fetch($sql);

	echo_json("변경 완료!");
}
?>