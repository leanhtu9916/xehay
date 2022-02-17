<?php
	include_once("config.php");
	$dt=new database();
	$dt->select("SELECT * FROM social");
	$row=$dt->fetch();
	$view=isset($_GET['view'])?$_GET['view']:"home";
	$status=isset($_GET['status'])?$_GET['status']:"";
	$cat=isset($_GET['cat'])?$_GET['cat']:"";
	$id=isset($_GET['id'])?$_GET['id']:"";
?>
<!-- header -->
<?php include_once('header-mobile.php'); ?>
<header id="header">
	<div class="header-top">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-lg-4">
					<ul>  
						<li><a href="tel:<?php echo $row['hotline']; ?>" title="Hotline: <?php echo $row['hotline']; ?>"><i class="fas fa-phone-square"></i> Hotline: <?php echo $row['hotline']; ?> </a></li>
						<li><a href="mailto:<?php echo $row['email']; ?>" title="<?php echo $row['email']; ?>"><i class="far fa-envelope-open"></i> <?php echo $row['email']; ?> </a></li>
					</ul>
				</div>
				<div class="col-12 col-lg-8 d-none d-lg-block">
					<form action="index.php?view=search" method="post" class="search-form">
						<input type="text" name="s" value="" placeholder="Nhập từ khóa tìm kiếm... " class="input-text" autocomplete="off">
						<button type="submit" name="search"><i class="fas fa-search"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="header-main d-lg-block d-none header-sticky">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3 col-12">
					<div id="logo">
						<a href="index.php">
							<?php
								$dt->select("SELECT * FROM info");
								$row=$dt->fetch();
							?>
							<img src="admin/tpl/info/uploads/<?php echo $row['logo'] ?>" alt="">
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-12">
					<div id="primary-menu">
						<ul class="menu">
							<li><a class="<?php if ($view=='home') {echo 'current-menu-item';} ?>" href="index.php">Trang chủ</a></li>
							<li><a class="<?php if ($view=='about') {echo 'current-menu-item';} ?>" href="?view=about">Giới thiệu</a></li>
							<li class="menu-item-has-children">
								<a class="<?php if ($status=='news' && $view=='product_cat') {echo 'current-menu-item';} ?>" href="?view=product_cat&status=news">Bán xe mới</a>
								<ul class="sub-menu">
									<?php
										$dt->select("SELECT * FROM product_cat ORDER BY id desc");
										while ($row=$dt->fetch()) {
										?>
										<li><a class="<?php if ($view=='product_cat' && $cat==$row['id'] && $status=='news' ) {echo 'current-menu-item';} ?>" href="?view=product_cat&cat=<?php echo $row['id'] ?>&status=news"><?php echo $row['name_dongxe'] ?></a></li>
										<?php
									}?>
								</ul>
							</li>
							<li class="menu-item-has-children">
								<a class="<?php if ($status=='old' && $view=='product_cat') {echo 'current-menu-item';} ?>" href="?view=product_cat&status=old">Bán xe cũ</a>
								<ul class="sub-menu">
									<?php
										$dt->select("SELECT * FROM product_cat ORDER BY id desc");
										while ($row=$dt->fetch()) {
										?>
										<li><a class="<?php if ( $view=='product_cat' && $cat==$row['id'] && $status=='old' ) {echo 'current-menu-item';} ?>" href="?view=product_cat&cat=<?php echo $row['id'] ?>&status=old"><?php echo $row['name_dongxe'] ?></a></li>
										<?php
									}?>
								</ul>
							</li>
							<li><a class="<?php if ($view=='contact') {echo 'current-menu-item';} ?>" href="?view=contact">Liên hệ</a></li>
							<li class="menu-item-has-children">
								<a class="<?php if ($view=='category' && $id=='') {echo 'current-menu-item';} ?>" href="?view=category">Tin tức</a>
								<ul class="sub-menu">
								<?php
										$dt->select("SELECT * FROM category ORDER BY id desc");
										while ($row=$dt->fetch()) {
										?>
										<li><a class="<?php if ( $view=='category' && $cat==$row['id'] ) {echo 'current-menu-item';} ?>" href="?view=category&id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>
										<?php
									}?>
								</ul>
							</li>
							<?php
								$dt->select("SELECT * FROM social");
								$row=$dt->fetch();
							?>
							<li><a href="tel:<?php echo $row['hotline']; ?>"><i class="fas fa-phone-square"></i> <?php echo $row['hotline']; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-mobile d-block d-lg-none header-sticky">
		<div class="container">
			<div class="d-flex align-items-center position-relative">
				<div class="icon-search">
					<i class="fa fa-search"></i>
				</div>
				<form action="index.php?view=search" method="post" class="search-form">
					<input type="text" name="q" value="" placeholder="Nhập từ khóa tìm kiếm... " class="input-text" autocomplete="off">
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
				<div id="logo" class="flex-grow-1">
					<?php
						$dt->select("SELECT * FROM info");
						$row=$dt->fetch();
					?>
					<a href="index.php"><img src="admin/tpl/info/uploads/<?php echo $row['logo'] ?>" alt=""></a>
				</div>
				<a class="showbar" href="#">
					<span class="icon"><i class="fa fa-align-justify"></i></span>
				</a>
			</div>
		</div>
	</div>
</header>

<!-- header -->