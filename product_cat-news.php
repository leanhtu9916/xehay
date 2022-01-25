<?php
	include_once("config.php");
	$dt=new database();
	$category = "";
	$dt->select("SELECT * FROM social");
	$row2=$dt->fetch();
	$id=isset($_GET["cat"])?$_GET["cat"]:"";
	$pag=isset($_GET['pag'])?$_GET['pag']:1;
    if ($pag==1 || $pag==0) {
        $pag=0;
    }
    else{
        $pag=$pag*12-12;
    }
	if ($id !="") {
		$dt->select("SELECT * FROM product_cat WHERE id='$id' ");
		$row=$dt->fetch();
		$category = $row['name'];
		$dt->select("SELECT * FROM product WHERE category='$category' AND status='Xe mới' ORDER BY id desc LIMIT $pag,12");
	}else {
		$dt->select("SELECT * FROM product WHERE status='Xe mới' ORDER BY id desc LIMIT $pag,12");
	}
?>

<div id="content" class="mt-4 mb-4">
	<div class="container">
		<h3 class="page-heading">
			<?php
				if ($category!="") {
					echo $category;
				}else {
					echo "Xe mới";
				}
			?>
		</h3>
		<div class="singular-post-content list-item-car">
			<div class="row">
				<?php
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
			<div class="pagination">
			<?php
					if ($id !="") {
						$dt->select("SELECT * FROM product_cat WHERE id='$id' ORDER BY id desc LIMIT $pag,12");
						$row=$dt->fetch();
						$category = $row['name'];
						$dt->select("SELECT * FROM product WHERE category='$category' AND status='Xe mới'  ORDER BY id desc LIMIT $pag,12");
						$count=$dt->num_rows();
					}else {
						$dt->select("SELECT * FROM product WHERE status='Xe mới' ");
						$count=$dt->num_rows();
					}
		            $pag2=ceil($count/12);
		            $pag_ac=isset($_GET['pag'])?$_GET['pag']:1;
		            for ($i=1; $i <=$pag2 ; $i++) { 
		            	if ($id !="") {
		            		?>
		            		<li><a class="<?php if($i == $pag_ac){ echo 'active-pag';} ?>" href="?view=product_cat&id=<?php echo $id; ?>&pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		            		<?php
		            	}else {
		               ?>
		               <li><a class="<?php if($i == $pag_ac){ echo 'active-pag';} ?>" href="?view=product_cat&pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		               <?php
		          		}
			        }
		         ?>
			</div>
		</div>
	</div>
</div>