<?php 
include('_common.update.php');
include('_common.php');

$log ='';
for ( $i=0; $i<count($_POST['id']); $i++){
	// 폼으로 부터 받은 값
	$id 	= trim($_POST['id'][$i]);
	$name 	= trim($_POST['name'][$i]);
	$prefix = trim($_POST['prefix'][$i]);
	$order 	= trim($_POST['order'][$i]);
	$delete = trim($_POST['delete'][$i]);

	// $sql="INSERT INTO {$r_table->menu} SET `id`='{$id}', `roplo_id`='{$roplo_id}', `name`='{$name}', `prefix_id`='{$prefix}', `href`='{$href}' ON DUPLICATE KEY UPDATE `id`='{$id}', `name`='{$name}'";

	if ( $delete=='delete'){
		$sql="DELETE FROM {$r_table->menu}
              WHERE `id`='{$id}' AND `roplo_id`={$roplo_id}";
	} else if ( $id=='' ){
		$sql="INSERT INTO {$r_table->menu}
              SET `roplo_id`='{$roplo_id}',
              `name`='{$name}',
              `prefix_id`='{$prefix}',
              `href`='{$href}',
              `order`='{$order}'";
	} else {
		$sql="UPDATE {$r_table->menu}
              SET `name`='{$name}',
              `href`='{$href}',
              `order`='{$order}'
              WHERE `id`='{$id}' AND `roplo_id`='{$roplo_id}'";
	}

	sql_fetch($sql);

	$log .= '
	'.$sql;
}
echo_json($log);
?>