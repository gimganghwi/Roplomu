<?php 

// 이 상수가 정의되지 않으면 각각의 개별 페이지는 별도로 실행될 수 없음
define('__ROPLOMU.MACOPOC__', true);

define('BBS_DIR', 'bbs');
define('ROPLOMU_PATH', G5_PATH.'/Roplomu');
define('ROPLOMU_URL', G5_URL.'/Roplomu');
define('BBS_URL', G5_URL.'/Roplomu/bbs');
define('BBS_PATH', ROPLOMU_PATH.'/'.BBS_DIR);
// define('CONTENT_PATH', ROPLOMU_PATH.'/cps');
// define('CONTENT_URL', ROPLOMU_URL.'/cps');
define('SKIN_PATH', ROPLOMU_PATH.'/skin');
define('SKIN_URL', ROPLOMU_URL.'/skin');
define('KEEPER_URL', ROPLOMU_URL.'/keeper');

$logoimgs_data_url=G5_DATA_PATH.'/roplomu/logo';

$r_table = new stdClass;
$r_table->roplo = 'r_roplo';
$r_table->profile_def = 'r_profile_def';
$r_table->field_def = 'r_field_def';
$r_table->field = 'r_field';
$r_table->param_def = 'r_field_param_def';
$r_table->field_param = 'r_field_param';
$r_table->player = 'r_player';
// $r_table->style = 'r_style';
$r_table->menu_prefix = 'r_menu_prefix';
$r_table->menu = 'r_menu';

$r_write = new stdClass;
$r_write->player = 'g5_write_roplo_player';

$wr_roplo = "wr_1";

// $session_check = false;

?>