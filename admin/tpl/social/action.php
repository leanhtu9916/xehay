<?php
	include_once("../../config.php");
	$dt=new database();
	$id=$_POST["id"];
	$hotline=$_POST["hotline"];
	$zalo=$_POST["zalo"];
	$email=$_POST["email"];
	$facebook=$_POST["facebook"];
	$youtube=$_POST["youtube"];
	$instagram=$_POST["instagram"];
	$twitter=$_POST["twitter"];
	$pinterest=$_POST["pinterest"];
	if (isset($_POST['edit'])) {
		$dt->command("UPDATE social SET hotline='$hotline',zalo='$zalo',email='$email',
				facebook='$facebook',youtube='$youtube',instagram='$instagram',twitter='$twitter',pinterest='$pinterest' WHERE id='$id'  ");
			header("location: ../../index.php?view=social");
	}
?>