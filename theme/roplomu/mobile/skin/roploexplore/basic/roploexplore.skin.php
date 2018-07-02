<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$roploexplore_skin_url.'/style.css">', 0);
?>
<div class="roli">
    <ul>
        <!--
    <?php for ($i=0; $i<count($list); $i++) { ?>
        --><li class="roli_li">
            <!-- 앱 아이콘 시작 -->
            <a href="<?php echo $r_url['roplo']."/?roplo_id=".$list[$i]['roplo_id'] ?>" >
                <div class="roli_thumbnail">
                    <img src="./color.png"/>                
                </div>
                <div class="roli_tit">
                    <?php echo $list[$i]['title']; ?>
                </div>
                <div class="roli_info">
                    <?php echo $list[$i]['name'] ? $list[$i]['name'] : "프로필 없음" ?>
                </div>
            </a>
            <!-- 앱 아이콘 끝 -->
        </li><!--
    <?php } ?>
     -->
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php } ?>
    </ul>
</div>
