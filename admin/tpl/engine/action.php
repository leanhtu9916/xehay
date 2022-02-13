<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	if (isset($_POST['edit'])) {
			$dt->command("UPDATE engine SET name_engine='$name' WHERE id='$id'");
			header("location: ../../index.php?view=engine&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO engine(name_engine) VALUES ('$name')");
		header("location: ../../index.php?view=engine&action=add&success=1");
	}
	else{
		$dt->command("DELETE FROM engine WHERE id='$id' ");
		header("location: ../../index.php?view=engine&action=list");
	}	
?>