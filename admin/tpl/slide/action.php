
<?php
      include_once("../../config.php");
      $dt=new database();
      if (isset($_POST['edit'])) {
      		$slide_1=$_FILES['slide_1']['name'];
      		$slide_2=$_FILES['slide_2']['name'];
      		$slide_3=$_FILES['slide_3']['name'];
      		$slide_4=$_FILES['slide_4']['name'];
      		$slide_5=$_FILES['slide_5']['name'];
			$slide_tmp_1=$_FILES['slide_1']['tmp_name'];
			$slide_tmp_2=$_FILES['slide_2']['tmp_name'];
			$slide_tmp_3=$_FILES['slide_3']['tmp_name'];
			$slide_tmp_4=$_FILES['slide_4']['tmp_name'];
			$slide_tmp_5=$_FILES['slide_5']['tmp_name'];
			move_uploaded_file($slide_tmp_1,'uploads/'.$slide_1);
			move_uploaded_file($slide_tmp_2,'uploads/'.$slide_2);
			move_uploaded_file($slide_tmp_3,'uploads/'.$slide_3);
			move_uploaded_file($slide_tmp_4,'uploads/'.$slide_4);
			move_uploaded_file($slide_tmp_5,'uploads/'.$slide_5);
			$link_slide_1=$_POST['link_slide_1'];
      		$link_slide_2=$_POST['link_slide_2'];
      		$link_slide_3=$_POST['link_slide_3'];
      		$link_slide_4=$_POST['link_slide_4'];
      		$link_slide_5=$_POST['link_slide_5'];
			if ($slide_1!='') {
				$dt->command("UPDATE slide SET name='$slide_1',link='$link_slide_1' WHERE id='1'");
				header("location: ../../index.php?view=slide");
			}else{
			
			header("location: ../../index.php?view=slide");
		}
			if ($slide_2!='') {
				$dt->command("UPDATE slide SET name='$slide_2',link='$link_slide_2' WHERE id='2'");
				header("location: ../../index.php?view=slide");
			}else{
			
			header("location: ../../index.php?view=slide");
		}
			if ($slide_3!='') {
				$dt->command("UPDATE slide SET name='$slide_3',link='$link_slide_3' WHERE id='3'");
				header("location: ../../index.php?view=slide");
			}else{
			
			header("location: ../../index.php?view=slide");
		}
		if ($slide_4!='') {
				$dt->command("UPDATE slide SET name='$slide_4',link='$link_slide_4' WHERE id='4'");
				header("location: ../../index.php?view=slide");
			}else{
			
			header("location: ../../index.php?view=slide");
		}
			if ($slide_5!='') {
				$dt->command("UPDATE slide SET name='$slide_5',link='$link_slide_5' WHERE id='5'");
				header("location: ../../index.php?view=slide");
			}else{
			
			header("location: ../../index.php?view=slide");
		}
			
      }
     ?>