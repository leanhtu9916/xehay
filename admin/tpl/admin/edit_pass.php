
<?php
  include_once("config.php");
  $dt=new database();
  $id=isset($_GET["id"])?$_GET["id"]:"";
?>
<form action="tpl/admin/action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
     <?php
         $success=isset($_GET['success'])?$_GET['success']:'';
         if ($success==1) {
            ?>
              <tr>
         <td colspan="2"><div class="alert alert-danger">
           Thay đổi mật khẩu thành công
         </div></td>
      </tr>
            <?php
         }elseif ($success==0 && $success!='') {
             ?>
              <tr>
         <td colspan="2"><div class="alert alert-danger">
            Mật khẩu cũ không chính xác
         </div></td>
      </tr>
            <?php
         }
      ?>
        <tr>
        <td>Mật khẩu cũ</td>
        <td><input type="password" name="pass_old" required="required"></td>
     </tr>
      <tr>
        <td>Mật khẩu mới</td>
        <td><input type="password" name="pass" required="required"></td>
     </tr>
 <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >LƯU</button></td>
     </tr>
  </table>
</form>