<?php 
header("Content-Type:application/json");
function echo_json($msg='', $url='', $confirm=''){
	global $noajax;
	if ($noajax) {
		alert($msg, $url, $confirm);
	} else {
		$jsonObj = new \stdClass();
		$jsonObj->msg = $msg=='' ? '올바른 방법으로 이용해 주십시오' :$msg ;
		echo json_encode( $jsonObj );
		exit;
	}
}

include('./_common.php');

// 폼으로부터 받은 값들
$id = trim($_POST['id']);
$w = trim($_POST['w']);
$name = trim($_POST['name']);
$href = trim($_POST['href']);
$roplo_id = $_POST['roplo_id'];

$ss_mb_id = get_session('ss_check_mb_id') ;
$sql = "SELECT id FROM {$r_table->roplo} WHERE admin_id='{$member['mb_id']}'";
if (!sql_fetch($sql)['id']){
	echo_json('수정 권한이 없습니다.');
	return;
}

if ($w == ''){

	$sql = "INSERT INTO `{$r_table->menu}` (`id`, `roplo_id`, `name`, `href`, `order`) VALUES (NULL, '{$roplo_id}', '{$name}', '{$href}', NULL)";
	sql_fetch($sql);

	echo_json('생성되었습니다.');

} else if ($w == 'u'){

	$sql = "UPDATE {$r_table->menu} SET roplo_id='{$roplo_id}', name='{$name}', href='{$href}' WHERE id={$id}";
	sql_fetch($sql);

	echo_json('수정되었습니다.');
}
?>