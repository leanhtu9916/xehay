	<?php
    include_once("config.php");
    $dt=new database();
    $id=isset($_GET["id"])?$_GET["id"]:"";
    $dt->select("SELECT* FROM category WHERE id='$id'");
    $row=$dt->fetch();
  ?>
<form action="tpl/category/action.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
      <tr>
        <td>Chuyên mục</td>
        <td><input type="text" id="name" name="name" required="required" value="<?php echo $row['name']; ?>"  class="form-control" ></td>
     </tr>

     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >lƯU</button></td>
     </tr>
  </table>
</form>