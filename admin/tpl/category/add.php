	
<form action="tpl/category/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
      <?php
         $success=isset($_GET['success'])?$_GET['success']:'';
         if ($success==1) {
            ?>
              <tr>
         <td colspan="2"><div class="alert alert-danger">
            Thêm thành công
         </div></td>
      </tr>
            <?php
         }
      ?>
    
      <tr>
        <td>Chuyên mục</td>
        <td><input type="text" id="name" name="name" required="required" value=""  class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add" class="btn btn-primary btn-lg" >THÊM</button></td>
     </tr>
  </table>
</form>