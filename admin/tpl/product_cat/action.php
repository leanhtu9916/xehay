<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=isset($_POST["name"])?$_POST['name']:'';
	if (isset($_POST['edit'])) {
			$dt->command("UPDATE product_cat SET name_dongxe='$name' WHERE id='$id'");
			header("location: ../../index.php?view=product_cat&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO product_cat(name_dongxe,count) VALUES ('$name','0')");
		header("location: ../../index.php?view=product_cat&action=add&success=1");
	}
	else{
		$dt->select("SELECT * FROM product_cat WHERE id='$id'");
		$row=$dt->fetch();
		$category = $row['id'];
		$dt->command("UPDATE product SET category='0'");
		$dt->command("DELETE FROM product_cat WHERE id='$id'");
		header("location: ../../index.php?view=product_cat&action=list");
	}	
?>