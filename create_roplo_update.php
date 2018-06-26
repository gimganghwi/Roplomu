<?php 
include('./config.php');

// 폼으로부터 받을 값들
$id			= trim($_POST['id']);
$title		= trim($_POST['title']);
$admin_id	= trim($_POST['admin_id']);
$logourl = '';

// 에러 확인 시작

// id가 중복되는지 확인한다.
$sql = " select from {$table_roplo} where id <> '$id' ";
$row = sql_fetch($sql);
if ($row['id']){
	alert('주소가 중복되었어요..', G5_URL);
}

// 에러 확인 끝

// 로고 이미지 처리
$logo_ext = array_pop(explode(".", strtolower($_FILES['logofile']['name'])));
$logourl = $logoimgs_data_url.$id.$logo_ext;
move_uploaded_file($_FILES['logofile']['tmp_name'], $logourl);

// 튜풀 삽입 
$sql = "insert into {$table_roplo}
		set id = '{$id}',
		title = '{$title}',
		admin_id = '{$admin_id}',
		logourl = '{$logourl}'";
sql_fetch($sql);

alert('생성 완료!');

?>