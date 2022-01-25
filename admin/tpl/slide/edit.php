	<?php
  include_once("config.php");
  $dt=new database();
   $dt->select("SELECT * FROM slide WHERE id='1'");
   $row2=$dt->fetch();
?>
<form action="tpl/slide/action.php" method="post" enctype="multipart/form-data">
   <table class="table table-striped">
      <tr>
        <td>slide 1</td>
        <td><input type="file" name="slide_1"   class="form-control" ></td>
     </tr>
      <?php
         $dt->select("SELECT * FROM slide WHERE id='1'");
          $row2=$dt->fetch();
          if ($row2['name'] !="") {
            ?>
           <tr>
             <td colspan="2"><img class="w-25" src="tpl/slide/uploads/<?php echo $row2['name']; ?>" alt=""></td>
           </tr>
            <?php
          }
        ?>
     <tr>
        <td>link slide 1</td>
        <td><input type="text" name="link_slide_1" value="<?php echo $row2['link']; ?>"  class="form-control" ></td>
     </tr>
       <tr>
        <td>slide 2</td>
        <td><input type="file" name="slide_2"   class="form-control" ></td>

     </tr>
      <?php
         $dt->select("SELECT * FROM slide WHERE id='2'");
          $row2=$dt->fetch();
          if ($row2['name'] !="") {
            ?>
           <tr>
             <td colspan="2"><img class="w-25" src="tpl/slide/uploads/<?php echo $row2['name']; ?>" alt=""></td>
           </tr>
            <?php
          }
        ?>
     <tr>
        <td>link slide 2</td>
        <td><input type="text" name="link_slide_2" value="<?php echo $row2['link']; ?>" class="form-control" ></td>
     </tr>
       <tr>
        <td>slide 3</td>
        <td><input type="file" name="slide_3"   class="form-control" ></td>
     </tr>
      <?php
         $dt->select("SELECT * FROM slide WHERE id='3'");
          $row2=$dt->fetch();
          if ($row2['name'] !="") {
            ?>
           <tr>
             <td colspan="2"><img class="w-25" src="tpl/slide/uploads/<?php echo $row2['name']; ?>" alt=""></td>
           </tr>
            <?php
          }
        ?>
     <tr>
        <td>link slide 3</td>
        <td><input type="text" name="link_slide_3" value="<?php echo $row2['link']; ?>"  class="form-control" ></td>
     </tr>
      <tr>
        <td>slide 4</td>
        <td><input type="file" name="slide_4"   class="form-control" ></td>
     </tr>
      <?php
         $dt->select("SELECT * FROM slide WHERE id='4'");
          $row2=$dt->fetch();
          if ($row2['name'] !="") {
            ?>
           <tr>
             <td colspan="2"><img class="w-25" src="tpl/slide/uploads/<?php echo $row2['name']; ?>" alt=""></td>
           </tr>
            <?php
          }
        ?>
     <tr>
        <td>link slide 4</td>
        <td><input type="text" name="link_slide_4"  value="<?php echo $row2['link']; ?>" class="form-control" ></td>
     </tr>
      <tr>
        <td>slide 5</td>
        <td><input type="file" name="slide_5"   class="form-control" ></td>
     </tr>
      <?php
         $dt->select("SELECT * FROM slide WHERE id='5'");
          $row2=$dt->fetch();
          if ($row2['name'] !="") {
            ?>
           <tr>
             <td colspan="2"><img class="w-25" src="tpl/slide/uploads/<?php echo $row2['name']; ?>" alt=""></td>
           </tr>
            <?php
          }
        ?>
     <tr>
        <td>link slide 5</td>
        <td><input type="text" name="link_slide_5"  value="<?php echo $row2['link']; ?>" class="form-control" ></td>
     </tr>
     <tr>
        <td colspan="2"><button style="margin: 0px 350px;" type="submit"  name="edit" class="btn btn-primary btn-lg" >LƯU</button></td>
     </tr>
  </table>
</form>