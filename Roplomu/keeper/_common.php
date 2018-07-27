<?php
include_once('../../common.php');

// 세션 관리
if (isset($_REQUEST['roplo_id'])) {
	set_session('roplo_id', $_REQUEST['roplo_id']);
} else {
	$_REQUEST['roplo_id'] = get_session('roplo_id');
}
include_once('../common.php');

// 수정 권한 확인
if (!$is_keeper) {
	alert("키퍼만 수정할 수 있습니다.");
	if (!$is_member){
		alert("로그인 해주세요");
	}
}

define('IS_KEEPER', true);

add_javascript('<script src="'.G5_JS_URL.'/jquery.form.min.js"></script>', 1);
add_javascript('<script src="'.G5_JS_URL.'/jquery.cookie.js"></script>', 1);
add_javascript('<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>', 1);
add_javascript('<script src="'.KEEPER_URL.'/keeper.js"></script>', 1);
add_javascript('<script src="'.KEEPER_URL.'/roploform.js"></script>', 1);
?>
