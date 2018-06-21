<?php
include('./config.php');

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

	$roplo['navigation'] = Array();
		$roplo['navigation'][0] = Array();
			$roplo['navigation'][0]['text'] = 'world';
			$roplo['navigation'][0]['href'] = '#';
			$roplo['navigation'][0]['style'] = 'color:Magenta';
		$roplo['navigation'][1] = Array();
			$roplo['navigation'][1]['text'] = 'profiles';
			$roplo['navigation'][1]['href'] = $profiles_url;
			$roplo['navigation'][1]['style'] = 'color:Blue';

	$roplo['timeline'] = Array();
		$roplo['timeline']['type'] = 'calander';
		$roplo['timeline']['style'] = Array();
			$roplo['timeline']['style']['li'] = 'width:14.28%;';
			$roplo['timeline']['style']['ul'] = '';
		$roplo['timeline']['timelable'] = '5%b6%b7%b8%b9%b10%b11%b12%b13%b14';
		$roplo['timeline']['events'] = Array();
			$roplo['timeline']['events'][0] = Array();
				$roplo['timeline']['events'][0]['time'] = '0%b1%b2%b3%b4%b5';
				$roplo['timeline']['events'][0]['title'] = '-';
				$roplo['timeline']['events'][0]['text'] = '';
				$roplo['timeline']['events'][0]['href'] = '#';
				$roplo['timeline']['events'][0]['class'] = 'default';
				$roplo['timeline']['events'][0]['style'] = "font-family: 'Shrikhand', cursive;";
			$roplo['timeline']['events'][1] = Array();
				$roplo['timeline']['events'][1]['time'] = '6';
				$roplo['timeline']['events'][1]['title'] = 'potion';
				$roplo['timeline']['events'][1]['text'] = '2:32';
				$roplo['timeline']['events'][0]['href'] = '#';
				$roplo['timeline']['events'][1]['class'] = 'default';
				$roplo['timeline']['events'][1]['style'] = "font-family: 'Shrikhand', cursive;";
			$roplo['timeline']['events'][2] = Array();
				$roplo['timeline']['events'][2]['time'] = '7%b8%b9';
				$roplo['timeline']['events'][2]['title'] = 'the end';
				$roplo['timeline']['events'][2]['text'] = '2:37';
				$roplo['timeline']['events'][0]['href'] = '#';
				$roplo['timeline']['events'][2]['class'] = 'default';
				$roplo['timeline']['events'][2]['style'] = "font-family: 'Shrikhand', cursive;";
?>