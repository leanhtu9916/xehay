<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$category=$_POST['category'];
	$description=$_POST['description'];
	$content=$_POST['content'];
	$image_link=$_FILES['thumbnail']['name'];
	$image_link_tmp=$_FILES['thumbnail']['tmp_name'];
	move_uploaded_file($image_link_tmp,'uploads/'.$image_link);
	if (isset($_POST['edit'])) {
		if ($image_link=="") { 
			$dt->select("SELECT * FROM post WHERE id='$id'");
			$row=$dt->fetch();
			$category2 = $row['category'];
			$dt->select("SELECT * FROM category WHERE name='$category2'");
			$row=$dt->fetch();
			$count2 = $row['count'] - 1;
			$dt->command("UPDATE category SET count='$count2' WHERE name='$category2'");
			$dt->select("SELECT * FROM category WHERE name='$category'");
			$row=$dt->fetch();
			$count = $row['count']+1;
			$dt->command("UPDATE category SET count='$count' WHERE name='$category'");
			$dt->command("UPDATE post SET name='$name',category='$category',content='$content',description='$description' WHERE id='$id'  ");
			header("location: ../../index.php?view=post&action=list");
		}else {
			$dt->select("SELECT * FROM post WHERE id='$id'");
			$row=$dt->fetch();
			$category2 = $row['category'];
			$dt->select("SELECT * FROM category WHERE name='$category2'");
			$row=$dt->fetch();
			$count2 = $row['count'] - 1;
			$dt->command("UPDATE category SET count='$count2' WHERE name='$category2'");
			$dt->select("SELECT * FROM category WHERE name='$category'");
			$row=$dt->fetch();
			$count = $row['count']+1;
			$dt->command("UPDATE category SET count='$count' WHERE name='$category'");
			$dt->command("UPDATE post SET name='$name',category='$category',content='$content',thumbnail='$image_link',description='$description' WHERE id='$id'");
			header("location: ../../index.php?view=post&action=list");
		}
			
		
	}elseif (isset($_POST['add'])) {
		$dt->select("SELECT * FROM category WHERE name='$category'");
		$row=$dt->fetch();
		$count = $row['count']+1;
		$dt->command("UPDATE category SET count='$count' WHERE name='$category'");
		$dt->command("INSERT INTO post(name,thumbnail,category,description,content) VALUES ('$name','$image_link','$category','$description','$content')");
		header("location: ../../index.php?view=post&action=add&success=1");
	}
	else{
		$dt->select("SELECT * FROM post WHERE id='$id'");
		$row=$dt->fetch();
		$category2 = $row['category'];
		$dt->select("SELECT * FROM category WHERE name='$category2'");
		$row=$dt->fetch();
		$count2 = $row['count'] - 1;
		$dt->command("UPDATE category SET count='$count2' WHERE name='$category2'");
		$dt->command("DELETE FROM post WHERE id='$id' ");
		
		header("location: ../../index.php?view=post&action=list&pag=1");
	}	
?>