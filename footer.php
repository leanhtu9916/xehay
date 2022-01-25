<?php
	include_once("config.php");
	$dt=new database();
	$dt->select("SELECT * FROM info");
	$row=$dt->fetch();
?>
<!-- footer -->
<footer id="footer">
	<div class="container">		
		<div class="row">
			<div class="col-12 col-sm-6 col-lg-5 footer-info">
				<div class="title">THÔNG TIN LIÊN HỆ</div>
				<?php echo $row['thong_tin_lien_he']; ?>
			</div>
			<div class="col-12 col-sm-6 col-lg-3 footer-block">
				<div class="title">HỖ TRỢ KHÁCH HÀNG</div>
				<div class="footer-block-menu">
					<ul class="menu">
						<li><a class="<?php if ($view=='home') {echo 'current-menu-item';} ?>" href="index.php">Trang chủ</a></li>
						<li><a class="<?php if ($view=='about') {echo 'current-menu-item';} ?>" href="?view=about">Giới thiệu</a></li>
						<li>
							<a class="<?php if ($status=='news' && $view=='product_cat') {echo 'current-menu-item';} ?>" href="?view=product_cat&status=news">Bán xe mới</a>
						</li>
						<li>
							<a class="<?php if ($status=='old' && $view=='product_cat') {echo 'current-menu-item';} ?>" href="?view=product_cat&status=old">Bán xe cũ</a>
						</li>
						<li><a class="<?php if ($view=='contact') {echo 'current-menu-item';} ?>" href="?view=contact">Liên hệ</a></li>
						<li><a class="<?php if ($view=='category') {echo 'current-menu-item';} ?>" href="?view=category">Tin tức</a></li>
					</ul>
				</div>
				<ul class="social">
					<?php
						$dt->select("SELECT * FROM social");
						$row2=$dt->fetch();
					?>
					<li><a target="_blank" href="<?php echo $row2['facebook']; ?>"><i class="fab fa-facebook-f"></i></a></li>
					<li><a target="_blank" href="<?php echo $row2['youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
					<li><a target="_blank" href="<?php echo $row2['instagram']; ?>"><i class="fab fa-instagram"></i></a></li>
					<li><a target="_blank" href="<?php echo $row2['twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
					<li><a target="_blank" href="<?php echo $row2['pinterest']; ?>"><i class="fab fa-pinterest-p"></i></a></li>
				</ul>
			</div>
			<div class="col-12 col-sm-6 col-lg-4 footer-block">
				<div class="title">BẢN ĐỒ</div>
				<?php echo $row['ban_do']; ?>
			</div>
		</div>		
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="d-flex flex-wrap justify-content-between">
				<div class="copyright">
					Đồ án tốt nghiệp - Lê Anh Tú
				</div>
				<div class="fb-hotline">
					Hotline tư vấn 24/7: <?php echo $row2['hotline']; ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- footer -->
<div class="phonering-alo">
	<div>
		<a href="https://zalo.me/<?php echo $row2['hotline']; ?>"><img src="images/zalo.png"></a><span>Tư vấn: <?php echo $row2['hotline']; ?></span>
	</div>
	<div>
		<a href="tel:<?php echo $row2['zalo']; ?>"><img src="images/call.png"></a><span>Tư vấn: <?php echo $row2['zalo']; ?> </span>
	</div>
</div>
