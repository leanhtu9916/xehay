<?php
  include_once("config.php");
  $dt=new database();
  $success= isset($_GET['success'])?$_GET['success']:"";
?>
<form action="tpl/product/action.php" method="post" enctype="multipart/form-data">
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
        <td>Tên Sản Phẩm</td>
        <td><input type="text" name="name"  class="form-control" required="required" id="name"></td>
     </tr>
      <tr>
        <td>Giá</td>
        <td><input type="text" name="price"   class="form-control" required="required"></td>
     </tr>
      <tr>
        <td>Giá KM</td>
        <td><input type="text"name="discount"  class="form-control"  ></td>
     </tr>
      <tr>
        <td>Ảnh đại diện</td>
        <td><input type="file" name="thumbnail" class="form-control" required="required" ></td>
     </tr>
      <tr>
        <td>Năm sản xuất</td>
        <td><input type="text" name="year"   class="form-control" required="required"></td>
     </tr>
      <tr>
        <td>Động cơ</td>
        <td><select name="engine" id=""  class="form-control">
              <?php
                $dt->select('SELECT * FROM engine');
                while ($row=$dt->fetch()) {
                  ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name_engine'] ?></option>
                  
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
                   <option value="<?php echo $row['id']; ?>"><?php echo $row['name_type'] ?></option>
                  <?php
                }
              ?>
            </select>
        </td>
     </tr>
      <tr>
        <td>Nhiên liệu</td>
        <td><select name="fuel" id=""  class="form-control">
              <?php
                $dt->select('SELECT * FROM fuel');
                while ($row=$dt->fetch()) {
                  ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name_fuel'] ?></option>
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
              <option value="<?php echo $row['id'] ?>"><?php echo $row['name_dongxe'] ?></option>
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
        <td><textarea style="width: 100%;"  name="tong_quan" id="tong_quan"></textarea></td>
     </tr>
     <tr>
        <td>Ngoại thất</td>
        <td><textarea style="width: 100%;"  name="ngoai_that" id="ngoai_that"></textarea></td>
     </tr>
     <tr>
        <td>Nội thất</td>
        <td><textarea style="width: 100%;"  name="noi_that" id="noi_that"></textarea></td>
     </tr>
     <tr>
        <td>Vận hành</td>
        <td><textarea style="width: 100%;"  name="van_hanh" id="van_hanh"></textarea></td>
     </tr>
     <tr>
        <td>An toàn</td>
        <td><textarea style="width: 100%;"  name="an_toan" id="an_toan"></textarea></td>
     </tr>
     <tr>
        <td>Tiện ích</td>
        <td><textarea style="width: 100%;"  name="tien_ich" id="tien_ich"></textarea></td>
     </tr>
     <tr>
        <td>Thông số kỹ thuật</td>
        <td><textarea style="width: 100%;"  name="thong_so_ky_thuat" id="thong_so_ky_thuat"></textarea></td>
     </tr>
     <tr>
        <td>Khung gầm</td>
        <td><textarea style="width: 100%;"  name="khung_gam" ></textarea></td>
     </tr>
     <tr>
        <td>Thư viện ảnh</td>
        <td><textarea style="width: 100%;"  name="thu_vien_anh" id="thu_vien_anh"></textarea></td>
     </tr>
       
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="add" class="btn btn-primary btn-lg" >THÊM</button></td>
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
