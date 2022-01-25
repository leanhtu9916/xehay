	
<form action="tpl/engine/action.php" method="post" enctype="multipart/form-data">
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
        <td>Dòng xe</td>
        <td><input type="text" id="add" name="name" required="required" value=""  class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add" class="btn btn-primary btn-lg" >THÊM</button></td>
     </tr>
  </table>
</form>