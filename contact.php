<!-- Trang liên hệ -->
<?php
	include_once("phpmailer.php");
	include_once("config.php");
	$dt=new database();
	$dt->select("SELECT * FROM contact");
	$row=$dt->fetch();
	$notice = "";
	if (isset($_POST['submit'])) {
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$title=$_POST['title'];
		$content=$_POST['content'];

	   $message = "Họ tên: ".$name."<br> Số điện thoại: ".$phone."<br> Email: ".$email."<br> Địa chỉ: ".$address."<br>Nội dung: ".$content;
	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Contact';
	    $mail->Body    =  $message;
	 
	    $mail->send();
		$dt->command("INSERT INTO contact_form(name,email,phone,address,title,content,status) VALUES ('$name','$email','$phone','$address','$title','$content','Mới')");
		$notice = "Gửi thành công";
	}
?>

<div id="content" class="mt-4 mb-4">
	<div class="container">
		<h3 class="page-heading">Liên hệ</h3>
		<div class="singular-post-content ">
			<div class="row">
				<div class="col-lg-6 col-12 mb-3 mb-lg-0">
					<?php echo $row['content']; ?>
				</div>
				<div class="col-lg-6 col-12 mb-3 mb-lg-0">
					<?php
						if ($notice !="") {
							?>
							<p class="alert alert-danger"><?php echo $notice; ?></p>
							<?php
						}
					?>
					<form action="" method="post" class="contact">
						<label>Họ và Tên <span style="color:#f00;">(*)</span></label>
						<input type="text" name="name" placeholder="Nguyễn Văn A" required="required" >
						<label>Số điện thoại <span style="color:#f00;">(*)</span></label>
						<input type="phone" name="phone" placeholder="0123456789" required="required">
						<label>Email</label>
						<input type="email" name="email" placeholder="support@gmail.com">
						<label>Địa chỉ</label>
						<input type="text" name="address" placeholder="Thái nguyên">
						<label>Tiêu đề</label>
						<input type="text" name="title" placeholder="Phản hồi về ... ">
						<label>Nội dung</label>
						<textarea name="content" placeholder=""></textarea>
						<input type="submit" name="submit" value="Phản Hồi">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>