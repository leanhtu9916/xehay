<?php
  include_once("config.php");
  $dt=new database();
  $success= isset($_GET['success'])?$_GET['success']:"";
?>
<form action="tpl/post/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
       <?php
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
        <td>Tiêu đề</td>
        <td><input type="text" name="name"  class="form-control" required="required"></td>
     </tr>
      <tr>
        <td>Ảnh đại diện</td>
        <td><input type="file" name="thumbnail" class="form-control" ></td>
     </tr>

     <tr>
        <td>Chuyên mục</td>
        <td>
            <select name="category" id=""  class="form-control">
                <?php
                    $dt->select('SELECT * FROM category');
                    while ($row=$dt->fetch()) {
                      ?>
                      <option><?php echo $row['name'] ?></option>
                      <?php
                    }
                  ?>
            </select>
        </td>
     </tr>
         <td>Mô tả ngắn</td>
        <td><textarea style="width: 100%;"  name="description" id="description" required="required"></textarea></td>
        
     </tr>
     <tr>
        <td>Nội dung</td>
        <td><textarea style="width: 100%;"  name="content" id="content"></textarea></td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add" class="btn btn-primary btn-lg" >THÊM</button></td>
     </tr>
  </table>
</form>
<script type="text/javascript">
    CKEDITOR.replace("content",{
               filebrowserBrowseUrl : 'tpl/post/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/post/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/post/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/post/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/post/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/post/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
      
</script>
