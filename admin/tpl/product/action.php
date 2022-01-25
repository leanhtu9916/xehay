<?php
	include_once("../../config.php");
	$dt=new database();
	$Id=isset($_GET["id"])?$_GET["id"]:"";
	$Name=$_POST["name"];
	$Feature=$_POST["feature"];
	if ($Feature!="") {
		$Feature='1';
	}else {
		$Feature='0';
	}
	$Price=$_POST['price'];
	$Discount=$_POST['discount'];
	$Fuel=$_POST['fuel'];
	$Year=$_POST['year'];
	$Engine=$_POST['engine'];
	$Type=$_POST['type'];
	$Image_link=$_FILES['thumbnail']['name'];
	$Image_link_tmp=$_FILES['thumbnail']['tmp_name'];
	move_uploaded_file($Image_link_tmp,'uploads/'.$Image_link);
	$Category=$_POST['category'];
	$Status=$_POST['status'];
	$Tong_quan=$_POST['tong_quan'];
	$Ngoai_that=$_POST['ngoai_that'];
	$Noi_that=$_POST['noi_that'];
	$Van_hanh=$_POST['van_hanh'];
	$An_toan=$_POST['an_toan'];
	$Tien_ich=$_POST['tien_ich'];
	$Thong_so_ky_thuat=$_POST['thong_so_ky_thuat'];
	$Thu_vien_anh=$_POST['thu_vien_anh'];
	$Khung_gam=$_POST['khung_gam'];
	if (isset($_POST['edit'])) {
		if ($Image_link=="") { 
			$dt->select("SELECT * FROM product WHERE id='$Id'");
			$row=$dt->fetch();
			$Category2 = $row['category'];
			$dt->select("SELECT * FROM product_cat WHERE name='$Category2'");
			$row=$dt->fetch();
			$count2 = $row['count'] - 1;
			$dt->command("UPDATE product_cat SET count='$count2' WHERE name='$Category2'");
			$dt->select("SELECT * FROM product_cat WHERE name='$Category'");
			$row=$dt->fetch();
			$count = $row['count']+1;
			$dt->command("UPDATE product_cat SET count='$count' WHERE name='$Category'");
			$dt->command("UPDATE product SET name='$Name',price='$Price',
			discount='$Discount',fuel='$Fuel',year='$Year',engine='$Engine',type='$Type',category='$Category',tong_quan='$Tong_quan',ngoai_that='$Ngoai_that',noi_that='$Noi_that',van_hanh='$Van_hanh',an_toan='$An_toan',tien_ich='$Tien_ich',status='$Status',thong_so_ky_thuat='$Thong_so_ky_thuat',thu_vien_anh='$Thu_vien_anh', khung_gam='$Khung_gam' WHERE id='$Id'");
			header("location: ../../index.php?view=product&action=list");
		}else {
			$dt->select("SELECT * FROM product WHERE id='$id'");
			$row=$dt->fetch();
			$Category2 = $row['category'];
			$dt->select("SELECT * FROM product_cat WHERE name='$Category2'");
			$row=$dt->fetch();
			$count2 = $row['count'] - 1;
			$dt->command("UPDATE product_cat SET count='$count2' WHERE name='$Category2'");
			$dt->select("SELECT * FROM product_cat WHERE name='$Category'");
			$row=$dt->fetch();
			$count = $row['count']+1;
			$dt->command("UPDATE product_cat SET count='$count' WHERE name='$Category'");
			$dt->command("UPDATE product SET name='$Name',price='$Price',
				discount='$Discount',fuel='$Fuel',year='$Year',engine='$Engine',type='$Type',category='$Category',tong_quan='$Tong_quan',ngoai_that='$Ngoai_that',noi_that='$Noi_that',van_hanh='$Van_hanh',an_toan='$An_toan',tien_ich='$Tien_ich',status='$Status',thong_so_ky_thuat='$Thong_so_ky_thuat',thu_vien_anh='$Thu_vien_anh',thumbnail='$Image_link',khung_gam='$Khung_gam' WHERE id='$Id'");
			header("location: ../../index.php?view=product&action=list");
		}
			
		
	}elseif (isset($_POST['add'])) {
		$dt->select("SELECT * FROM product_cat WHERE name='$Category'");
		$row=$dt->fetch();
		$count = $row['count']+1;
		$dt->command("UPDATE product_cat SET count='$count' WHERE name='$Category'");
		$dt->command("INSERT INTO product(name,price,discount,fuel,year,engine,type,category,tong_quan,ngoai_that,noi_that,van_hanh,an_toan,tien_ich,status,feature,thong_so_ky_thuat,thu_vien_anh,thumbnail,khung_gam) VALUES ('$Name','$Price','$Discount','$Fuel','$Year','$Engine','$Type','$Category','$Tong_quan','$Ngoai_that','$Noi_that','$Van_hanh','$An_toan','$Tien_ich','$Status','$Feature','$Thong_so_ky_thuat','$Thu_vien_anh','$Image_link','$Khung_gam')");
		header("location: ../../index.php?view=product&action=add&success=1");	
	}
	else{
		$dt->select("SELECT * FROM product WHERE id='$Id'"); // select lấy dữ liệu rồi gán vào mảng dt 
		$row=$dt->fetch();  // fetch lấy từng hàng trong mảng dt
		$category2 = $row['category'];
		$dt->select("SELECT * FROM product_cat WHERE name='$category2'");
		$row=$dt->fetch();
		$count2 = $row['count'] - 1;
		$dt->command("UPDATE product_cat SET count='$count2' WHERE name='$category2'");
		$dt->command("DELETE FROM product WHERE id='$Id' ");  //command là để thực hiện câu truy vấn( tác động vào cơ sở dữ liệu)
		
		header("location: ../../index.php?view=product&action=list&pag=1");
	}	
?>