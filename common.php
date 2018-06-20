<?php

$roplo = Array();
	$roplo['title'] = '모닝인포니';
	$roplo['pages'] = Array();
		$roplo['pages'][0] = Array();
			$roplo['pages'][0]['writer'] = 'John Doe';
			$roplo['pages'][0]['illustration'] = '#';
			$roplo['pages'][0]['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
		$roplo['pages'][1] = Array();
			$roplo['pages'][1]['writer'] = 'Hamjin';
			$roplo['pages'][1]['illustration'] = '#';
			$roplo['pages'][1]['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
	$roplo['profiles'] = Array();
	$roplo['profiles'][0] = Array();
		$roplo['profiles'][0]['name'] = 'John Doe';
		$roplo['profiles'][0]['age']	= '13';
		$roplo['profiles'][0]['biology'] = 'The end';
	$roplo['profiles'][1] = Array();
		$roplo['profiles'][1]['name'] = 'Hamjin';
		$roplo['profiles'][1]['age']	= '12';
		$roplo['profiles'][1]['biology'] = 'Hamster para';

	$roplo['profile'] = '';
	for( $i=0; $i<count($roplo['profiles']); ++$i){
		if ($roplo['profiles'][$i]['name']==$_REQUEST['name']){
			$roplo['profile'] = $roplo['profiles'][$i];
			break;
		}
	}
?>