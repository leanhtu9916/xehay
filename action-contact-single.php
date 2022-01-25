<?php
	include_once("phpmailer.php");
	include_once("config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$sanpham=$_POST['title'];
	$content=$_POST['content'];

	
    $message = "Họ tên: ".$name."<br> Sản phẩm: ".$sanpham."<br> Số điện thoại: ".$phone."<br> Email: ".$email."<br> Địa chỉ: ".$address."<br>Nội dung: ".$content;
   
    //Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Contact';
	$mail->Body    =  $message;
	$mail->send();

	$dt->command("INSERT INTO lienhe(name,email,phone,address,sanpham,content,status) VALUES ('$name','$email','$phone','$address','$sanpham','$content','Mới')");
	header("location: index.php?view=single-product&id=".$id."&sucess=1");
?>