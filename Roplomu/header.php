	<!--헤더 시작-->
	<header>
		<div id="logo"> <?php echo $roplo['title'] ?></div>
		<div>
			<ul>
				<?php for ( $i=0; $i<count($roplo['navigation']); ++$i) { ?>
				<li>
					<a href='<?php echo $roplo['navigation'][$i]['href'] ?>'>
					<span style='<?php echo $roplo['navigation'][$i]['style'] ?>'>
						<?php echo $roplo['navigation'][$i]['text'] ?>
					</span>
					</a>
				</li>
				<?php }?>
			</ul>
		</div>
	</header>
	<!-- 헤더 끝 -->