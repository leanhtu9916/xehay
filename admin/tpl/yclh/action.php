<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$content=$_POST['content'];
	$sanpham=$_POST['title'];
	$status=$_POST['status'];
	if (isset($_POST['edit'])) {
		$dt->command("UPDATE lienhe SET name='$name',email='$email',phone='$phone',
				address='$address',content='$content',sanpham='$sanpham',status='$status' WHERE id='$id' ");
		header("location: ../../index.php?view=yclh&action=list&pag=1");
	}else{
	$dt->command("DELETE FROM lienhe WHERE id='$id' ");
	header("location: ../../index.php?view=yclh&action=list&pag=1");}

?>