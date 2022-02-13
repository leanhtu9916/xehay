<style type="text/css">
   #cke_1_contents {
      height: 1000px !important;
   }
</style>
<?php
include_once("config.php");
$dt = new database();
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$dt->select("SELECT * FROM product,engine,type,fuel,product_cat WHERE product.engine=engine.id AND product.fuel=fuel.id AND product.type=type.id AND product.category=product_cat.id AND product_id='$id' ");
$row2 = $dt->fetch();
?>
<form action="tpl/product/action.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
      <?php
      $success = isset($_GET['success']) ? $_GET['success'] : '';
      if ($success == 1) {
      ?>
         <tr>
            <td colspan="2">
               <div class="alert alert-danger">
                  Sửa thành công
               </div>
            </td>
         </tr>
      <?php
      }
      ?>
      <tr>
         <td>Tên Sản Phẩm</td>
         <td><input type="text" id="name" name="name" value="<?php echo $row2['name']; ?>" class="form-control"></td>
      </tr>
      <tr>
         <td>Giá</td>
         <td><input type="text" name="price" value="<?php echo $row2['price']; ?>" class="form-control"></td>
      </tr>
      <tr>
         <td>Giá KM</td>
         <td><input type="text" name="discount" value="<?php echo $row2['discount']; ?>" class="form-control"></td>
      </tr>
      <tr>
         <td>Ảnh đại diện</td>
         <td><input type="file" name="thumbnail" class="form-control"></td>
      </tr>
      <tr>
         <td>Năm sản xuất</td>
         <td><input type="text" name="year" value="<?php echo $row2['year']; ?>" class="form-control"></td>
      </tr>
      <tr>
         <td>Động cơ</td>
         <td><select name="engine" id="" class="form-control">
               <option value="<?php echo $row2['engine'] ?>" selected><?php echo $row2['name_engine'] ?></option>
               <?php
               $dt->select('SELECT * FROM engine');
               while ($row = $dt->fetch()) {
                  if ($row['id'] != $row2['engine']) {

               ?>
                     <option value="<?php echo $row['id']; ?>"><?php echo $row['name_engine'] ?></option>
               <?php
                  }
               }
               ?>
            </select></td>
      </tr>
      <tr>
         <td>Loại xe</td>
         <td>
            <select name="type" id="" class="form-control">
               <option value="<?php echo $row2['type'] ?>" selected><?php echo $row2['name_type'] ?></option>
               <?php
               $dt->select('SELECT * FROM type');
               while ($row = $dt->fetch()) {
                  if ($row['id'] != $row2['type']) {

               ?>
                     <option value="<?php echo $row['id']; ?>"><?php echo $row['name_type'] ?></option>
               <?php
                  }
               }
               ?>
            </select>
         </td>
      </tr>
      <tr>
         <td>Nhiên liệu</td>
         <td><select name="fuel" id="" class="form-control">
               <option value="<?php echo $row2['fuel'] ?>" selected><?php echo $row2['name_fuel'] ?></option>
               <?php
               $dt->select('SELECT * FROM fuel');
               while ($row = $dt->fetch()) {
                  if ($row['id'] != $row2['fuel']) {

               ?>
                     <option value="<?php echo $row['id']; ?>"><?php echo $row['name_fuel'] ?></option>
               <?php
                  }
               }
               ?>
            </select></td>
      </tr>
      <tr>
         <td>Dòng xe</td>
         <td><select name="category" id="" style="width: 100%;padding: 10px;" >
         <option value="<?php echo $row2['category'] ?>" selected><?php echo $row2['name_dongxe'] ?></option>
               <?php
               $dt->select('SELECT * FROM product_cat');
               while ($row = $dt->fetch()) {
                  if ($row['id'] != $row2['category']) {
               ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name_dongxe'] ?></option>
               <?php
                  }
               }
               ?>
            </select></td>
      </tr>
      <tr>
         <td>Status</td>
         <td>
            <select style="width: 100%;padding: 10px;" name="status">
               <option selected><?php echo $row2['status'] ?></option>
               <?php
               if ($row2['status'] == 'Xe mới') {
               ?>
                  <option>Xe cũ</option>
               <?php
               } else {
               ?>
                  <option>Xe mới</option>
               <?php
               }
               ?>
               ?>
            </select>

         </td>
      </tr>
      <tr>
      <td>Nổi bật</td>
         <td><input type="checkbox" 
         <?php if ($row2['feature'] == '1') {
         echo "checked";
         } ?> value='1' name="feature"></td>
      </tr>
      <tr>
         <td>Tổng quan</td>
         <td><textarea style="width: 100%;" name="tong_quan" id="tong_quan"><?php echo $row2['tong_quan']; ?></textarea></td>
      </tr>
      <tr>
         <td>Ngoại thất</td>
         <td><textarea style="width: 100%;" name="ngoai_that" id="ngoai_that"><?php echo $row2['ngoai_that']; ?></textarea></td>
      </tr>
      <tr>
         <td>Nội thất</td>
         <td><textarea style="width: 100%;" name="noi_that" id="noi_that"><?php echo $row2['noi_that']; ?></textarea></td>
      </tr>
      <tr>
         <td>Vận hành</td>
         <td><textarea style="width: 100%;" name="van_hanh" id="van_hanh"><?php echo $row2['van_hanh']; ?></textarea></td>
      </tr>
      <tr>
         <td>An toàn</td>
         <td><textarea style="width: 100%;" name="an_toan" id="an_toan"><?php echo $row2['an_toan']; ?></textarea></td>
      </tr>
      <tr>
         <td>Tiện ích</td>
         <td><textarea style="width: 100%;" name="tien_ich" id="tien_ich"><?php echo $row2['tien_ich']; ?></textarea></td>
      </tr>
      <tr>
         <td>Thông số kỹ thuật</td>
         <td><textarea style="width: 100%;" name="thong_so_ky_thuat" id="thong_so_ky_thuat"><?php echo $row2['thong_so_ky_thuat']; ?></textarea></td>
      </tr>
      <tr>
         <td>khung gầm</td>
         <td><textarea style="width: 100%;" name="khung_gam" id="khung_gam"><?php echo $row2['khung_gam']; ?></textarea></td>
      </tr>
      <tr>
         <td>Thư viện ảnh</td>
         <td><textarea style="width: 100%;" name="thu_vien_anh" id="thu_vien_anh"><?php echo $row2['thu_vien_anh']; ?></textarea></td>
      </tr>
      <tr>
         <td colspan="2"><button style="margin: 0px 350px;" type="submit" name="edit" class="btn btn-primary btn-lg">EDIT</button></td>
      </tr>
   </table>
</form>
<script type="text/javascript">
   CKEDITOR.replace("tong_quan", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("ngoai_that", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("noi_that", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("van_hanh", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("an_toan", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("tien_ich", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("thong_so_ky_thuat", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("khung_gam", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
   CKEDITOR.replace("thu_vien_anh", {
      filebrowserBrowseUrl: 'tpl/product/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: 'tpl/product/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'tpl/product/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
   });
</script>                                                                                                                                                                                                               