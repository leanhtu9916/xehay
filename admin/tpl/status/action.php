<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	if (isset($_POST['edit'])) {
			$dt->command("UPDATE status SET name_status='$name' WHERE id_status='$id'");
			header("location: ../../index.php?view=status&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO status(name_status) VALUES ('$name')");
		header("location: ../../index.php?view=status&action=add&success=1");
	}
	else{
		$dt->command("DELETE FROM status WHERE id_status='$id' ");
		header("location: ../../index.php?view=status&action=list");
	}	
?>