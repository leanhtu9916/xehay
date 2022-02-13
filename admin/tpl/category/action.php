<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	if (isset($_POST['edit'])) {
			$dt->command("UPDATE category SET name='$name' WHERE id='$id'");
			header("location: ../../index.php?view=category&action=list");
		
	}elseif (isset($_POST['add'])) {
		$dt->command("INSERT INTO category(name,count) VALUES ('$name','0')");
		header("location: ../../index.php?view=category&action=add&success=1");
	}else{
		$dt->select("SELECT * FROM category WHERE id='$id'");
		$row=$dt->fetch();
		$category = $row['name'];
		$count = $row['count'];
		if($count==0){
			$dt->command("DELETE FROM category WHERE id='$id' ");
			header("location: ../../index.php?view=category&action=list&done=1");
		}else{
			header("location: ../../index.php?view=category&action=list&done=0");
		}
		$dt->command("UPDATE post SET category='' WHERE category='$category'");
		
		
	}	
?>