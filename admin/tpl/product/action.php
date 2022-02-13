<?php
	include_once("../../config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST["name"];
	$feature=$_POST["feature"];
	if ($feature!="") {
		$feature='1';
	}else {
		$feature='0';
	}
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$fuel=$_POST['fuel'];
	$year=$_POST['year'];
	$engine=$_POST['engine'];
	$type=$_POST['type'];
	$image_link=$_FILES['thumbnail']['name'];
	$image_link_tmp=$_FILES['thumbnail']['tmp_name'];
	move_uploaded_file($image_link_tmp,'uploads/'.$image_link);
	$category=$_POST['category'];
	$status=$_POST['status'];
	$tong_quan=$_POST['tong_quan'];
	$ngoai_that=$_POST['ngoai_that'];
	$noi_that=$_POST['noi_that'];
	$van_hanh=$_POST['van_hanh'];
	$an_toan=$_POST['an_toan'];
	$tien_ich=$_POST['tien_ich'];
	$thong_so_ky_thuat=$_POST['thong_so_ky_thuat'];
	$khung_gam=$_POST['khung_gam'];
	$thu_vien_anh=$_POST['thu_vien_anh'];
	if (isset($_POST['edit'])) {
		if ($image_link=="") { 
			$dt->select("SELECT * FROM product WHERE product_id='$id'");
			$row=$dt->fetch();
			$category2 = $row['category'];
			$dt->select("SELECT * FROM product_cat WHERE id='$category2'");
			$row=$dt->fetch();
			$count2 = $row['count'] - 1;
			$dt->command("UPDATE product_cat SET count='$count2' WHERE id='$category2'");
			$dt->select("SELECT * FROM product_cat WHERE id='$category'");
			$row=$dt->fetch();
			$count = $row['count']+1;
			$dt->command("UPDATE product_cat SET count='$count' WHERE id='$category'");
			$dt->command("UPDATE product SET name='$name',price='$price',
			discount='$discount',fuel='$fuel',year='$year',engine='$engine',type='$type',category='$category',tong_quan='$tong_quan', ngoai_that='$ngoai_that',noi_that='$noi_that',van_hanh='$van_hanh',an_toan='$an_toan',tien_ich='$tien_ich',status='$status',thong_so_ky_thuat='$thong_so_ky_thuat',thu_vien_anh='$thu_vien_anh',khung_gam='$khung_gam' WHERE product_id='$id'");
			header("location: ../../index.php?view=product&action=list&a=11");
		}else {
			$dt->select("SELECT * FROM product WHERE product_id='$id'");
			$row=$dt->fetch();
			$category2 = $row['category'];
			$dt->select("SELECT * FROM product_cat WHERE id='$category2'");
			$row=$dt->fetch();
			$count2 = $row['count'] - 1;
			$dt->command("UPDATE product_cat SET count='$count2' WHERE id='$category2'");
			$dt->select("SELECT * FROM product_cat WHERE id='$category'");
			$row=$dt->fetch();
			$count = $row['count']+1;
			$dt->command("UPDATE product_cat SET count='$count' WHERE id='$category'");
			$dt->command("UPDATE product SET name='$name',price='$price',
			discount='$discount',fuel='$fuel',year='$year',engine='$engine',type='$type',category='$category',tong_quan='$tong_quan',thumbnail='$image_link',ngoai_that='$ngoai_that',noi_that='$noi_that',van_hanh='$van_hanh',an_toan='$an_toan',tien_ich='$tien_ich',status='$status',thong_so_ky_thuat='$thong_so_ky_thuat',thu_vien_anh='$thu_vien_anh',khung_gam='$khung_gam' WHERE product_id='$id'");
			header("location: ../../index.php?view=product&action=list&a=23");
		}
			
		
	}elseif (isset($_POST['add'])) {
		$dt->select("SELECT * FROM product_cat WHERE id='$category'");
		$row=$dt->fetch();
		$count = $row['count']+1;
		$dt->command("UPDATE product_cat SET count='$count' WHERE id='$category'");
		$dt->command("INSERT INTO product(name,price,discount,fuel,year,engine,type,category,tong_quan,ngoai_that,noi_that,van_hanh,an_toan,tien_ich,status,feature,thong_so_ky_thuat,thu_vien_anh,thumbnail,khung_gam) VALUES ('$name','$price','$discount','$fuel','$year','$engine','$type','$category','$tong_quan','$ngoai_that','$noi_that','$van_hanh','$an_toan','$tien_ich','$status','$feature','$thong_so_ky_thuat','$thu_vien_anh','$image_link','$khung_gam')");
		header("location: ../../index.php?view=product&action=add&success=1");	
	}else{
		$dt->select("SELECT * FROM product WHERE product_id='$id'");
		$row=$dt->fetch();
		$category2 = $row['category'];
		$dt->select("SELECT * FROM product_cat WHERE id='$category2'");
		$row=$dt->fetch();
		$count2 = $row['count'] - 1;
		$dt->command("UPDATE product_cat SET count='$count2' WHERE id='$category2'");
		$dt->command("DELETE FROM product WHERE product_id='$id' ");
		
		header("location: ../../index.php?view=product&action=list&pag=1");
	}	
?>