 <?php
 @ob_start();
 session_start();
 include_once('config.php');
 if (!isset($_SESSION["loginad"])) {
  exit(header("location: tpl/login.php"));
}
?>
<?php
include_once("config.php");
$dt=new database();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/admin_Index.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <style type="text/css">
    .datepicker-inline {
      display: none !important;
    }
  
  </style>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- <script type="text/javascript" src="tpl/product/ckeditor/ckeditor.js"></script> -->
  <script type="text/javascript" src="tpl/product/ckeditor1/ckeditor.js"></script>
  <script type="text/javascript" src="tpl/product/ckfinder/ckfinder.js"></script>
  <!-- <script type="text/javascript" src="tpl/product/ckfinder/ckfinder.js"></script> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
   <?php
   $dt->select("SELECT COUNT(*) as total_contact FROM contact_form WHERE status='Mới' ");
   $row3=$dt->fetch();
   $dt->select("SELECT COUNT(*) as total_lienhe FROM lienhe WHERE status='Mới' ");
   $row2=$dt->fetch();
   $total=$row2['total_lienhe'] + $row3['total_contact'];
   ?>
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="tpl/logout.php" class="nav-link">Đăng xuất</a>
      </li>
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3" method="post" action="index.php?pag=1" >
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" required="required" name="search_text" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit" name="search">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-comments"></i>
         <span class="badge badge-danger navbar-badge"><?php echo $total; ?></span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="index.php?view=yclh&action=list" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">

            <div class="media-body">
              <h3 class="dropdown-item-title">
                Yêu cầu liên hệ
                <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">Có <?php echo $row2['total_lienhe'] ?> liên hệ</p>
              
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="index.php?view=feedback&action=list" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">

            <div class="media-body">
              <h3 class="dropdown-item-title">
               Liên hệ
               <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
             </h3>
             <p class="text-sm">Có <?php echo $row3['total_contact'] ?> Liên hệ mới</p>

           </div>
         </div>
         <!-- Message End -->
       </a>
     </ul>





     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
          class="fa fa-th-large"></i></a>

        </li>

        <div class="dropdown-divider"></div>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="../images/xe8.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">MAZDA</span>
      </a>
      <?php
      $dt->select("SELECT* FROM admin");
      $row=$dt->fetch();
      ?>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="tpl/admin/uploads/<?php echo $row['thumbnail'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="index.php?view=admin&action=list" class="d-block"><?php echo $row['name'] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="nav-icon fa fa-th"></i>
             <p>
              Dòng xe
               <i class="right fa fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?view=product_cat&action=list" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Danh Sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?view=product_cat&action=add" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Thêm</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Sản Phẩm
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=product&action=list&pag=1" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=product&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Động cơ
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=engine&action=list" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=engine&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Nhiên liệu
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=fuel&action=list" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=fuel&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Loại xe
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=type&action=list" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=type&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Chuyên mục
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=category&action=list&pag=1" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=category&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Bài viết
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=post&action=list&pag=1" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=post&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
         <i class="nav-icon fa fa-th"></i>
         <p>
          Quản lý trang website
           <i class="right fa fa-angle-left"></i>
         </p>
       </a>
       <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="index.php?view=slide" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Sửa slide</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="index.php?view=info" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa thông tin website</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="index.php?view=social" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa social</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="index.php?view=gioithieu" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa trang giới thiệu</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="index.php?view=lienhe" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa trang liên hệ</p>
        </a>
      </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
        Thông tin website
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=info" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav> -->
<!-- <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
        social link
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=social" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav> -->
<!-- <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
         Trang Giới thiệu
         <i class="right fa fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=gioithieu" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav> -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
         Quản lý yêu cầu
         <i class="right fa fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
      <!-- <li class="nav-item">
        <a href="index.php?view=lienhe" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Sửa</p>
        </a>
      </li> -->
      <li class="nav-item">
        <a href="index.php?view=yclh&action=list" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Yêu cầu liên hệ</p>
        </a>
      </li>
       <li class="nav-item">
        <a href="index.php?view=feedback&action=list" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Phản hồi</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<!-- <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="" class="nav-link">
       <i class="nav-icon fa fa-th"></i>
       <p>
        Yêu cầu liên hệ
        <i class="right fa fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="index.php?view=yclh&action=list" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>list</p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav> -->
 <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
           <i class="nav-icon fa fa-th"></i>
           <p>
             Status
             <i class="right fa fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?view=status&action=list" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Danh Sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?view=status&action=add" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Thêm</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <section class="content">
  <div class="container-fluid">
    <?php
    $view=isset($_GET['view'])?$_GET['view']:'';
    $action= isset($_GET['action'])?$_GET['action']:'';
    if ($view=='product_cat' && $action=='list') {
      include_once('tpl/product_cat/list.php');
    }elseif ($view == 'product_cat' && $action=='add') {
      include_once('tpl/product_cat/add.php');
    }elseif ($view == 'product_cat' && $action=='edit') {
      include_once('tpl/product_cat/edit.php');
    }elseif ($view=='category' && $action=='list') {
      include_once('tpl/category/list.php');
    }elseif ($view == 'category' && $action=='add') {
      include_once('tpl/category/add.php');
    }elseif ($view == 'category' && $action=='edit') {
      include_once('tpl/category/edit.php');
    }elseif ($view=='status' && $action=='list') {
      include_once('tpl/status/list.php');
    }elseif ($view == 'status' && $action=='add') {
      include_once('tpl/status/add.php');
    }elseif ($view == 'status' && $action=='edit') {
      include_once('tpl/status/edit.php');
    }elseif ($view=='engine' && $action=='list') {
      include_once('tpl/engine/list.php');
    }elseif ($view == 'engine' && $action=='add') {
      include_once('tpl/engine/add.php');
    }elseif ($view == 'engine' && $action=='edit') {
      include_once('tpl/engine/edit.php');
    }elseif ($view=='fuel' && $action=='list') {
      include_once('tpl/fuel/list.php');
    }elseif ($view == 'fuel' && $action=='add') {
      include_once('tpl/fuel/add.php');
    }elseif ($view == 'fuel' && $action=='edit') {
      include_once('tpl/fuel/edit.php');
    }elseif ($view=='type' && $action=='list') {
      include_once('tpl/type/list.php');
    }elseif ($view == 'type' && $action=='add') {
      include_once('tpl/type/add.php');
    }elseif ($view == 'type' && $action=='edit') {
      include_once('tpl/type/edit.php');
    }elseif ($view=='product' && $action=='list') {
      include_once('tpl/product/list.php');
    }elseif ($view == 'product' && $action=='add') {
      include_once('tpl/product/add.php');
    }elseif ($view == 'product' && $action=='edit') {
      include_once('tpl/product/edit.php');
    }elseif ($view=='post' && $action=='list') {
      include_once('tpl/post/list.php');
    }elseif ($view == 'post' && $action=='add') {
      include_once('tpl/post/add.php');
    }elseif ($view == 'post' && $action=='edit') {
      include_once('tpl/post/edit.php');
    }elseif (isset($_POST["search"]) || $view=="search") {
      include_once("tpl/search.php");
    }elseif ( $view=="slide") {
      include_once("tpl/slide/edit.php");
    }elseif ($view == 'info') {
      include_once('tpl/info/edit.php');
    }elseif ($view == 'social') {
      include_once('tpl/social/edit.php');
    }elseif ($view == 'lienhe' ) {
      include_once('tpl/lienhe/edit.php');
    }elseif ($view == 'gioithieu') {
      include_once('tpl/gioithieu/edit.php');
    }elseif ($view == 'contact' && $action=='list') {
      include_once('tpl/contact/list.php');
    } elseif ($view == 'contact' && $action=='edit') {
      include_once('tpl/contact/edit.php');
    }elseif ($view == 'feedback' && $action=='list') {
      include_once('tpl/contact_form/list.php');
    } elseif ($view == 'feedback' && $action=='edit') {
      include_once('tpl/contact_form/edit.php');
    }elseif ($view == 'yclh' && $action=='list') {
      include_once('tpl/yclh/list.php');
    } elseif ($view == 'yclh' && $action=='edit') {
      include_once('tpl/yclh/edit.php');
    }elseif ($view == 'admin' && $action=='list') {
      include_once('tpl/admin/list.php');
    }elseif ($view == 'admin' && $action =='editpass') {
      include_once('tpl/admin/edit_pass.php');
    }elseif ($view == 'admin' && $action =='name') {
      include_once('tpl/admin/edit_name.php');
    }elseif ($view == 'admin' && $action =='thumbnail') {
      include_once('tpl/admin/edit_thumbnail.php');
    }else{
    ?>
        <div class="row">
      
        <!-- /.col -->
       
        <!-- /.col -->
        
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tống xe mới </span>
              <span class="info-box-number">
                 <?php
                  $dt->select("SELECT * FROM product WHERE status='Xe mới'");
                  $total_sell=0;
                  while ($row5=$dt->fetch()) {
                      $total_sell++;
                    }
                     echo $total_sell;
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tống xe cũ </span>
              <span class="info-box-number">
                <?php
                  $dt->select("SELECT * FROM product WHERE status='Xe cũ'");
                  $total_sell=0;
                  while ($row5=$dt->fetch()) {
                     $total_sell++;
                    }
                     echo $total_sell;
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng Email liên hệ</span>
              <span class="info-box-number"><?php 
               $dt->select("SELECT COUNT(*) as total_contact_all FROM lienhe ");
                $row4=$dt->fetch();
                $dt->select("SELECT COUNT(*) as total_contact_all2 FROM contact ");
                $row3=$dt->fetch();
                 echo $row4['total_contact_all']+$row3['total_contact_all2'];
                 ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div>
    <div class="row">
     <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-body p-0">
          <!-- THE CALENDAR -->
          <div id="calendar"></div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /. box -->

    </div>
    

  <?php
}
?>
</div>
</section>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- jQuery -->


<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Page specific script -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
  $(function () {
    $('#name').on('keypress', function (event) {
    
      var regex = new RegExp("[!@#$%^&*<>]");
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (regex.test(key)) {
        event.preventDefault();
        alert('Không nhập ký tự đặc biệt,vui lòng nhập lại');
        
      }
  });
    /* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },

      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
    $('a.delete').confirm({
    title: '<i style="font-size: 40px;position: absolute;top: 20px;left: 50%;transform: translateX(-50%);color:#f00;" class="fas fa-exclamation-circle"></i>',
    content: '<div style="padding-top:30px;" class="text-center"><h3>Bạn chắc có muốn xóa</h3><p>Lưu ý: sau khi xóa bạn không thể hoàn tác</p></div>',
    buttons: {
        cancel: function () {
        },
        somethingElse: {
            text: 'OK',
            btnClass: 'btn-red',
            keys: ['enter', 'shift'],
            action: function(){
               location.href = this.$target.attr('href');
            }
        }
    }
});

</script>
</script>
</body>
</html>
