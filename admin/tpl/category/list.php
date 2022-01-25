<table class="table table-striped" width="100%" border="1px">
		<thead>
			<tr>
				<th>ID</th>
				<th>Chuyên mục</th>
				<th>Số bài viết</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include_once("config.php");
			$dt=new database();
			$stt=0;
			$dt->select("SELECT* FROM category");
			while ($row=$dt->fetch()) {
				?>
				<tr>
					<td><?php echo $row['id'] ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['count'] ?></td>
					<td>
						<a href="index.php?view=category&action=edit&id=<?php echo $row['id'] ?>" class="navbar-link"><i style="color: #444" class="fas fa-pencil-alt"></i></a> || 
						<a class="delete" href="tpl/category/action.php?id=<?php echo $row['id'] ?>" class="navbar-link"><i style="color: red" class="fas fa-minus-circle"></i></a>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>                           