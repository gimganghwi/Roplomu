<?php 
include('./common.php');
include('./head.php');
include('./header.php');
?>
<?php
// 이벤트를 서순으로 정렬
$events = Array();
for ($i=0; $i<count($roplo['timeline']['events']); ++$i) {
	$time = $roplo['timeline']['events'][$i]['time'];
	$times = preg_split( '/%b/', $time );
	$lables = preg_split( '/%b/', $roplo['timeline']['timelable'] );
	foreach ($times as $index) {
		$index = preg_replace("/[^0-9]/", "", $index);
		$events[$index] =  $roplo['timeline']['events'][$i];
		$events[$index]['time'] = $lables[$index]; 
	}
}
?>		
<!-- 메인 시작 -->
<style>
@import url('https://fonts.googleapis.com/css?family=Shrikhand');
</style>
<main>
	<!-- 타임라인 시작 -->
	<ul class='roplo_timeline' style='<?php echo $roplo['timeline']['style']['ul'] ?>'>		
		<!-- <?php for ( $i=0; $i<count($events); ++$i){ ?>
		--><li class='<?php echo $roplo['timeline']['events'][1]['class'] ?>'
			style="<?php echo $roplo['timeline']['style']['li'].$events[$i]['style'] ?>">
			<!--이벤트 시작-->
			<a href='<?php echo $events[$i]['href'] ?>'>

				<div class='time'>
					<span><?php echo $events[$i]['time'] ?></span>
				</div>
				<div class='title'>
					<span><?php echo $events[$i]['title'] ?></span>
				</div>
				<div class='text'>
					<span><?php echo $events[$i]['text'] ?></span>
				</div>
			</a>
			<!-- 이벤트 끝 -->
		</li><!--
		<?php }?>
		-->
		<script>
			// li 높이를 폭에 맞추어 조절한다.
			let aspectratio = 1;
			let roplo_timeline_lis = $('.roplo_timeline li');
			let roplo_timeline_li;
			let roplo_timeline_witdh;
			for (var i = 0 ; i < roplo_timeline_lis.length ; i++){
				roplo_timeline_li = roplo_timeline_lis[i];
				roplo_timeline_witdh = parseInt( $(roplo_timeline_li).width());
				roplo_timeline_witdh += parseInt( $(roplo_timeline_li).css('padding')) *2;
				console.log(roplo_timeline_witdh);
				$(roplo_timeline_li).css( 'height', roplo_timeline_witdh * aspectratio );
			}
		</script>

	</ul>
	<!-- 타임라인 끝 -->
</main>
<!-- 메인 끝 -->
<?php
include('./footer.php');
include('./tail.php');
?>