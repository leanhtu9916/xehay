<style type="text/css">
  #cke_1_contents {
    height: 1000px !important;
  }
</style>
<?php
  include_once("config.php");
  $dt=new database();
  $id=isset($_GET["id"])?$_GET["id"]:"";
   $dt->select("SELECT * FROM product WHERE id='$id' ");
   $row2=$dt->fetch();
?>
<form action="tpl/product/action.php?id=<?php echo $row2['id'] ?>" method="post" enctype="multipart/form-data">
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
        <td>Tên Sản Phẩm</td>
        <td><input type="text" name="name" value="<?php echo $row2['name']; ?>" class="form-control" ></td>
     </tr>
      <tr>
        <td>Giá</td>
        <td><input type="text" name="price" value="<?php echo $row2['price']; ?>"  class="form-control" ></td>
     </tr>
      <tr>
        <td>Giá KM</td>
        <td><input type="text" name="discount" value="<?php echo $row2['discount']; ?>" class="form-control" ></td>
     </tr>
      <tr>
        <td>Ảnh đại diện</td>
        <td><input type="file" name="thumbnail" <?php echo $row2['thumbnail']; ?> class="form-control" ></td>
     </tr>
      <tr>
        <td>Năm sản xuất</td>
        <td><input type="text" name="year" value="<?php echo $row2['year']; ?>"  class="form-control" ></td>
     </tr>
      <tr>
        <td>Động cơ</td>
        <td><select name="engine" id="" class="form-control">
             <?php
            $dt->select('SELECT * FROM engine');
            while ($row=$dt->fetch()) {
              ?>
              <option><?php echo $row['name'] ?></option>
              <?php
            }
          ?>
        </select></td>
     </tr>
      <tr>
        <td>Loại xe</td>
        <td>
            <select name="type" id=""  class="form-control">
                 <?php
            $dt->select('SELECT * FROM type');
            while ($row=$dt->fetch()) {
              ?>
              <option><?php echo $row['name'] ?></option>
              <?php
            }
          ?>
            </select>
        </td>
     </tr>
      <tr>
        <td>Nhiên liệu</td>
        <td><select name="fuel" id="" class="form-control">
             <?php
            $dt->select('SELECT * FROM fuel');
            while ($row=$dt->fetch()) {
              ?>
              <option><?php echo $row['name'] ?></option>
              <?php
            }
          ?>
        </select></td>
     </tr>
     <tr>
        <td>Dòng xe</td>
        <td><select style="width: 100%;padding: 10px;" name="category">
          <?php
            $dt->select('SELECT * FROM product_cat');
            while ($row=$dt->fetch()) {
              ?>
              <option><?php echo $row['name'] ?></option>
              <?php
            }
          ?>
       </select></td>
     </tr>
       <tr>
        <td>Status</td>
        <td>
          <select style="width: 100%;padding: 10px;" name="status">
              <option>Xe mới</option>
              <option>Xe cũ</option>
          ?>
       </select>

        </td>
     </tr>
     <tr>
         <td>Nổi bật</td>
         <td><input type="checkbox" value='1' name="feature"></td>
     </tr>
     <tr>
        <td>Tổng quan</td>
        <td><textarea style="width: 100%;"  name="tong_quan" id="tong_quan"><?php echo $row2['tong_quan']; ?></textarea></td>
     </tr>
     <tr>
        <td>Ngoại thất</td>
        <td><textarea style="width: 100%;"  name="ngoai_that" id="ngoai_that"><?php echo $row2['ngoai_that']; ?></textarea></td>
     </tr>
     <tr>
        <td>Nội thất</td>
        <td><textarea style="width: 100%;"  name="noi_that" id="noi_that"><?php echo $row2['noi_that']; ?></textarea></td>
     </tr>
     <tr>
        <td>Vận hành</td>
        <td><textarea style="width: 100%;"  name="van_hanh" id="van_hanh"><?php echo $row2['van_hanh']; ?></textarea></td>
     </tr>
     <tr>
        <td>An toàn</td>
        <td><textarea style="width: 100%;"  name="an_toan" id="an_toan"><?php echo $row2['an_toan']; ?></textarea></td>
     </tr>
     <tr>
        <td>Tiện ích</td>
        <td><textarea style="width: 100%;"  name="tien_ich" id="tien_ich"><?php echo $row2['tien_ich']; ?></textarea></td>
     </tr>
     <tr>
        <td>Thông số kỹ thuật</td>
        <td><textarea style="width: 100%;"  name="thong_so_ky_thuat" id="thong_so_ky_thuat"><?php echo $row2['thong_so_ky_thuat']; ?></textarea></td>
     </tr>
     <tr>
        <td>Khung gầm</td>
        <td><textarea style="width: 100%;"  name="khung_gam" id="khung_gam"><?php echo $row2['khung_gam']; ?></textarea></td>
     </tr>
     <tr>
        <td>Thư viện ảnh</td>
        <td><textarea style="width: 100%;"  name="thu_vien_anh" id="thu_vien_anh"><?php echo $row2['thu_vien_anh']; ?></textarea></td>
     </tr>
     
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >LƯU</button></td>
     </tr>
  </table>
</form>
<script type="text/javascript">
    CKEDITOR.replace("tong_quan",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("ngoai_that",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("noi_that",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("van_hanh",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("an_toan",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("tien_ich",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("thong_so_ky_thuat",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("khung_gam",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       CKEDITOR.replace("thu_vien_anh",{
               filebrowserBrowseUrl : 'tpl/product/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/product/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
       
</script>
