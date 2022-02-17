<!-- Trang chi tiết sản phẩm -->
<?php
	include_once("config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$dt->select("SELECT * FROM product WHERE product_id='$id'");
	$row=$dt->fetch();
?>
<div id="content" class="mt-4 mb-4">
	<div class="container">
		<div class="singular-post-content list-item-car">
			<div class="row">
				<div class="sidebar col-lg-2 col-12 d-lg-block d-none order-3 order-lg-1">
					<div class="sticky">
						<ul class="menu-scroll">
							<li><a href="#tongquan">Tổng quan</a></li>
							<li><a href="#ngoaithat">Ngoại thất</a></li>
							<li><a href="#noithat">Nội thất</a></li>
							<li><a href="#vanhanh">Vận hành</a></li>
							<li><a href="#antoan">An toàn</a></li>
							<li><a href="#tienich">Tiện ích</a></li>
							<li><a href="#thongso">Thông số kỹ thuật</a></li>
							<li><a href="#khunggam">Khung gầm</a></li>
							<li><a href="#thuvienanh">Thư viện hình ảnh</a></li>
						</ul>
					</div>
				</div>
				<div id="main" class="col-lg-7 col-12 order-2 order-lg-2">
					<section class="pro_center">
						<?php
							$sucess=isset($_GET["sucess"])?$_GET["sucess"]:"";
							if ($sucess =="1") {
								?>
								<p class="alert alert-danger">Gửi thành công</p>
								<?php
							}
						?>
						<div class="box_title"><label><?php echo $row['name']; ?></label></div>
						<div class="fl_title "><label>Tổng quan</label></div>
						<div id="tongquan">
							<?php echo $row['tong_quan']; ?>
						</div>
						<div class="fl_title "><label>Ngoại thất</label></div>
						<div id="ngoaithat">
							<?php echo $row['ngoai_that']; ?>
						</div>
						<div class="fl_title "><label>Nội thất</label></div>
						<div id="noithat">
							<?php echo $row['noi_that']; ?>
						</div>
						<div class="fl_title "><label>Vận hành</label></div>
						<div id="vanhanh">
							<?php echo $row['van_hanh']; ?>
						</div>
						<div class="fl_title "><label>An toàn</label></div>
						<div id="antoan">
							<?php echo $row['an_toan']; ?>
						</div>
						<div class="fl_title "><label>Tiện ích</label></div>
						<div id="tienich">
							<?php echo $row['tien_ich']; ?>
						</div>
						<div class="fl_title "><label>Thông số kỹ thuật</label></div>
						<div id="thongso">
							<?php echo $row['thong_so_ky_thuat']; ?>
						</div>
						<div class="fl_title "><label>Khung gầm</label></div>
						<div id="khunggam">
							<?php echo $row['khung_gam']; ?>
						</div>
						<div class="fl_title "><label>Thư viện hình ảnh</label></div>
						<div id="thuvienanh">
							<?php echo $row['thu_vien_anh']; ?>
						</div>
					</section>
				</div>
				<div class="col-lg-3 col-12 order-1 order-lg-3">
					<div class="sticky">
						<div class="box_thongtin">
							<div class="thongtin_img">
								<img src="images/hotline-o3gfqrbb.jpg" alt="HOTLINE">
							</div>
							<div class="thongtin_item">
								<ul>
									<?php 
										$dt->select("SELECT * FROM social");
										$row2=$dt->fetch(); 
									?>
									<li><b>HOTLINE</b></li>
									<li>Phòng Kinh Doanh</li>
									<li><a href="tel:<?php echo $row2['hotline']; ?>"><em><i class=" fa fa-phone-square"></i> <?php echo $row2['hotline']; ?></em></a></li>
								</ul>
							</div>
							<div class="left_tienich">
								<ul>
									<li><a href='#modal-tvcx' data-toggle="modal" class="btn-tvcx pum-trigger" style="cursor: pointer;"> <i class="fa fa-tag"></i> <span>Tư vấn chọn xe</span></a></li>
									<li><a href='#modal-ycbg' data-toggle="modal" class="btn-ycbg pum-trigger" style="cursor: pointer;"> <i class="fas fa-dollar-sign"></i> <span>Yêu cầu báo giá</span></a></li>
									<li><a href='#modal-dklt' data-toggle="modal" class="btn-dklt pum-trigger" style="cursor: pointer;"> <i class="fa fa-road"></i> <span>Đăng ký lái thử</span></a></li>
								</ul>
							</div>
						</div>
					</div>	
				</div>
			</div>	
		</div>
	</div>
</div>
<div class="modal fade" id="modal-tvcx">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action-contact-single.php?id=<?php echo $id; ?>" method="post" class="contact">
					<h3 style="color:#f00;font-size: 18px;text-transform: uppercase;">Tư vấn chọn xe</h3>
					<label>Sản phẩm</label>
					<input type="text" readonly value="<?php echo $row['name']; ?>" name="title">
					<label>Họ và Tên <span style="color:#f00;">(*)</span></label>
					<input type="text" name="name" placeholder="Nguyễn Văn A" required="required" >
					<label>Số điện thoại <span style="color:#f00;">(*)</span></label>
					<input type="phone" name="phone" placeholder="0123456789" required="required">
					<label>Email</label>
					<input type="email" name="email" placeholder="support@gmail.com">
					<label>Địa chỉ</label>
					<input type="text" name="address" placeholder="Thái nguyên">
					<label>Nội dung</label>
					<textarea name="content" placeholder=""></textarea>
					<input type="submit" name="submit" value="Gửi yêu cầu">
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-ycbg">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action-contact-single.php?id=<?php echo $id; ?>" method="post" class="contact">
					<h3 style="color:#f00;font-size: 18px;text-transform: uppercase;">Yêu cầu báo giá</h3>
					<label>Sản phẩm</label>
					<input type="text" readonly value="<?php echo $row['name']; ?>" name="title">
					<label>Họ và Tên <span style="color:#f00;">(*)</span></label>
					<input type="text" name="name" placeholder="Nguyễn Văn A" required="required" >
					<label>Số điện thoại <span style="color:#f00;">(*)</span></label>
					<input type="phone" name="phone" placeholder="0123456789" required="required">
					<label>Email</label>
					<input type="email" name="email" placeholder="support@gmail.com">
					<label>Địa chỉ</label>
					<input type="text" name="address" placeholder="Thái nguyên">
					<label>Nội dung</label>
					<textarea name="content" placeholder=""></textarea>
					<input type="submit" name="submit" value="Gửi yêu cầu">
				</form>
				
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-dklt">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action-contact-single.php?id=<?php echo $id; ?>" method="post" class="contact">
					<h3 style="color:#f00;font-size: 18px;text-transform: uppercase;">Đăng ký lái thử</h3>
					<label>Sản phẩm</label>
					<input type="text" readonly value="<?php echo $row['name']; ?>" name="title">
					<label>Họ và Tên <span style="color:#f00;">(*)</span></label>
					<input type="text" name="name" placeholder="Nguyễn Văn A" required="required" >
					<label>Số điện thoại <span style="color:#f00;">(*)</span></label>
					<input type="text" name="phone" placeholder="0123456789" required="required">
					<label>Email</label>
					<input type="text" name="email" placeholder="support@gmail.com">
					<label>Địa chỉ</label>
					<input type="text" name="address" placeholder="Thái nguyên">
					<label>Nội dung</label>
					<textarea name="content" placeholder=""></textarea>
					<input type="submit" name="submit" value="Gửi yêu cầu">
				</form>
			
			</div>
		</div>
	</div>
</div>