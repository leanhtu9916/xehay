<?php
	include_once("config.php");
	$dt=new database();
	$dt->select("SELECT * FROM social");
	$row2=$dt->fetch();
?>
<!-- content -->
<div id="content">
	<!-- home-slide -->
	<section class="home-slide">
		<div class="gallery">
			<?php
				$dt->select("SELECT * FROM slide ORDER BY id desc");
				while ($row=$dt->fetch()) {
					if ($row['name'] !="") {
					?>
					<a href="<?php echo $row['link'] ?>"><img src="admin/tpl/slide/uploads/<?php echo $row['name'] ?>" alt=""></a>
				<?php
					}
				}
			?>
		</div>
	</section>
	<!-- home-slide -->

	<!-- products-tab -->
	<section class="products-tab">
		<div class="container">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation">
						<a href="#xnb" class="active" aria-controls="xnb" role="tab" data-toggle="tab">Xế nổi bật</a>
					</li>
					<li role="presentation">
						<a href="#xemoi" aria-controls="xemoi" role="tab" data-toggle="tab">Bán xế mới</a>
					</li>
					<li role="presentation">
						<a href="#xecu" aria-controls="xecu" role="tab" data-toggle="tab">Bán xế cũ</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active fade show" id="xnb">
						<h2 class="heading">Tin tiêu biểu</h2>
						<div class="list-item-car">
							<div class="row">
								<?php
									$dt->select("SELECT * FROM product WHERE feature=1 ORDER BY id desc LIMIT 0,8");
									while ($row=$dt->fetch()) {
										?>
										<div class="col-lg-3 col-md-6 col-12 mb-3">
											<div class="item vip box-list-car-item">
												<div class="photo">
													<div class="ribbon ribbon-top-right">
														<span><i class="fas fa-star"></i> Đặc Biệt</span>
													</div>
													<a href="?view=single-product&id=<?php echo $row['id']; ?>">
														<img src="admin/tpl/product/uploads/<?php echo $row['thumbnail']; ?>" alt="">
													</a>
												</div>
												<div class="info">
													<h3 class="title"> <a href="?view=single-product&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a> </h3>
													<p class="price">
														<?php
															if ($row['discount'] !="") {
																?>
																<span class="regular"><?php echo $row['price']; ?></span>
																<br>
																<span class="sale"><?php echo $row['discount']; ?></span>
																<?php
															}else {
																echo $row['price'];
															}
														?>
													</p>
													<ul class="list">  
														<?php
															if ($row['year'] !="") {
																?>
																<li><i class="far fa-calendar-alt" aria-hidden="true"></i><?php echo $row['year']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['engine'] !="") {
																?>
																<li><i class="fas fa-cogs" aria-hidden="true"></i><?php echo $row['engine']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['type'] !="") {
																?>
																<li><i class="fas fa-flag-checkered" aria-hidden="true"></i><?php echo $row['type']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['fuel'] !="") {
																?>
																<li><i class="fas fa-gas-pump" aria-hidden="true"></i><?php echo $row['fuel']; ?></li>  
																<?php
															}
														?>
													</ul>
													<div class="box-neo"> 
														<div class="row">
															<div class="col-12 col-lg-6 mb-3"> 
														    	<a href="tel:<?php echo $row2['hotline']; ?>" class="mobile btn-call"><i class="fas fa-phone-volume"></i>Gọi điện</a> 
															</div> 
															<div class="col-12 col-lg-6">
															    <a href="sms:<?php echo $row2['hotline']; ?>" class="btn-bargain "><i class="fas fa-comment"></i>Nhắn tin</a> 
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php
									}
								?>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="xemoi">
						<h2 class="heading">Dành cho bạn</h2>
						<div class="list-item-car">
							<div class="row">
								<?php
									$dt->select("SELECT * FROM product WHERE status='Xe mới' ORDER BY id desc LIMIT 0,8");
									while ($row=$dt->fetch()) {
										?>
										<div class="col-lg-3 col-md-6 col-12 mb-3">
											<div class="item vip box-list-car-item">
												<div class="photo">
													<div class="ribbon ribbon-top-right">
														<span><i class="fas fa-star"></i> Xe mới</span>
													</div>
													<a href="?view=single-product&id=<?php echo $row['id']; ?>">
														<img src="admin/tpl/product/uploads/<?php echo $row['thumbnail']; ?>" alt="">
													</a>
												</div>
												<div class="info">
													<h3 class="title"> <a href="?view=single-product&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a> </h3>
													<p class="price">
														<?php
															if ($row['discount'] !="") {
																?>
																<span class="regular"><?php echo $row['price']; ?></span><br>
																<span class="sale"><?php echo $row['discount']; ?></span>
																<?php
															}else {
																echo $row['price'];
															}
														?>
													</p>
													<ul class="list">  
														<?php
															if ($row['year'] !="") {
																?>
																<li><i class="far fa-calendar-alt" aria-hidden="true"></i><?php echo $row['year']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['engine'] !="") {
																?>
																<li><i class="fas fa-cogs" aria-hidden="true"></i><?php echo $row['engine']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['type'] !="") {
																?>
																<li><i class="fas fa-flag-checkered" aria-hidden="true"></i><?php echo $row['type']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['fuel'] !="") {
																?>
																<li><i class="fas fa-gas-pump" aria-hidden="true"></i><?php echo $row['fuel']; ?></li>  
																<?php
															}
														?>
													</ul>
													<div class="box-neo"> 
														<div class="row">
															<div class="col-12 col-lg-6 mb-3"> 
														    	<a href="tel:<?php echo $row2['hotline']; ?>" class="mobile btn-call"><i class="fas fa-phone-volume"></i>Gọi điện</a> 
															</div> 
															<div class="col-12 col-lg-6">
															    <a href="sms:<?php echo $row2['hotline']; ?>" class="btn-bargain "><i class="fas fa-comment"></i>Nhắn tin</a> 
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php
									}
								?>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="xecu">
						<h2 class="heading">Dành cho bạn</h2>
						<div class="list-item-car">
							<div class="row">
								<?php
									$dt->select("SELECT * FROM product WHERE status='Xe cũ' ORDER BY id desc LIMIT 0,8");
									while ($row=$dt->fetch()) {
										?>
										<div class="col-lg-3 col-md-6 col-12 mb-3">
											<div class="item vip box-list-car-item">
												<div class="photo">
													<div class="ribbon ribbon-top-right">
														<span><i class="fas fa-star"></i> Xe cũ</span>
													</div>
													<a href="?view=single-product&id=<?php echo $row['id']; ?>">
														<img src="admin/tpl/product/uploads/<?php echo $row['thumbnail']; ?>" alt="">
													</a>
												</div>
												<div class="info">
													<h3 class="title"> <a href="?view=single-product&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a> </h3>
													<p class="price">
														<?php
															if ($row['discount'] !="") {
																?>
																<span class="regular"><?php echo $row['price']; ?></span><br>
																<span class="sale"><?php echo $row['discount']; ?></span>
																<?php
															}else {
																echo $row['price'];
															}
														?>
													</p>
													<ul class="list">  
														<?php
															if ($row['year'] !="") {
																?>
																<li><i class="far fa-calendar-alt" aria-hidden="true"></i><?php echo $row['year']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['engine'] !="") {
																?>
																<li><i class="fas fa-cogs" aria-hidden="true"></i><?php echo $row['engine']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['type'] !="") {
																?>
																<li><i class="fas fa-flag-checkered" aria-hidden="true"></i><?php echo $row['type']; ?></li>  
																<?php
															}
														?>
														<?php
															if ($row['fuel'] !="") {
																?>
																<li><i class="fas fa-gas-pump" aria-hidden="true"></i><?php echo $row['fuel']; ?></li>  
																<?php
															}
														?>
													</ul>
													<div class="box-neo"> 
														<div class="row">
															<div class="col-12 col-lg-6 mb-3"> 
														    	<a href="tel:<?php echo $row2['hotline']; ?>" class="mobile btn-call"><i class="fas fa-phone-volume"></i>Gọi điện</a> 
															</div> 
															<div class="col-12 col-lg-6">
															    <a href="sms:<?php echo $row2['hotline']; ?>" class="btn-bargain "><i class="fas fa-comment"></i>Nhắn tin</a> 
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- products-tab -->
	<!-- home-banner -->
	<section class="home-banner">
		<div class="container">
			<img src="images/3.jpg" alt="">
		</div>
	</section>
	<!-- home-banner -->
	<?php
	$dt->select("SELECT * FROM product_cat");
	$data= array();
	while ($row2=$dt->fetch()) {
		$data[]=$row2;
	}
	foreach ($data as $key => $value) {
		$cat= $value['name'];
		$dt->select("SELECT * FROM product WHERE category='$cat' ORDER BY id desc limit 0,8");
		if ($value['count'] !='0') {
		?>
		<!-- home-hangxe -->
		<section class="home-hangxe list-item-car">
			<div class="container">
				<h2 class="heading text-center">GIÁ <?php echo $cat; ?> THÁNG  <?php echo date('m/Y'); ?></h2>
				<div class="row">
					<?php
					while ($row=$dt->fetch()) {
						?>
							<div class="col-lg-3 col-md-6 col-12 mb-3">
								<div class="item vip box-list-car-item">
									<div class="photo">
										<div class="ribbon ribbon-top-right">
											<span><i class="fas fa-star"></i> <?php echo $row['status']; ?></span>
										</div>
										<a href="?view=single-product&id=<?php echo $row['id']; ?>">
											<img src="admin/tpl/product/uploads/<?php echo $row['thumbnail']; ?>" alt="">
										</a>
									</div>
									<div class="info">
										<h3 class="title"> <a href="?view=single-product&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a> </h3>
										<p class="price">
											<?php
												if ($row['discount'] !="") {
													?>
													<span class="regular"><?php echo $row['price']; ?></span><br>
													<span class="sale"><?php echo $row['discount']; ?></span>
													<?php
												}else {
													echo $row['price'];
												}
											?>
										</p>
										<ul class="list">  
											<?php
												if ($row['year'] !="") {
													?>
													<li><i class="far fa-calendar-alt" aria-hidden="true"></i><?php echo $row['year']; ?></li>  
													<?php
												}
											?>
											<?php
												if ($row['engine'] !="") {
													?>
													<li><i class="fas fa-cogs" aria-hidden="true"></i><?php echo $row['engine']; ?></li>  
													<?php
												}
											?>
											<?php
												if ($row['type'] !="") {
													?>
													<li><i class="fas fa-flag-checkered" aria-hidden="true"></i><?php echo $row['type']; ?></li>  
													<?php
												}
											?>
											<?php
												if ($row['fuel'] !="") {
													?>
													<li><i class="fas fa-gas-pump" aria-hidden="true"></i><?php echo $row['fuel']; ?></li>  
													<?php
												}
											?>
										</ul>
										<div class="box-neo"> 
											<div class="row">
												<div class="col-12 col-lg-6 mb-3"> 
											    	<a href="tel:<?php echo $row2['hotline']; ?>" class="mobile btn-call"><i class="fas fa-phone-volume"></i>Gọi điện</a> 
												</div> 
												<div class="col-12 col-lg-6">
												    <a href="sms:<?php echo $row2['hotline']; ?>" class="btn-bargain "><i class="fas fa-comment"></i>Nhắn tin</a> 
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>
		<!-- home-hangxe -->
		<?php
		}
		}
	?>
	<!-- homepage-box-video -->
	<section class="homepage-video">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12 mb-3 mb-lg-0">
					<?php
						$dt->select("SELECT * FROM info");
						$row2=$dt->fetch();
						echo $row2['video'];
					?>
				</div>
				<div class="col-lg-6 col-12">
					<?php
						echo $row2['video_2'];
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- homepage-box-video -->
	<!-- product-feature -->
	<section class="product-feature list-item-car">
		<div class="container">
			<h2 class="heading">Xe mới đăng</h2>
			<div class="product-feature_slide">
				<?php
					$dt->select("SELECT * FROM product ORDER BY id desc LIMIT 0,8");
					while ($row=$dt->fetch()) {
						?>
						<div class="item vip box-list-car-item">
							<div class="photo">
								<div class="ribbon ribbon-top-right">
									<span><i class="fas fa-star"></i> <?php echo $row['status']; ?></span>
								</div>
								<a href="?view=single-product&id=<?php echo $row['id']; ?>">
									<img src="admin/tpl/product/uploads/<?php echo $row['thumbnail']; ?>" alt="">
								</a>
							</div>
							<div class="info">
								<h3 class="title"> <a href="?view=single-product&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a> </h3>
								<p class="price">
									<?php
										if ($row['discount'] !="") {
											?>
											<span class="regular"><?php echo $row['price']; ?></span><br>
											<span class="sale"><?php echo $row['discount']; ?></span>
											<?php
										}else {
											echo $row['price'];
										}
									?>
								</p>
								<ul class="list">  
									<?php
										if ($row['year'] !="") {
											?>
											<li><i class="far fa-calendar-alt" aria-hidden="true"></i><?php echo $row['year']; ?></li>  
											<?php
										}
									?>
									<?php
										if ($row['engine'] !="") {
											?>
											<li><i class="fas fa-cogs" aria-hidden="true"></i><?php echo $row['engine']; ?></li>  
											<?php
										}
									?>
									<?php
										if ($row['type'] !="") {
											?>
											<li><i class="fas fa-flag-checkered" aria-hidden="true"></i><?php echo $row['type']; ?></li>  
											<?php
										}
									?>
									<?php
										if ($row['fuel'] !="") {
											?>
											<li><i class="fas fa-gas-pump" aria-hidden="true"></i><?php echo $row['fuel']; ?></li>  
											<?php
										}
									?>
								</ul>
								<div class="box-neo"> 
									<div class="row">
										<div class="col-12 col-lg-6 mb-3"> 
									    	<a href="tel:<?php echo $row2['hotline']; ?>" class="mobile btn-call"><i class="fas fa-phone-volume"></i>Gọi điện</a> 
										</div> 
										<div class="col-12 col-lg-6">
										    <a href="sms:<?php echo $row2['hotline']; ?>" class="btn-bargain "><i class="fas fa-comment"></i>Nhắn tin</a> 
										</div> 
									</div>
								</div>
							</div>
						</div>
					<?php
					}
				?>
			</div>
		</div>
	</section>
	<!-- product-feature -->
	<!-- post-news -->
	<section class="post-news">
		<div class="container">
			<h2>Tin tức xe</h2>
			<div class="row">
				<div class="col-lg-7 col-md-7 col-12 mb-3 mb-lg-0">
					<?php
						$dt->select("SELECT * FROM post ORDER BY id desc LIMIT 0,1");
						while ($row=$dt->fetch()) {
							?>
							<div class="post-news_item mb-0 pb-0">
								<div class="post-news_img">
									<a href="?view=single&id=<?php echo $row['id']; ?>">
									    <img src="admin/tpl/post/uploads/<?php echo $row['thumbnail']; ?>" alt="">
									</a>
							    </div>
							    <div class="post-news_text">
							    	<h3 class="mt-2 mb-2"><a href="?view=single&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h3>
							    	<?php echo $row['description']; ?>
							    </div>
							</div>
						<?php
						}
					?>
				</div>
				<div class="col-lg-5 col-md-5 col-12 post-right">
					<?php
						$dt->select("SELECT * FROM post ORDER BY id desc LIMIT 0,6");
						$i=0;
						while ($row=$dt->fetch()) {
							$i++;
							if ($i !='1') {
								?>
								<div class="post-news_item">
								    <div class="post-news_text">
								    	<h3><a href="?view=single&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h3>
								    	<div class="post-date"><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo $row['created']; ?></div>
								    </div>
								</div>
							<?php
							}
						}
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- post-news -->
</div>
<!-- content -->