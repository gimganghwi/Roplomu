    <header class="wrapper">
        <div class="inner">
            <div id="aside-over-open" class="fas fa-bars"></div>
            <div id="nav-masonry-open" class="fas fa-ellipsis-v"></div>
            <a id="title" href="<?php echo $r_url->roplo ?>"><?php echo $roplo['title'] ?></a>
        </div>
    </header>
    <nav class="wrapper">
        <ul class="masonry">
            <?php for($i=0; $i < count($roplo['nav']) ; $i++){ ?>
                <li><a href="<?php echo $roplo['nav'][$i]['href'] ?>">
                    <?php echo $roplo['nav'][$i]['name'] ?>
                </a></li>
            <?php } ?>
            <?php if (!$is_player) { ?>
                <li><a href="<?php echo $r_url->player ?>"> 플레이어 등록 </a></li>
            <?php } ?>
        </ul>
    </nav>