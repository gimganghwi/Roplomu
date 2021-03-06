<?php
//if (!defined('_CONFIGCONSTANT_')) exit;

function roplocreate($skin_dir='')
{
	global $g5;
    global $r_url;
    global $roplo;
    global $w;
    global $mb_id;
    global $member;

    // 스킨 경로 얻기
    if (!$skin_dir) $skin_dir = 'basic';

    if(preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
        if (G5_IS_MOBILE) {
            $roplomu_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/roplomu/'.$match[1];
            if(!is_dir($roplomu_skin_path))
                $roplomu_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/roplomu/'.$match[1];
            $roplomu_skin_url = str_replace(G5_PATH, G5_URL, $roplomu_skin_path);
        } else {
            $roplomu_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/roplomu/'.$match[1];
            $roplomu_skin_url = str_replace(G5_PATH, G5_URL, $roplomu_skin_path);
        }
        $skin_dir = $match[1];
    } else {
        if(G5_IS_MOBILE) {
            $roplomu_skin_path = G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/roplomu/'.$skin_dir;
            $roplomu_skin_url  = G5_MOBILE_URL.'/'.G5_SKIN_DIR.'/roplomu/'.$skin_dir;
        } else {
            $roplomu_skin_path = G5_SKIN_PATH.'/roplomu/'.$skin_dir;
            $roplomu_skin_url  = G5_SKIN_URL.'/roplomu/'.$skin_dir;
        }
    }

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

    ob_start();
    include $roplomu_skin_path.'/create.skin.php';
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
