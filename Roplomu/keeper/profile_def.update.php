<?php 
include('_common.update.php');
include('_common.php');

// 모든 가능한 필드 정의 목록
$sql = "SELECT * FROM {$r_table->field_def}";
$result = sql_query($sql);
for ($i=0; $row = sql_fetch_array($result); $i++) { 
    $roplo_def['field_def'][$row['id']] = $row;

    // 필드 정의 별 파라미터 정의 목록
    $sql="SELECT * FROM {$r_table->param_def} WHERE field_def_id='{$row['id']}'";
    $result2=sql_query($sql);
    for ($j=0; $row2=sql_fetch_array($result2); $j++) { 
        $roplo_def['field_def'][$row['id']]['param_def'][$row2['lable']] = $row2;
        // name 곂치지 않도록, {field lable}--{param lable}
        // $roplo_def['field_def'][$row['id']]['param_def'][$row2['lable']]['name'] = $row['id'].'--'.$row2['id'];
    }
}

$log ='';
for ( $i=0; $i<count($_POST['id']); $i++){
    // 폼으로 부터 받은 값
    $id     = trim($_POST['id'][$i]);
    $lable  = trim($_POST['lable'][$i]);
    $order  = trim($_POST['order'][$i]);
    $field_id = trim($_POST['field_id'][$i]);
    $field_def = trim($_POST['field_def'][$i]);
    $delete = trim($_POST['delete'][$i]);

    if ( strcmp($delete, 'delete')==0 ){
        // 프로필 삭제
        $sql="DELETE FROM {$r_table->profile_def}
              WHERE `id`='{$id}' AND `roplo_id`='{$roplo_id}';";
        sql_query($sql);

        // 만약 필드 정의를 사용하는 프로필이 하나도 없다면, 프로필이 참조하고 있던 필드도 삭제
        $sql="DELETE FROM {$r_table->field} WHERE `id`='{$field_id}' AND NOT EXISTS ( SELECT id FROM {$r_table->profile_def} WHERE `field_id`='{$field_id}')";
        $log.= $sql;
        sql_query($sql);

    } else if ( $id=='' ){
        
        // 필드 정의에 의한 파라미터 정의 조회
        $param_def_arr = $roplo_def['field_def'][$field_def]['param_def'];

        // 필드 생성
        $sql="INSERT INTO {$r_table->field} SET `def_id`='{$field_def}'";
        sql_query($sql);
        $field_id = sql_insert_id();
        $log.= $sql;

        // 파라미터 생성
        $sql="";
        foreach ($param_def_arr as $lable => $param_def) {
            $post_name = "{$field_id}--{$param_def['id']}";
            $param_val = trim($_POST[$post_name]);
            $sql="INSERT INTO {$r_table->field_param}
            SET `def_id`='{$row['id']}',
                `value`={$param_val},
                `field_id`= {$field_id}";
            sql_query($sql);
        }

        // 프로필 생성
        $sql="INSERT INTO {$r_table->profile_def}
              SET `roplo_id`='{$roplo_id}',
              `lable`='{$lable}',
              `field_id`='{$field_id}',
              `order`='{$order}';";
        $log.= $sql;
        sql_query($sql);

    } else {
        // 필드 정의에 의한 파라미터 정의 조회
        $param_def_arr = $roplo_def['field_def'][$field_def]['param_def'];

        // 프로필 업데이트
        $sql="UPDATE {$r_table->profile_def}
              SET `lable`='{$lable}',
              `order`='{$order}'
              WHERE `id`='{$id}' AND `roplo_id`='{$roplo_id}';";
        sql_query($sql);

        // 파라미터 업데이트
        foreach ($param_def_arr as $param_lable => $param_def) {
            $post_name = "{$field_id}--{$param_def['id']}";
            $param_val = trim($_POST[$post_name]);
            $sql="
            UPDATE {$r_table->field_param}
            SET `value`='{$param_val}'
            WHERE `field_id`='{$field_id}' AND `def_id`='{$param_def['id']}';";
            sql_query($sql);
        }
    }
}
echo_json('프로필 정의 작성 완료');
?>