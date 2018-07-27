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

?>