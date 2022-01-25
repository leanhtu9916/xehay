
<?php
  include_once("config.php");
  $dt=new database();
   $dt->select("SELECT * FROM info WHERE id='1'");
   $row2=$dt->fetch();
?>
<form action="tpl/info/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
    <tr>
        <td>logo</td>
        <td><input type="file" name="logo"   class="form-control" ></td>
     </tr>
      <?php
          if ($row2['logo'] !="") {
            ?>
           <tr>
             <td colspan="2"><img class="w-25" src="tpl/info/uploads/<?php echo $row2['logo']; ?>" alt=""></td>
           </tr>
            <?php
          }
        ?>
    <tr>
        <td>Banner</td>
        <td><input type="file" class="form-control" name="banner"></td>
     </tr>
      <?php
          if ($row2['banner'] !="") {
            ?>
           <tr>
             <td colspan="2"><img class="w-25" src="tpl/info/uploads/<?php echo $row2['banner']; ?>" alt=""></td>
           </tr>
            <?php
          }
        ?>
         <tr>
        <td>Video</td>
        <td><textarea name="video" style="width: 100%;height: 200px;"><?php echo $row2['video'] ?></textarea></td>
      </tr>
       <tr>
        <td>Video 2</td>
        <td><textarea name="video_2" style="width: 100%;height: 200px;"><?php echo $row2['video_2'] ?></textarea></td>
      </tr>
      <tr>
        <td>Thông tin liên hệ</td>
        <td><textarea style="width: 100%;"   name="thong_tin_lien_he" id="info_footer"><?php echo $row2['thong_tin_lien_he'] ?></textarea></td>
     </tr>

       <tr>
        <td>Bản đồ</td>
        <td><textarea name="ban_do" style="width: 100%;height: 200px;"><?php echo $row2['ban_do'] ?></textarea></td>
      </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >LƯU</button></td>
     </tr>
  </table>
</form>
<script type="text/javascript">
    CKEDITOR.replace("info_footer",{
               filebrowserBrowseUrl : 'tpl/info/ckfinder/ckfinder.html',
               filebrowserImageBrowseUrl : 'tpl/info/ckfinder/ckfinder.html?type=Images',
               filebrowserFlashBrowseUrl : 'tpl/info/ckfinder/ckfinder.html?type=Flash',
               filebrowserUploadUrl : 'tpl/info/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
               filebrowserImageUploadUrl : 'tpl/info/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
               filebrowserFlashUploadUrl : 'tpl/info/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });

</script>
