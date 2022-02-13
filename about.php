<!-- trang giới thiệu -->
<?php
	include_once("config.php");
	$dt=new database();
	$dt->select("SELECT * FROM about");
	$row=$dt->fetch();
?>
<div id="content" class="mt-4 mb-4">
	<div class="container">
		<h3 class="page-heading">Giới thiệu</h3>
		<div class="singular-post-content ">
			<?php echo $row['content']; ?>
		</div>
	</div>
</div>