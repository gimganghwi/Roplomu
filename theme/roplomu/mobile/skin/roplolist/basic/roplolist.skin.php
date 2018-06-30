<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$roplolist_skin_url.'/style.css">', 0);
?>

<div class="roli">
    <ul>
        <!--
    <?php for ($i=0; $i<count($list); $i++) { ?>
        --><li>
            <a href="<?php echo $roplomu_url."/?roplo_id=".$list[$i]['roplo_id'] ?>" class="roli_tit">
                <img class="roli_thumbnail" src="./color.png"/>
            </a>
            <?php echo $list[$i]['title']; ?>
            <div class="roli_info">
                <?php echo $list[$i]['name'] ? $list[$i]['name'] : "프로필 없음" ?>
            </div>
        </li><!--
    <?php } ?>
    -->
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php } ?>
    </ul>
</div>
