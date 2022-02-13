<style type="text/css">
  #cke_1_contents {
    height: 1000px !important;
  }
</style>
<?php
  include_once("config.php");
  $dt=new database();
  $id=isset($_GET["id"])?$_GET["id"]:"";
   $dt->select("SELECT * FROM post WHERE id='$id' ");
   $row2=$dt->fetch();
?>
<form action="tpl/post/action.php?id=<?php echo $row2['id'] ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
       <?php
         $success=isset($_GET['success'])?$_GET['success']:'';
         if ($success==1) {
            ?>
              <tr>
         <td colspan="2"><div class="alert alert-danger">
            Sửa thành công
         </div></td>
      </tr>
            <?php
         }
      ?>
    <tr>
        <td>Tiêu đề</td>
        <td><input type="text" name="name" value="<?php echo $row2['name']; ?>" class="form-control" ></td>
     </tr>
      <tr>
        <td>Ảnh đại diện</td>
        <td><input type="file" name="thumbnail" class="form-control" ></td>
     </tr>

     <tr>
        <td>Chuyên mục</td>
        <td>
        <select name="category" id=""  class="form-control">
                 <option selected><?php echo $row2['category'] ?></option>
                <?php
                $dt->select('SELECT * FROM category');
                while ($row=$dt->fetch()) {
                    if ($row['name'] != $row2['category']) {
                     
                  ?>
                  <option><?php echo $row['name'] ?></option>
                  <?php
                 }
                }
              ?>
            </select>
        </td>
     </tr>
       <tr>
        <td>Mô tả ngắn</td>
        <td><textarea style="width: 100%;"  name="description" id="description"><?php echo $row2['description']; ?></textarea></td>
     </tr>
     <tr>
        <td>Nội dung</td>
        <td><textarea style="width: 100%;"  name="content" id="content"><?php echo $row2['content']; ?></textarea></td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >LƯU</button></td>
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
