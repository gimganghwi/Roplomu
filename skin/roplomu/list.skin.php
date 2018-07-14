<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>


<!-- 게시판 목록 시작 { -->
<div id="bo_gall" style="width:<?php echo $width; ?>">

    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>


    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top">
        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn-floating"><i class="fa fa-pencil" aria-hidden="true"></i></a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

	<?php for ($i=0; $i<count($list); $i++) {

		$classes = array();
		
		$classes[] = 'gall_li';
		$classes[] = 'col-gn-'.$bo_gallery_cols;

		if( $i && ($i % $bo_gallery_cols == 0) ){
			$classes[] = 'box_clear';
		}

		if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
			$classes[] = 'gall_now';
		}

		$content = strip_tags($list[$i]['wr_content']); 
	 ?>
	<div class="webzin_list">
		<ul>
			<li>
                <div class="gall_chk">
					<span class="sound_only">
						<?php
						if ($wr_id == $list[$i]['wr_id'])
							echo "<span class=\"bo_current\">열람중</span>";
						else
							echo $list[$i]['num'];
						 ?>
					</span>
                </div>

				<a>
				<?php
				if ($list[$i]['is_notice']) { // 공지사항  ?>
					<span class="is_notice">공지</span>
				<?php } else {
					$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

					if($thumb['src']) {
						$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
					} else {
						$img_content = '<span class="no_image">no image</span>';
					}

					echo $img_content;
				}
				?>
				</a>
			</li>
			<li>
				<div>
					<p>
                        <?php
                        // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                        if ($is_category && $list[$i]['ca_name']) {
                         ?>
                        <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                        <?php } ?>
                        <a class="bo_tit">
                            <?php echo $list[$i]['subject'] ?>
                            <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt">+ <?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
                            <?php
                            // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                            // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                            if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']);
                            if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
                            //if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
                            //if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
                            if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
                             ?>
                         </a>
					</p>
					<p>
						<?php echo $list[$i]['name'] ?> | 
						<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $list[$i]['datetime2'] ?> | 
						<i class="fa fa-eye" aria-hidden="true"></i> <?php echo $list[$i]['wr_hit'] ?>
						<?php if ($is_good) { ?>| <span class="sound_only">추천</span><strong><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $list[$i]['wr_good'] ?></strong><?php } ?>
						<?php if ($is_nogood) { ?>| <span class="sound_only">비추천</span><strong><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <?php echo $list[$i]['wr_nogood'] ?></strong><?php } ?>
					</p>
				</div>
				<div>
					<a>
						<p><?=$content?></p>
					</a>
				</div>
			</li>
		</ul>
	</div>
	<?php } ?>
	<?php if (count($list) == 0) { echo "<div class=\"empty_list\" datano='no'>게시물이 없습니다.</div>"; } ?>

	

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn">목록</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
     
       <!-- 게시판 검색 시작 { -->
    <!-- } 게시판 검색 끝 -->   
</div>



<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>
