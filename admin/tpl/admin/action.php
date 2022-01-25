<?php
	       include_once("../../config.php");
  $dt=new database();
   $id=isset($_GET["id"])?$_GET["id"]:"";
             if (isset($_POST['edit'])) {
                $pass=$_POST['pass'];
                $pass_old=$_POST['pass_old'];
                 $dt->select("SELECT * FROM admin WHERE id='$id' ");
                  $row=$dt->fetch();
                  if ($pass_old == $row['password']) {
                  $dt->command("UPDATE admin SET password='$pass' WHERE id='$id' ");
                  header("location:../../index.php?view=admin&action=editpass&id=".$id."&success=1");
                  }else{
                      header("location:../../index.php?view=admin&action=editpass&id=".$id."&success=0");
                  }
             }
             if (isset($_POST['editname'])) {
             		$name=$_POST['name'];
             		 $dt->command("UPDATE admin SET name='$name' WHERE id='$id' ");
             		 header("location:../../index.php?view=admin&action=list");
             }
             if (isset($_POST['edit_thumbnail'])) {
             		$thumbnail=$_FILES['thumbnail']['name'];
					$thumbnail_tmp=$_FILES['thumbnail']['tmp_name'];
					move_uploaded_file($thumbnail_tmp,'uploads/'.$thumbnail);
             		 $dt->command("UPDATE admin SET thumbnail='$thumbnail' WHERE id='$id' ");
             		 header("location:../../index.php?view=admin&action=list");
             }
?>