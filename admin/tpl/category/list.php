<?php
if (isset($_GET['done'])) {
	if ($_GET['done'] == 1) { ?>
		<div class="alert alert-danger" style="text-align: center;">
			Xóa thành công 
		</div>
	<?php
	} else { ?>
		<div class="jconfirm jconfirm-light jconfirm-open">
			<div class="jconfirm-bg" style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1);"></div>
			<div class="jconfirm-scrollpane">
				<div class="jconfirm-row">
					<div class="jconfirm-cell">
						<div class="jconfirm-holder" style="padding-top: 40px; padding-bottom: 40px;">
							<div class="jc-bs3-container container">
								<div class="jc-bs3-row row justify-content-md-center justify-content-sm-center justify-content-xs-center justify-content-lg-center">
									<div class="jconfirm-box-container jconfirm-animated col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 jconfirm-no-transition" style="transform: translate(0px, 0px); transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1);">
										<div class="jconfirm-box jconfirm-hilight-shake jconfirm-type-default jconfirm-type-animated" role="dialog" aria-labelledby="jconfirm-box721" tabindex="-1" style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1); transition-property: all, margin;">
											<div class="jconfirm-closeIcon" style="display: none;">×</div>
											<div class="jconfirm-title-c"><span class="jconfirm-icon-c"></span><span class="jconfirm-title"><i style="font-size: 40px;position: absolute;top: 20px;left: 50%;transform: translateX(-50%);color:#f00;" class="fas fa-exclamation-circle"></i></span></div>
											<div class="jconfirm-content-pane no-scroll" style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1); height: 111.562px; max-height: 260.543px;">
												<div class="jconfirm-content" id="jconfirm-box721">
													<div>
														<div style="padding-top:30px;" class="text-center">
															<h3>KHÔNG THỂ XÓA!!!</h3>
															<p>Lưu ý: đã có bài viết thuộc chuyên mục</p>
														</div>
													</div>
												</div>
											</div>
											<div class="jconfirm-buttons"><a href="http://localhost/xehay/admin/index.php?view=category&action=list" style="background-color:#c0392b; padding: 10px;color:#fff;">OK</a></div>
											<div class="jconfirm-clear"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}
}
?>
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
		$dt = new database();
		$stt = 0;
		$dt->select("SELECT* FROM category");
		while ($row = $dt->fetch()) {
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