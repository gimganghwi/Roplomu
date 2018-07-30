<ul>
	<li class="">
		<a href="<?php echo G5_URL ?>"><b><i class="fa fa-book"></i></b></a>
	</li>
<?php
if (!$is_member) {
?>
    <li>
    	<a class="hd-button" href="<?php echo G5_BBS_URL ?>/login.php">로그인</a>
    </li>
<?php
} else {
	if ($is_player) { 
?>
<!-- <li><a href="">
	<i class="fa fa-cog" aria-hidden="true"></i>
	플레이어 정보
</a></li> -->
<?php 
		if ($is_keeper) {
?>
	<li class="ro_nv_admin">
		<a href="<?php echo $r_url->keeper ?>"><b><i class="fa fa-wrench"></i></b></a>
	</li>
<?php
		 }
	} else {
?>
    <li><a href=""><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
<?php
	}
 ?>
<?php }  ?>
</ul>