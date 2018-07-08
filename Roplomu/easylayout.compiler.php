<?php 
include('./common.php');
// // roplo 스킨 질의
// if ($roplo){
// 	$roplo['style'] = sql_fetch("select json from {$r_table->style} where roplo_id = '{$roplo_id}' or roplo_id='default'")['json'];
// }

include('./easylayout.data.php');

// 흠...
$roplo_id = 'andsocks';

if ( $easylayout_editor ){
	foreach ($layout as $type => $el){
		$subtype = 'LAYOUT';
		$layout[$type]['tag']['start'] = str_replace( 'id=', 'data-type="'.$type.'" data-subtype="'.$subtype.'" id=', $layout[$type]['tag']['start'] );
	}
}

function BOARD ( $arg ){ return  '<main></main>';}
function LOGOSMALL ( $arg ){ global $roplo_id; return  "<img class='logo-small logo' src='".G5_DATA_URL."/roplomu/roplo/".$roplo_id."/logo-small.png'>";}
function LOGOBIG ( $arg ){ global $roplo_id; return  "<img class='logo-big logo' src='".G5_DATA_URL."/roplomu/roplo/".$roplo_id."/logo-big.png'>";}
function NAVIGATION ( $arg ){ return  '<ul><li>list1</li><li>list2</li><li>list3</li></ul>';}
function TEXT ( $id, $class ){ return  "<span id='".$id."' class='".$class."'>ANDSOCKS - When it be finished?<br><i class='far fa-copyright'></i> cocopam 2018</span>";}

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

function easylayout($json){
	$style=json_decode( $json, true);
	return style2html( $style );
}

?>