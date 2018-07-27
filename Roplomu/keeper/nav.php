<?php include_once('./_common.php')?>

<!-- 폼 시작 -->
<form id="menu_form" method="post" enctype="multipart/form-data" > 
    <table id="menu_list">
        <thead>
            <tr>
                <th><label for="name[]">이름</label></th>
                <th><label for="prefix[]">연결</label></th>
                <th><label for="delete[]">기타</label> 버튼들?</th>
            </tr>    
        </thead>
        <tbody>
        <?php for($i=0; $i < count($roplo['nav']); $i++){ ?>
            <tr>    
                <input type="hidden" name="id[]" value="<?php echo $roplo['nav'][$i]['id'] ?>" >
                <input type="hidden" name="order[]" value="<?php echo $roplo['nav'][$i]['order'] ?>" >
                <td><input type="text" name="name[]" value="<?php echo $roplo['nav'][$i]['name'] ?>" required></td>
                <td><input type="text" name="prefix[]" value="<?php echo $roplo['nav'][$i]['prefix_id'] ?>"></td>
                <td><input type="checkbox" name="delete[]" value="delete"></td>
            </tr>
        <?php } ?>
            <tr class="new-menu">
                <input type="hidden" name="id[]" value="" >
                <input type="hidden" name="order[]" value="" >
                <td><input type="text" name="name[]" required></td>
                <td>
                    <select name='prefix[]'>
                        <?php
                        // menu prefix 목록
                        $sql = "SELECT * FROM $r_table->menu_prefix";
                        $result = sql_query($sql);
                        while( $row = sql_fetch_array($result) ){
                        ?>
                            <option value='<?php echo $row['id'] ?>'>
                                <?php echo $row['id'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>   
                <td><input type="checkbox" name="delete[]" value="delete"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="button" class="add-menu">메뉴 추가</button></td>
            </tr>
            <button type="submit">전송</button>
        </tbody>
    </table>
</form>
<!-- 폼 끝 -->
<script type="text/javascript">

// 폼을 페이지 이동 없이 AJAX로 POST할 수 있도록 처리
$('#menu_form').ajaxForm({
    url: 'menu_update.php',
    success: function (json) {
        // alert(JSON.parse(json).msg);
        console.log(JSON.parse(json).msg);
        // $("section#nav").load( '<?php echo KEEPER_URL ?>/nav.php');
    }
});

// 폼에 새로운 라인 추가
let newMenuElement = $(".new-menu").detach();
let maxOrder = <?php echo $roplo['nav'][$i-1]['order'] ?>+1;
let newMenuBtn = $('button.add-menu');
newMenuBtn.click(function(){
    newMenuBtn = newMenuBtn.detach();
    let el = newMenuElement.clone();
    $('table#menu_list').append( el );
    $('table#menu_list').append( newMenuBtn );
    el.find("input[name^=order]").val( maxOrder++ );
});

// 순서 이동 가능함
$( "table#menu_list tbody" ).sortable( {
    update: function( event, ui ) {
    $(this).children().each(function(index) {
            $(this).find('input[name^=order]').val(index + 1);
    });
  }
});
</script>   