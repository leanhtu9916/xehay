
<?php
  include_once("config.php");
  $dt=new database();
   $dt->select("SELECT * FROM social  ");
   $row2=$dt->fetch();
?>
<form action="tpl/social/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
    <input  type="hidden" name="id" value="<?php echo $row2['id'] ?>" class="form-control" >
     <tr>
        <td>Hotline</td>
        <td><input  type="text" id="add" name="hotline" value="<?php echo $row2['hotline'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Zalo</td>
        <td><input  type="text" id="add" name="zalo" value="<?php echo $row2['zalo'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Email</td>
        <td><input  type="email" name="email" value="<?php echo $row2['email'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Facebook</td>
        <td><input  type="text" name="facebook" value="<?php echo $row2['facebook'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Youtube</td>
        <td><input  type="text" name="youtube" value="<?php echo $row2['youtube'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Instagram</td>
        <td><input  type="text" name="instagram" value="<?php echo $row2['instagram'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Twitter</td>
        <td><input  type="text" name="twitter" value="<?php echo $row2['twitter'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td>Pinterest</td>
        <td><input  type="text" name="pinterest" value="<?php echo $row2['pinterest'] ?>" required="required" class="form-control" ></td>
     </tr>
      <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >LƯU</button></td>
     </tr>
  </table>
</form>
