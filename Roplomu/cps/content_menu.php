<?php 

$sql ="SELECT * FROM {$r_table->menu} WHERE roplo_id='{$roplo_id}' ORDER BY `order` ASC";
$result = sql_query($sql);

?>
<!-- content:menu -->
<div class="content navigation">
	<!-- 에디터 활성화/비활성화 버튼 -->
	<button id="editor-show-button" type='button' class="fa fa-cog"></button>
	<button id="editor-hide-button" type='button' class="fa fa-check"></button>

	<ul>
	<?php for($i=0; $row = sql_fetch_array($result); $i++){?>
		<!-- 메뉴 항목 시작 -->
		<li>
			<a href="<?php echo $row['href'] ?>">
				<?php echo $row['name'] ?>
			</a>
			<!-- 에디터(UPDATE) 폼 활성화 버튼  -->
			<button id="content_menu_update_form_show" type="button" class="fa fa-edit editorbutton" index="<?php echo $i; ?>"></button>	
		</li>
		<!-- 메뉴 항목 끝 -->
		<!-- 에디터(UPDATE) 폼 시작  -->
		<div class="editorfield">
			<form id="content_menu_update_form" enctype="multipart/form-data" method="post" action="content_menu_update.php" index="<?php echo $i ?>">
				<input type="hidden" name="roplo_id" value="<?php echo $roplo_id ?>">
				<input type="hidden" name="w" value="u">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				<label for='name'>
					메뉴 이름
				</label>
				<input type="text" name="name" value="<?php echo $row['name'] ?>"> <br>
				<label for='href'>
					주소
				</label>
				<input type="href" name="href" value="<?php echo $row['href'] ?>">
				<button id="content_menu_update_form_hide" type="submit" index="<?php echo $i ?>"> 수정 </button>
				<button id="content_menu_update_form_hide" type="button" index="<?php echo $i ?>"> 취소 </button>
			</form>
		</div>
		<!-- 에디터(UPDATE) 폼 끝  -->
	<?php } ?>
		<!-- 에디터(INSERT) 폼 시작  -->
		<form id="content_menu_insert_form" enctype="multipart/form-data" method="post" action="content_menu_update.php">
			<input type="hidden" name="roplo_id" value="<?php echo $roplo_id ?>">
			<label for='name'>
				메뉴 이름
			</label>
			<input type="text" name="name" placeholder="자유게시판"> <br>
			<label for='href'>
				주소
			</label>
			<input type="href" name="href" placeholder="아직 준비중">
			<button id="content_menu_insert_form_hide" type="submit"> 전송 </button>
			<button id="content_menu_insert_form_hide" type="button"> 취소 </button>
		</form>
		<!-- 에디터(INSERT) 폼 끝  -->

		<!-- 에디터(INSERT) 폼 활성화 버튼 -->
		<button id="content_menu_insert_form_show" type="button" class="editorbutton">
			<li>
				메뉴 추가 
			</li>
		</button>	
	</ul>
</div>

<script src="<?php echo G5_JS_URL?>/jquery.form.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.cookie.js"></script>
<script type="text/javascript">

	$( document ).ready(function(){
		//hideEditorFieldset();

		// 폼을 페이지 이동 없이 AJAX로 POST할 수 있도록 처리
		$('#content_menu_insert_form, #content_menu_update_form').ajaxForm({
			url: 'content_menu_update_ajax.php',
			success: function (json) {
				// alert(JSON.parse(json).msg);
				// 폼 처리 후, 해당 부분만 새로 요청해서 교체함.
				$(".content.navigation").parent().load('http://doge.dothome.co.kr/Roplomu/content/content_menu_ajax.php?roplo_id=<?php echo $roplo_id ?>');
			}
		});
	});

	// 에디터 활성화/비활성화 버튼
	togglePanel(
		".content.navigation button#editor-show-button",
		".content.navigation button#editor-hide-button",
		".content.navigation button.editorbutton",
		$.cookie('cntnt-nav-edt-btn')=="on" ? false : true,
		"cntnt-nav-edt-btn"
	);

	// 에디터(INSERT) 폼 토글 버튼
	for (var i = <?php echo $i ?>; i>0; i--) {
		(function(index){
			index--;
			togglePanel(
				".content.navigation #content_menu_update_form_show[index='"+index+"']",
				".content.navigation #content_menu_update_form_hide[index='"+index+"']",
				".content.navigation #content_menu_update_form[index="+index+"]",
				$.cookie('cntnt-nav-edt-form-u'+index) =="on" ? false : true,
				"cntnt-nav-edt-form-u"+index
			);
		})(i);
	}

	// 에디터(UPDATE) 폼 토글 버튼
	togglePanel(
		".content.navigation button#content_menu_insert_form_show",
		".content.navigation button#content_menu_insert_form_hide",
		".content.navigation form#content_menu_insert_form",
		$.cookie('cntnt-nav-edt-form-i') =="on" ? false : true,
		"cntnt-nav-edt-form-i"
	);

	<?php
	/**
	 * openBtn을 클릭하면 열린 상태가 되어서 closeBtn과 panel이 나타나고,
	 * closeBtn을 클릭하면 닫힌 상태가 되어서 openBtn과 panel이 나타난다.
	 * closed는 true일 경우 닫힌 상태로 시작한다.
	 * tag는 AJAX로 리로드시에, 에디터를 원래 상태로 복구하기 위한 쿠키의 이름이다.
	 */
	?>
	function togglePanel( openBtn, closeBtn, panel, closed=true, tag){
		function show( event ){
			$( event.data.panel + ", " + event.data.closeBtn ).show();
			$( event.data.openBtn).hide();
		    $.cookie( tag, "on" );
		}

		function hide( event ){
			$( event.data.panel+", "+event.data.closeBtn).hide();
			$( event.data.openBtn).show();
		    $.removeCookie( tag );
		}

		$( openBtn ).click( { panel:panel, closeBtn:closeBtn, openBtn:openBtn }, show);
		$( closeBtn ).click( { panel:panel, closeBtn:closeBtn, openBtn:openBtn }, hide);
		
		if (closed){
			hide( {data:{ panel:panel, closeBtn:closeBtn }} );
		}
	}
</script>
<!-- content:menu -->