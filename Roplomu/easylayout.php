<?php 
include('./common.php');
// // roplo 스킨 질의
// if ($roplo){
// 	$roplo['style'] = sql_fetch("select json from {$r_table->style} where roplo_id = '{$roplo_id}' or roplo_id='default'")['json'];
// }

include('./easylayout.compiler.php');

$roplo['style']= '{
"subtype" : "LAYOUT",
"type": "BODY",
"child":[
	{ "subtype":"LAYOUT", "type":"ASIDE_OVERAY",
	"var":{
		"length":"72vw",
		"direction":"left"	
	},
	"child":[

		{ "subtype":"LAYOUT", "type":"ASIDE_BUTTON",
		"var":{
			"anchor":"none"
		}},

		{ "subtype":"CONTENT", "type":"LOGOBIG",
		"var" : {
			"arg":"arg"
			}},

		{"subtype":"LAYOUT", "type":"WRAPPER",
		"var":{
			"id":"paper_outter_navigation",
			"class":"pink_round_paper"
		},
		"child":[

			{"subtype":"CONTENT",
			 "type":"NAVIGATION",
			"var" : {
				"arg":"arg"
			}}

		]},

		{ "subtype":"CONTENT",
		"type":"TEXT",
		"var":{
			"id":"content_inner_navigation",
			"class":"light_transparent_text text"
		}}

	]},

	{ "subtype":"LAYOUT",
	"type":"SECTION_FULL",
	"var":{
		"direction":"column"
		},
	"child":[

		{"subtype":"LAYOUT",
		"type":"ASIDE_PUSH",
		"length":"45px",
		"var":{
			"length":"50px",
			"direction":"top"
			},
		"child":[

			{ "subtype":"LAYOUT",
			"type":"ASIDE_BUTTON",
			"var":{
				"anchor":"aside-overlay-left"
				}},

			{ "subtype":"CONTENT",
			"type":"LOGOSMALL",
			"var":{
				"arg":"arg"
			}},
			
			{ "subtype":"LAYOUT",
			"type":"ASIDE_BUTTON" }
		
		]},

		{"subtype":"LAYOUT",
		"type":"SECTION_FULL",
		"var":{
			"direction":"row"
			},
		"child":[
		
			{ "subtype":"CONTENT",
			"type":"BOARD",
			"var":{
				"arg":"arvg"
			}}
		]}
	]}
]}';

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="roplo-viewport">
	<?php 
	echo easylayout( $roplo['style']);
	?>
</body>
</html>