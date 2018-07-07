<?php 

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
?>