<?php 
include('_common.update.php');
include('_common.php');

// 폼으로부터 받을 값들
$roplo_id	= trim($_POST['id']);
$title		= trim($_POST['title']);
$keeper_id	= trim($_POST['keeper_id']);
$logourl = '';

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
$sql = "update {$r_table->roplo}
		set title = '{$title}'";
$sql .= $logourl_updated ? ", logourl = '{$logourl}'" : "";
$sql .= " where id = '{$roplo_id}'";
sql_fetch($sql);

echo_json($sql);
?>