<?php 
include('./common.php');
// // roplo 스킨 질의
// if ($roplo){
// 	$roplo['style'] = sql_fetch("select json from {$r_table->style} where roplo_id = '{$roplo_id}' or roplo_id='default'")['json'];
// }

$el=array();
$layout = array();

$layout['BODY'] = Array();
	$layout['BODY']['tag'] = Array();
		$layout['BODY']['tag']['start'] ='';
		$layout['BODY']['tag']['end'] = '';

$layout['ASIDE_OVERAY'] = Array();
	$layout['ASIDE_OVERAY']['tag'] = Array();
		$layout['ASIDE_OVERAY']['tag']['start'] ='<aside id="aside-overlay-$direction" style="--length:$length;" class="$direction overlay">';
		$layout['ASIDE_OVERAY']['tag']['end'] = '</aside>';
	$layout['ASIDE_OVERAY']['var'] = array();
		$layout['ASIDE_OVERAY']['var']['length'] = '$length';
		$layout['ASIDE_OVERAY']['var']['direction'] = '$direction';

$layout['SECTION_FULL'] = Array();
	$layout['SECTION_FULL']['tag'] = Array();
		$layout['SECTION_FULL']['tag']['start'] ='<section id="section-full-$direction" style"--direction:$direction" class="$direction full $direction">';
		$layout['SECTION_FULL']['tag']['end'] = '</section>';
	$layout['SECTION_FULL']['var'] = array();
		$layout['SECTION_FULL']['var']['direction'] = '$direction';

$layout['ASIDE_PUSH'] = Array();
	$layout['ASIDE_PUSH']['tag'] = Array();
		$layout['ASIDE_PUSH']['tag']['start'] ='<aside id="aside-push-$direction "style="--length:$length" class="$direction push">';
		$layout['ASIDE_PUSH']['tag']['end'] = '</aside>';
	$layout['ASIDE_PUSH']['var'] = array();
		$layout['ASIDE_PUSH']['var']['length'] = '$length';
		$layout['ASIDE_PUSH']['var']['direction'] = '$direction';

$layout['ASIDE_BUTTON'] = Array();
	$layout['ASIDE_BUTTON']['tag'] = Array();
		$layout['ASIDE_BUTTON']['tag']['start'] ='<a id="$anchor-button" class="aside-button" href="#$anchor">';
		$layout['ASIDE_BUTTON']['tag']['end'] = '</a>';
	$layout['ASIDE_BUTTON']['var'] = array();
		$layout['ASIDE_BUTTON']['var']['anchor'] = '$anchor';

$layout['WRAPPER'] = Array();
	$layout['WRAPPER']['tag'] = Array();
		$layout['WRAPPER']['tag']['start'] ='<div id="$id" class="$class wrapper">';
		$layout['WRAPPER']['tag']['end'] = '</div>';
	$layout['WRAPPER']['var'] = array();
		$layout['WRAPPER']['var']['id'] = '$id';
		$layout['WRAPPER']['var']['class'] = '$class';

$content = array();
$content['BOARD'] = Array();
	$content['BOARD']['func'] = "BOARD";
	$content['BOARD']['var'] = array();
		$content['BOARD']['var']['id'] = '$id';
		$content['BOARD']['var']['class'] = '$class';
$content['LOGOSMALL'] = Array();
	$content['LOGOSMALL']['func'] = "LOGOSMALL";
	$content['LOGOSMALL']['var'] = array();
		$content['LOGOSMALL']['var']['arg'] = '$arg';
$content['LOGOBIG'] = Array();
	$content['LOGOBIG']['func'] = "LOGOBIG";
	$content['LOGOBIG']['var'] = array();
		$content['LOGOBIG']['var']['arg'] = '$arg';
$content['NAVIGATION'] = Array();
	$content['NAVIGATION']['func'] = "NAVIGATION";
	$content['NAVIGATION']['var'] = array();
		$content['NAVIGATION']['var']['arg'] = '$arg';
$content['TEXT'] = Array();
	$content['TEXT']['func'] = "TEXT";
	$content['TEXT']['var'] = array();
		$content['TEXT']['var']['id'] = '$id';
		$content['TEXT']['var']['class'] = '$class';

function BOARD ( $arg ){ return  '<main></main>';}
function LOGOSMALL ( $arg ){ global $roplo_id; return  "<img class='logo-small logo' src='".G5_DATA_URL."/roplomu/roplo/".$roplo_id."/logo-small.png'>";}
function LOGOBIG ( $arg ){ global $roplo_id; return  "<img class='logo-big logo' src='".G5_DATA_URL."/roplomu/roplo/".$roplo_id."/logo-big.png'>";}
function NAVIGATION ( $arg ){ return  '<ul><li>list1</li><li>list2</li><li>list3</li></ul>';}
function TEXT ( $id, $class ){ return  "<span id='".$id."' class='".$class."'>ANDSOCKS - When it be finished?<br><i class='far fa-copyright'></i> cocopam 2018</span>";}

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


function layoutElement($type, $var){
	global $layout;

	if ( isset( $layout[$type])) {
		$el = $layout[$type];
		foreach ($el["tag"] as $key => $tag ) {
			$el["tag"][$key] = str_replace( $el['var'], $var, $tag );
		}
		return $el;
	}
	throw new Exception("Undefined layout element type - ".$type, 1);
}

function contentElement($type, $var){
	global $content;
	if ( isset( $content[$type])){
		$el = $content[$type];
		if ( isset($content[$type]['func']) ){
		 	$func = $content[$type]['func'];
		 	if ( $tag = call_user_func_array( $func, $var ) ){
		 		return $tag;			
		 	}
		 	throw new Exception("Element type call strange function - ".$func, 1);
		}
		throw new Exception("Element type definition wrong. - ".$type, 1);
	}
	throw new Exception("Undefined content element type - ".$type, 1);

	return array( );
}

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

<?php

function style2html($style){
	global $layout;
	$html = "";

	switch ($style['subtype']) {
		case 'LAYOUT' :
			$el =  layoutElement($style['type'], $style['var']);
			$html .= $el['tag']['start'];

			if ( is_array($style['child']) ){
				foreach ($style['child'] as $child) {
					$html .= style2html( $child );
				}
			}

			$html .= $el['tag']['end'];
			break;
		case 'CONTENT' :
			$el =  contentElement($style['type'], $style['var']);
			$html .= $el;
			break;
		default:
			throw new Exception("Undefined subtype - ".$style['subtype'],  1);
	}


	return $html;
}

?>
</head>
<body class="roplo-viewport">
	<?php 

	$style=json_decode( $roplo['style'], true);
	//var_dump($style);
	echo style2html( $style );

	?>

</body>
</html>