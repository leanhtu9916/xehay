
<table class="table table-striped" width="100%" border="1px">
			<tr>
				<th>id</th>
				<th>Bài viết</th>
				<th>Ảnh đại diện</th>
				<th>Chuyên mục</th>
				<th>action</th>
			</tr>
			<?php
			include_once("config.php");
			$dt=new database();
			$pag=isset($_GET["pag"])?$_GET["pag"]:"";
						if ($pag<1 || $pag==1) {
							$pag=0;
						}else{
							$pag=$pag*10-10;
						}
			$stt=0;
			$dt->select("SELECT* FROM post ORDER BY id desc limit $pag,10 ");
			while ($row=$dt->fetch()) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><a href="?view=post&action=edit&id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
					<td><img style="width: 100px;height: 100px;" src="tpl/post/uploads/<?php echo $row['thumbnail'] ?>"></td>
					<td><?php echo $row['category'] ?></td>
					<td>
						<a class="delete" href="tpl/post/action.php?id=<?php echo $row['id'] ?>" class="navbar-link"><i style="color: red" class="fas fa-minus-circle"></i></a>
					</td>
				</tr>
				<?php
			}
			?>
	
	</table>
	<div style="background: none" class="card-footer clearfix container">
		<div class="row">
			<ul class="pagination pagination-sm m-0 float-right">
				<?php
				if (isset($_GET['pag']) && $_GET['pag'] > 1) {
					$prev=$_GET['pag']-1;
					echo "<li  class='page-item'><a class='page-link' href='index.php?view=post&action=list&pag=".$prev."'>&laquo;</a></li>";
				}
				?>

				<?php
					$dt->select("SELECT* FROM post");
					$count=$dt->num_rows();
					$total_pag=ceil($count/10);
					for ($i=1; $i <=$total_pag ; $i++) { 
							if (isset($_GET['pag']) && $_GET['pag']==$i) {
								$active='active';
							}else{
								$active='';
							}
						echo "<li class='page-item ".$active."'><a class='page-link' href='index.php?view=post&action=list&pag=$i'> $i </a></li>";
					
					}
				?>
			<?php
				if ( isset($_GET['pag']) && $_GET['pag'] < $total_pag) {
					$next=$_GET['pag']+1;
					echo "<li  class='page-item'><a class='page-link' href='index.php?view=post&action=list&pag=".$next."'>&raquo;</a></li>";
				}
				?>

			</ul>
		</div>
	</div>