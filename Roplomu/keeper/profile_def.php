<?php 
include_once('./_common.php');

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

?>
<!-- 폼 시작 -->
<form id="profile_def_form" method="post" enctype="multipart/form-data" class="rf_f" > 
    <table id="profile_def_list">
        <thead>
            <tr>
                <th><label for="label[]">이름</label></th>
                <th><label for="field_def[]">필드 정의</label></th>
                <th><label for="">필드 정의에 따른 파라미터</label></th>
                <th><label for="delete[]">기타</label> 버튼들?</th>
            </tr>    
        </thead>
        <tbody>
        <?php for($i=0; $i < count($roplo['profile_def']); $i++){
            $profile_def = $roplo['profile_def'][$i];
         ?>
            <tr>    
                <input type="hidden" name="id[]" value="<?php echo $profile_def['id'] ?>" >
                <input type="hidden" name="order[]" value="<?php echo $profile_def['order'] ?>" >
                <input type="hidden" name="field_id[]" value="<?php echo $profile_def['field_id'] ?>" >
                <td><input type="text" name="lable[]" value="<?php echo $profile_def['lable'] ?>" required></td>
                <td>
                    <input type="text" name="field_def[]" value="<?php echo $profile_def['field_def_id'] ?>" readonly>
                </td>
                <td>
                    <div class="oneline">

                    <?php
                        // 각각의 프로파일의 필드 정의 별 파라미터 목록 출력
                        for ($j=0; $j < count($profile_def['param_def']); $j++) {
                            // 파라미터 정의
                            $param_def = $profile_def['param_def'][$j];
                            // 파라미터 값 조회
                            $param_value = sql_fetch("SELECT value FROM {$r_table->field_param} WHERE `def_id`='{$param_def['id']}' AND `field_id`='{$profile_def['field_id']}'")['value'];
                    ?>
                        <label for='<?php echo $param_def['name'] ?>'><?php echo $param_def['label'] ?></label>
                        <input type="text" name="<?php echo $param_def['name'] ?>" value="<?php echo $param_value ?>">
                    <?php } ?>

                    </div>
                </td>
                <td><input type="radio" name="delete[<?php echo $i ?>]" value="" checked></td>
                <td><input type="radio" name="delete[<?php echo $i ?>]" value="delete"></td>
            </tr>
        <?php } ?>
            <tr class="new-profile_def">
                <input type="hidden" name="id[]" value="" >
                <input type="hidden" name="order[]" value="" >
                <input type="hidden" name="field_id[]" value="1" >
                <td><input type="text" name="lable[]" required></td>
                <td>
                    <select name='field_def[]'>
                        <?php foreach ( $roplo_def['field_def'] as $id => $row) { ?>
                            <option value='<?php echo $row['id'] ?>'>
                                <?php echo $row['id'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
                <td class="param_def_wrapper">
                    <div class="oneline">
                    </div>
                </td>
                <td><input type="radio" name="delete[<?php echo $i ?>]" value="" checked></td>
                <td><input type="radio" name="delete[<?php echo $i ?>]" value="delete"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><button type="button" class="add-profile_def form_button   ">메뉴 추가</button></td>
            </tr>
            <button type="submit" class="form_button" >전송</button>
        </tfoot>
    </table>
</form>
<!-- 폼 끝 -->
<script type="text/javascript">

// 폼을 페이지 이동 없이 AJAX로 POST할 수 있도록 처리
$('#profile_def_form').ajaxForm({
    url: 'profile_def.update.php',
    success: function (json) {
        // alert(JSON.parse(json).msg);
        console.log(JSON.parse(json).msg);
        // $("section#profile_def").load( '<?php echo KEEPER_URL ?>/profile_def.php');
    }
});

// 폼에 새로운 라인 추가
let newMenuElement_pdef = $(".new-profile_def").detach();
let maxOrder_pdef = <?php echo $roplo['profile_def'][$i-1]['order'] ?>+1; // 가장 나중 순서
let newMenuBtn_pdef = $('button.add-profile_def');
newMenuBtn_pdef.click(function(){
    let el = newMenuElement_pdef.clone();
    $('table#profile_def_list').append( el );
    el.find("input[name^=order]").val( maxOrder_pdef++ );   // 새로운 라인에 가장 나중 순서 부여

    // 필드 정의 셀렉트에 따라, 파라미터 정의 폼이 바뀐다.
    $(el).find("select[name^=field_def]").on('change', function(e){
        let param_def_obj;
        let param_form='';
        // 셀렉트된 필드 정의로, 파라미터 정의 결정
        switch ( this.value ){
            <?php foreach ($roplo_def['field_def'] as $id => $row) { ?>
            case '<?php echo $id?>':
                param_def_obj = <?php echo json_encode($row['param_def']) ?>;
                break;
            <?php } ?>
        }
        // 파라미터 정의 폼 생성
        param_form +='<div class="oneline">';
        for (var i in param_def_obj) {
            let param_def = param_def_obj[i];
            param_form += '<label for="' + param_def.name + '">'
            param_form += param_def.lable;
            param_form += '</label>';
            param_form += '<input type="text" name="'+param_def.name+'">';
            console.log( param_def_obj );
        }
        param_form += '</div>';

        // 폼 삽입
        $(el).find(".param_def_wrapper").html( param_form );
    });
});

// 순서 이동 가능함
$( "table#profile_def_list tbody" ).sortable( {
    update: function( event, ui ) {
    $(this).children().each(function(index) {
            $(this).find('input[name^=order]').val(index + 1);
            $(this).find('input[name^=delete]').attr("name", "delete["+(index + 1)+"]");
    });
  }
});
</script>   