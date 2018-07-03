<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$roplocreate_skin_url.'/style.css">', 0);
?>
	<script type="text/javascript" src="<?php echo G5_JS_URL?>/jquery.uploadPreview.min.js"></script>
	<form enctype="multipart/form-data" method="post" action="create_roplo_update.php">
		<fieldset>
			<legend>기본 정보</legend>
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
		</fieldset>
		<?php if ($w='u') {?>
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
		<?php } ?>
		<div class="form_button_wrapper">
			<input type="submit" value="ROPLO 생성" class="form_button submit"/>
			<button type="button" class="form_button save"><i class="fa fa-sad-tear"></i>임시저장</button>
		</div>
		
	</form>
	<script type="text/javascript">
		$(document).ready(function() {
			$.uploadPreview({
				input_field: ".logo.img-upload",   // Default: .image-upload
				preview_box: ".logo.img-preview",  // Default: .image-preview
				label_field: ".logo.img-label",    // Default: .image-label
				no_label: false                 // Default: false
			});

			for (var i = 0 ; i < 5; i++) {
				BoardToggle(i);
			}
			
		});

		function BoardToggle(index){
			let button = "div.board_toggle_wrapper[index='"+index+"'] > .board_toggle_button";
			let panel = "div.board_toggle_wrapper[index='"+index+"'] > .board_toggle_panel";
			$(button) .click(function(){
    	    	$(panel).slideToggle("slow");
    	    });
			$(panel).slideUp();
		}
	</script>
