<?php 
include('./common.php');

// roplo 스킨 질의
if ($roplo){
	$roplo['style'] = sql_fetch("select json from {$r_table->style} where roplo_id = '{$roplo_id}' or roplo_id='default'")['json'];
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
$codejson = $roplo['style'];

$layout = json_decode($codejson, true);


function decodeLayout($layout){
		$html='';
		$el = element($layout);
		
		$html .=  $el['start'];
		$html .= $el['content'];

		if ( is_array($layout['child']) ){
			// 자식 요소 추가
			foreach ($layout['child'] as $child) {
				$html .= decodeLayout($child);
			}
		} else if ( $el['child']){
			$html .= $el['child'];
		}

		$html .= $el['end'];
		return $html;
}


function element($l){
	switch ($l['subtype']) {
		case 'BODY' : return array();
		case 'LAYOUT': return layoutElement($l['type'], $l['length']);
		case 'CONTENT' : return contentElement($l['type']);		
		default: throw new Exception("정의되지 않은 서브타입".$l,  1);
	}
}

function contentElement($type){
	$el=array();
	switch ($type) {
		case 'BOARD':
			//$el['content'] = roplo_board();
			$el['content'] ='<main></main>';
		break;
		case 'NAVIGATION':
			$el['content'] ='<ul><li>list1</li><li>list2</li><li>list3</li></ul>';
		break;
		default: throw new Exception("정의되지 않은 타입".$l,  1);
	}
	return $el;
}

function layoutElement($type, $length){
	/*
	$sql = "select * in r_element where id='{$type}'";
	$el =  $sql_fetch($sql);
	for ($el as $tag) {
		$tag = str_replace( '$length', $length ); 
	}
	return $el;
	*/
	$el=array();
	switch ($type) {
		case 'ASIDE_OVERAY_LEFT':
			$el['start'] ='<aside id="aside-overlay-left" style="width:'.$length.'" class="left overlay">';
			$el['end'] = '</aside>';
			break;
		case 'ASIDE_OVERAY_RIGHT':
			$el['start'] ='<aside style="width:'.$length.'" class="right overlay">';
			$el['end'] = '</aside>';
			break;
		case 'COLUMN_WRAPPER':
			$el['start'] ='<section class="column-wrapper">';
			$el['end'] = '</section>';
			break;
		case 'ASIDE_PUSH_TOP':
			$el['start'] ='<aside style="height:'.$length.'" class="up">';
			$el['end'] = '</aside>';
			break;
		case 'ROW_WRAPPER':
			$el['start'] ='<section class="row-wrapper">';
			$el['end'] = '</section>';
			break;
		case 'ASIDE_PUSH_LEFT':
			$el['start'] ='<aside style="width:'.$length.'" class="left">';
			$el['end'] = '</aside>';
			break;
		case 'ASIDE_OVERAY_LEFT_BUTTON':
			$el['start'] ='<a id="aside-overlay-left-button-open" href="#aside-overlay-left">';
			$el['child'] = '<span>열기</span>';
			$el['end'] = '</a>';
			break;
		case 'ASIDE_CLOSE':
			$el['start'] ='<a id="aside-close" href="#">';
			$el['child'] = '<span>닫기</span>';
			$el['end'] = '</a>';
			break;
		default: throw new Exception("정의되지 않은 타입".$l,  1);
	}
	return $el;
}

?>
</head>
<body>
	<?php echo decodeLayout($layout) ?>
</body>
</html>