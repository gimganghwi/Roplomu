<?php include_once('./_common.php')?>

<!-- 폼 시작 -->
<form id="basic_form" method="post" enctype="multipart/form-data" class="rf_f">
	<legend>기본 정보</legend>
	<label for='keeper_id'>
		로플로 최고관리자
	</label>
	<input type="text" name="keeper_id" value="<?php echo $member['mb_id']?>" readonly ><br>
	<div class='sublabel'>Roplo홈 관리자 입니다.</div>
	<label for='id'>
		주소
	</label>
	<input type="text" name="id"  value='<?php echo $roplo['id'] ?>' readonly > <br>
	<div class='sublabel'>Roplo의 홈 주소가 됩니다. 한 번 정하면, 수정할 수 없습니다.</div>
	<label for='title'>
		제목
	</label>
	<input type="text" name="title" value='<?php echo $roplo['title'] ?>' > <br>
	<label for='logofile'>
		로고 이미지
	</label>
	<!-- 이미지 미리보기 시작 -->
	<div class="logo img-preview">
		<label class="logo img-label">Choose File</label>
		<input type="file" name="logofile" class="logo img-upload" accept="image/*"/>
	</div> <br>
	<!-- 이미지 미리보기 끝 -->
	<div class="form_button_wrapper">
		<input type="submit" value="확인" class="form_button submit"/>
		<button type="button" class="form_button save"><i class="fa fa-sad-tear"></i>임시저장</button>
	</div>
</form>
<!-- 폼 끝 -->
<script type="text/javascript">

// 폼을 페이지 이동 없이 AJAX로 POST할 수 있도록 처리
$('#basic_form').ajaxForm({
    url: 'basic_update.php',
    success: function (json) {
        // alert(JSON.parse(json).msg);
        console.log(JSON.parse(json).msg);
        // $("section#nav").load( '<?php echo KEEPER_URL ?>/nav.php');
    }
});

</script>