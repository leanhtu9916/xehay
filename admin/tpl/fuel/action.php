<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	if (isset($_POST['edit'])) {
			$dt->command("UPDATE fuel SET name='$name' WHERE id='$id'");
			header("location: ../../index.php?view=fuel&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO fuel(name) VALUES ('$name')");
		header("location: ../../index.php?view=fuel&action=add&success=1");
	}
	else{
		$dt->command("DELETE FROM fuel WHERE id='$id' ");
		header("location: ../../index.php?view=fuel&action=list");
	}	
?>