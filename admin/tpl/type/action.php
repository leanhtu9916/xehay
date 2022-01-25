<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	if (isset($_POST['edit'])) {
			$dt->command("UPDATE type SET name='$name' WHERE id='$id'");
			header("location: ../../index.php?view=type&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO type(name) VALUES ('$name')");
		header("location: ../../index.php?view=type&action=add&success=1");
	}
	else{
		$dt->command("DELETE FROM type WHERE id='$id' ");
		header("location: ../../index.php?view=type&action=list");
	}	
?>