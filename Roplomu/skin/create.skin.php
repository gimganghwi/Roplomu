<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.SKIN_URL.'/style.css">', 0);
?>

<?php 
ob_start();
?>
<img src="https://octodex.github.com/images/original.png" style="">
<?php
$create_welcome_header=ob_get_clean();
?>

<?php
	ob_start();
?>
<article class="rp_atc">
	<h1>roplo는 롤플레잉 게임입니다.</h1>
	<p>
	 소수의 게임 마스터가 기반 설정을 정의하고 게임 룰을 정하면, 다수의 플레이어가 그 규칙 아래에서 서로 상호작용하는 방법으로 플레이합니다.
	</p>
	<p>			 	
	 누구나 무료로 roplo를 만들 수 있습니다. play-by-post에 최적화된 다양한 기능이 준비되어 있고, 코딩 없이 사이트를 조작할 수 있어서 관리하기 쉽습니다.
	</p>
</article>
<div class="rp_button_wrapper" style="align-items: center;">
	<?php if($is_member){ ?>
	<a href="#create_roplo_form" class="itt rp_button on-rp-m600"> roplo 제작하기</a>
	<?php } else { ?>
	<a href="<?php echo G5_BBS_URL ?>/login.php" class="itt rp_button"> 로그인하고 roplo 제작하기</a>
	<?php } ?>
</div>
<script type="text/javascript">
	// Select all links with hashes
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 500, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          $target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	  });
</script>
<?php
$create_welcome_content=ob_get_clean();
?>

<?php
	ob_start();
?>
<form id="create_roplo_form" enctype="multipart/form-data" method="post" action="create_roplo_update.php" class="rf_f" ><?php
$create_form_start=ob_get_clean();
?>

<?php
	ob_start();
?>
	<?php if ($w=='u') {?>
	<fieldset>
		<legend>기본 정보</legend>
	<?php } ?>
		<input type="hidden" name="w" value="<?php echo $w ?>">
		<label for='admin_id'>
			로플로 최고관리자
		</label>
		<input type="text" name="admin_id" value="<?php echo $member['mb_id']?>" readonly ><br>
		<div class='sublabel'>Roplo홈 관리자 입니다.</div>
		<label for='id'>
			주소
		</label>
		<input type="text" name="id" <?php echo $w=='u'?'readonly':'' ?><?php echo $w=='u'?"value='{$roplo['id']}'":"" ?> /> <br>
		<div class='sublabel'>Roplo의 홈 주소가 됩니다. 한 번 정하면, 수정할 수 없습니다.</div>
		<label for='title'>
			제목
		</label>
		<input type="text" name="title" <?php echo $w=='u'?"value='{$roplo['title']}'":"" ?> > <br>
		<label for='logofile'>
			로고 이미지
		</label>
		<!-- 이미지 미리보기 시작 -->
		<div class="logo img-preview">
			<label class="logo img-label">Choose File</label>
			<input type="file" name="logofile" class="logo img-upload" accept="image/*"/>
		</div> <br>
		<!-- 이미지 미리보기 끝 -->
	<?php if ($w=='u') {?>
	</fieldset>
	<?php } ?>
<?php
$create_form_default=ob_get_clean();
?>

<?php
	ob_start();
?>
	<fieldset>
		<legend>게시판 정보 <i class="fa fa-sad-tear"></i></legend>
		<div class="oneline">
			<label for=''>
				사용중인 게시판 수
			</label>
			<input inputmode="numeric" type="number" name="" /><br>
		</div>	
	</fieldset>
	<fieldset>
		<legend>게시판 개별 정보 <i class="fa fa-sad-tear"></i></legend>
		<?php for ($i = 0 ; $i < 5 ; $i ++ ){ ?>
		<div class="board_toggle_wrapper" index="<?php echo $i ?>">
			<button type="button" class="board_toggle_button"> 게시판 이름 <?php echo $i ?></button>
			<div class="board_toggle_panel">
				<label for=''>
					게시판 이름
				</label>
				<input type="text" name="" disabled /><br>
				<div class='sublabel'>255자 이하, 너무 길면 글씨가 잘릴 수 있습니다.</div>
				<div class='sublabel'></div>
				<label for=''>
					게시판 설명
				</label>
				<input type="text" name="" disabled /><br>
				<div class='sublabel'>설명이 필요 없는 경우에는 공란으로 두세요.</div>
				<label for=''>
					게시판 아이콘
				</label>
				<!-- 이미지 미리보기 시작 -->
				<div class="img-preview">
					<label class="img-label">Choose File</label>
					<input type="file" name="" class="img-upload" accept="image/*"/>
				</div> <br>
				<!-- 이미지 미리보기 끝 -->
			</div>
		</div>
		<?php } ?>
		<div class="board_toggle_wrapper">
			<button type="button" class="board_toggle_button"><i class="fas fa-plus"></i></button>
		</div>
	</fieldset>
<?php
$create_form_board=ob_get_clean();
?>

<?php
	ob_start();
?>
	<div class="form_button_wrapper">
		<input type="submit" value="ROPLO <?php echo $w=='u'?'수정':'생성' ?>" class="form_button submit"/>
		<button type="button" class="form_button save"><i class="fa fa-sad-tear"></i>임시저장</button>
	</div>
<?php
$create_form_submit=ob_get_clean();
?>

<?php
	ob_start();
?>
</form>
<script src="<?php echo G5_JS_URL?>/jquery.form.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		// uploadPreview.js
		$.uploadPreview({
			input_field: ".logo.img-upload",   // Default: .image-upload
			preview_box: ".logo.img-preview",  // Default: .image-preview
			label_field: ".logo.img-label",    // Default: .image-label
			no_label: false                 // Default: false
		});

		for (var i = 0 ; i < 5; i++) {
			BoardToggle(i);
		}

		// 폼을 페이지 이동 없이 AJAX로 POST할 수 있도록 처리
		$('#create_roplo_form').ajaxForm({
			url: 'create_roplo_update_ajax.php',
			success: function (json) {
				alert(JSON.parse(json).msg);
			}
		});
	});

	// 게시판 개별 정보 부분이 길고 반복되기 때문에, 접을 수 있도록 함.
	function BoardToggle(index){
		let button = "div.board_toggle_wrapper[index='"+index+"'] > .board_toggle_button";
		let panel = "div.board_toggle_wrapper[index='"+index+"'] > .board_toggle_panel";
		$(button) .click(function(){
	    	$(panel).slideToggle("slow");
	    });
		$(panel).slideUp();
	}
</script>
<?php 
	$create_form_end=ob_get_clean();
?>
	<script type="text/javascript" src="<?php echo G5_JS_URL?>/jquery.uploadPreview.min.js"></script>
	
	<?php if (!$is_member) { // 생성모드인데 로그인을 안함 ?>
		<div id="cre_ro_po"class="postcard">
		<div class="pc-dr">
			<?php echo $create_welcome_header ?>
			<?php echo $create_welcome_content ?>
		</div >
		<div class='pc-msg'>
		</div>
		</div>
	<?php } else if ($w=='u'){ // 수정모드 ?>
		<?php echo $create_form_start;?>
		<div id="cre_ro_po"class="postcard">
		<div class="pc-dr">
			<?php echo $create_form_default;?>
		</div >
		<div class='pc-msg'>
			<?php echo $create_form_board;?>
			<?php echo $create_form_submit;?>
		</div>
		<?php echo $create_form_end;?>
	<?php } else if($w=='') { // 생성모드 ?>
		<div id="cre_ro_po"class="postcard">
		<div class="pc-dr">
			<?php echo $create_welcome_header ?>
			<?php echo $create_welcome_content ?>
		</div >
		<div class='pc-msg'>
			<?php echo $create_form_start;?>
			<?php echo $create_form_default;?>
			<?php echo $create_form_submit;?>
			<?php echo $create_form_end;?>
		</div>
	<?php } ?>
	
	