<?php 
include('./common.php');
include('./head.php');
include('./header.php');
?>
<!-- 메인 시작 -->
<main>
	<form method="post" action="create_roplo_update.php">
		<input type="text" name="admin_id" value="admin">
		<label for='id'> 주소 : </label> <?php echo $server_url.'/' ?><input type="text" name="id"> <br>
		<label for='title'> 제목 : </label> <input type="text" name="title"> <br>
		<label for='logofile'> 로고 이미지 : </label> <input type="file" name="logofile"> <br>
		<button type="submit">생성</button>
	</form>
</main>
<!-- 메인 끝 -->
<?php
include('./footer.php');
include('./tail.php');
?>