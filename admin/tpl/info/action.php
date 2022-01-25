<?php
	include_once("../../config.php");
	$dt=new database();
	$ban_do=$_POST["ban_do"];
	$video=$_POST["video"];
	$video_2=$_POST["video_2"];
	$thong_tin_lien_he=$_POST["thong_tin_lien_he"];
	$image_link=$_FILES['banner']['name'];
	$image_link_tmp=$_FILES['banner']['tmp_name'];
	move_uploaded_file($image_link_tmp,'uploads/'.$image_link);
	$logo=$_FILES['logo']['name'];
	$logo_tmp=$_FILES['logo']['tmp_name'];
	move_uploaded_file($logo_tmp,'uploads/'.$logo);
	if (isset($_POST['edit'])) {
		if ($image_link!="") { 
			$dt->command("UPDATE info SET thong_tin_lien_he='$thong_tin_lien_he',ban_do='$ban_do',banner='$image_link',logo='$logo',video='$video',video_2='$video_2' WHERE id='1'  ");
			header("location: ../../index.php?view=info");
		}else {
			$dt->command("UPDATE info SET thong_tin_lien_he='$thong_tin_lien_he',ban_do='$ban_do',video='$video',video_2='$video_2' WHERE id='1'  ");
			header("location: ../../index.php?view=info");
		}
	}
?>