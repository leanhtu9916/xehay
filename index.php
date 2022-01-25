<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Xecung - Đồ án tốt nghiệp</title>
	<link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="libs/fontawesome5/css/all.css">
	<link rel="stylesheet" type="text/css" href="libs/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsize.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="libs/slick/slick.js"></script>
	<script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="site-wrap">
	<?php include_once('header.php') ?>
	<?php
		$view = isset($_GET['view'])?$_GET['view']:'';
		$status = isset($_GET['status'])?$_GET['status']:'';
		if ($view == '') {
			include_once('home.php');
		}elseif($view == 'about') {
			include_once('about.php');
		}elseif($view == 'contact') {
			include_once('contact.php');
		}elseif($view == 'category') {
			include_once('category.php');
		}elseif($view == 'product_cat' && $status == 'news') {
			include_once('product_cat-news.php');
		}elseif($view == 'product_cat' && $status == 'old') {
			include_once('product_cat-old.php');
		}elseif ($view == 'search') {
	      include_once("search.php");
	    }elseif ($view == 'single-product') {
	      include_once("single-product.php");
	    }elseif ($view == 'single') {
	      include_once("single.php");
	    }
		
	?>
	<?php include_once('footer.php') ?>
</div>
</body>
</html>