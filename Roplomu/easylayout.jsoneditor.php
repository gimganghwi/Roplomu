<?php 
include('./common.php');
// // roplo 스킨 질의
// if ($roplo){
// 	$roplo['style'] = sql_fetch("select json from {$r_table->style} where roplo_id = '{$roplo_id}' or roplo_id='default'")['json'];
// }

$easylayout_editor = true;
include('./easylayout.compiler.php');

?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=no">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="easylayout.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" href="http://doge.dothome.co.kr/js/font-awesome/css/font-awesome.min.css">
<style type="text/css">
	.roplo-editor{
		width: 100vw;height: 100vh;background:gray;display:flex;align-items: center; justify-content: center;flex-direction: column;
	}
	.roplo-editor .roplo-viewport{
		width:50vw;height:50vh;background:white;box-sizing: border-box;
	}
	.roplo-viewport aside.selected{
		border:2px solid blue;
		transition: border 1s;
	}

	#cherry-holder:after{
		content: attr(data-cherry);
	}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.cookie.js"></script>
<script type="text/javascript">

var jsonobj=JSON.parse($.cookie( "CodeNowEditing" ));

$( document ).ready(function(){

	$( ".roplo-viewport" ).load( "./easylayout.jsoneditor.viewport.php", viewportLoaded);

function viewportLoaded(){
	$(".roplo-viewport aside").click(function(){
		$("data#cherry-holder").data('cherry', $(this).attr('id'));
		$("data#cherry-holder").attr('data-cherry', $(this).attr('id'));

		console.log( $( this ).parents() );

		$( ".roplo-viewport aside" ).removeClass("selected");
		$(this).addClass("selected");
	});

	$(".roplo-editor button.add-content").click(function(){
		var cherry = $("data#cherry-holder").data("cherry");

		var id = $( '#'+cherry ).attr('id');
		var type = $( '#'+cherry ).data('type');
		var subtype = $( '#'+cherry ).data('subtype');

		var contenttype = $( this ).data("type");
		var values = {};
		$( "input[data-type="+contenttype+"]" ).each(function(index){
			values[$(this).attr('name')] = $(this).val();
		});

		console.log("inject " + this + " in type:" + type + "subtype:" + subtype );

		for (var i=0 ; i < jsonobj.child.length ; i++)
		{
		    if (jsonobj.child[i]['type'] == type) {
		        jsonobj.child[i].child.push( {
		        	"subtype" : "CONTENT",
		        	"type" : contenttype,
		        	"var" : values
		        });

		        $.cookie( "CodeNowEditing", JSON.stringify(jsonobj) );
		        $( ".roplo-viewport" ).load( "./easylayout.jsoneditor.viewport.php" );
		    }
		}
	});
}


});
</script>
</head>
<body class="roplo-editor">
	<data id="cherry-holder" data-cherry="none">now selected:</data>
	<?php foreach ($content as $type => $element) {?>
	<div>
	<button id="<?php echo $type ?>" data-type="<?php echo $type ?>" class="add-content" type="button"><?php echo $type ?>
	</button>
		<?php foreach ($element['var'] as $var => $strip) { ?>
			<?php echo $var	 ?>
			<input type="text" data-type="<?php echo $type ?>" name="<?php echo $var ?>">
		<?php }?>
	<?php } ?>
	</div>
	<div class="roplo-viewport">
	
	</div>
</body>
</html>