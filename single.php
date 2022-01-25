<?php
	include_once("config.php");
	$dt=new database();
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$dt->select("SELECT * FROM post WHERE id='$id'");
	$row=$dt->fetch();
?>
<div id="content" class="mt-4 mb-4">
	<div class="container">
		<div class="singular-post-content">
			<h3 class="page-heading">
				<?php echo $row['name']; ?>
			</h3>
			<?php echo $row['content']; ?>
		</div>
	</div>
</div>