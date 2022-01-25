<?php
	include_once("config.php");
	$category="";
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$pag=isset($_GET['pag'])?$_GET['pag']:1;
    if ($pag==1 || $pag==0) {
        $pag=0;
    }
    else{
        $pag=$pag*12-12;
    }
	if ($id !="") {
		$dt->select("SELECT * FROM category WHERE id='$id'");
		$row=$dt->fetch();
		$category = $row['name'];
		$dt->select("SELECT * FROM post WHERE category='$category' ORDER BY id desc LIMIT $pag,12");
	}else {
		$dt->select("SELECT * FROM post ORDER BY id desc LIMIT $pag,12");
	}
?>
<div id="content" class="mt-4 mb-4">
	<div class="container">
		<h3 class="page-heading">
			<?php
				if ($category!="") {
					echo $category;
				}else {
					echo "Tin tức";
				}
			?>
		</h3>
		<div class="singular-post-content ">
			<div class="row">
				<?php
					while ($row=$dt->fetch()) {
						?>
						<article class="article category-post-article col-lg-4 col-md-6 col-12 mb-3">
							<a href="?view=single&id=<?php echo $row['id']; ?>" class="post-thumbnail thumbnail-hover-scale thumbnail-bordered">
								<img src="admin/tpl/post/uploads/<?php echo $row['thumbnail']; ?>" alt="">
							</a>	
							<h3 class="post-title">
								<a href="?view=single&id=<?php echo $row['id']; ?>">
									<?php echo $row['name']; ?>
								</a>
							</h3>
							<div class="post-excerpt hidden-xs">
								<?php echo $row['description']; ?>
							</div>
							
						</article>
					<?php
					}
				?>
			</div>	
			<div class="pagination">
			<?php
					if ($id !="") {
						$dt->select("SELECT * FROM category WHERE id='$id' ORDER BY id desc LIMIT $pag,12");
						$row=$dt->fetch();
						$category = $row['name'];
						$dt->select("SELECT * FROM post WHERE category='$category' ORDER BY id desc LIMIT $pag,12");
						$count=$dt->num_rows();
					}else {
						$dt->select("SELECT * FROM post");
						$count=$dt->num_rows();
					}
		            $pag2=ceil($count/12);
		            $pag_ac=isset($_GET['pag'])?$_GET['pag']:1;
		            for ($i=1; $i <=$pag2 ; $i++) { 
		            	if ($id !="") {
		            		?>
		            		<li><a class="<?php if($i == $pag_ac){ echo 'active-pag';} ?>" href="?view=category&id=<?php echo $id; ?>&pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		            		<?php
		            	}else {
		               ?>
		               <li><a class="<?php if($i == $pag_ac){ echo 'active-pag';} ?>" href="?view=category&pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		               <?php
		          		}
			        }
		         ?>
			</div>
		</div>
	</div>
</div>