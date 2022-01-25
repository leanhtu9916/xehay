<?php
  include_once("config.php");
  $dt=new database();
  $id=isset($_GET["id"])?$_GET["id"]:"";
?>
<form action="tpl/admin/action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
    
      <tr>
        <td>Tên hiển thị mới</td>
        <td><input type="text" id="add" name="name" required="required"></td>
     </tr>
 <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="editname" class="btn btn-primary btn-lg" >LƯU</button></td>
     </tr>
  </table>
</form>