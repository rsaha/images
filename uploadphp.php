<?php
session_start();
if(isset($_SESSION['userId']))
{
	$userid=$_SESSION['userId'];
	
			if (isset($_POST['submit'])) 
			{
					$validextensions = array("jpeg", "jpg", "png");
					$temporary = explode(".", $_FILES["file"]["name"]);
					$file_extension = end($temporary);

				if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
						) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
						&& in_array($file_extension, $validextensions))
						{
							echo "<script type='text/javascript'>alert('inside type');</script>";
					if ($_FILES["file"]["error"] > 0)
						{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
					} 
					else 
					{
						$newName=date("dmYHms") . "_img." . $file_extension;
						move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newName);
							 $bin_string = file_get_contents( "upload/" . $newName);
							 $hex_string = base64_encode($bin_string);
							 //echo "<script type='text/javascript'>alert('$hex_string');</script>";
							$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "upload/" . $newName;
							/* echo "<b>Stored in:</b><a href = '$imgFullpath' target='_blank'> " .$imgFullpath.'<a>'; */
							include("db.php");
							$upl=0;
							$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count = mysql_num_rows($select);
							if($count==0)
							{
								$insert = mysql_query("INSERT INTO `tbl_guide_detail_profile` (`user_id`, `guide_profile_pic`) VALUES ($userid, '$hex_string')");
								if($insert)
								{
									$upl=1;
								}
							}
							else
							{						
							$update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `guide_profile_pic` = '$hex_string' WHERE `user_id` = $userid");
							if($update)
							{
								$upl=1;
							}
							}
							if($upl == 1)
								{
									echo "<script type='text/javascript'>alert('updated');</script>";
							header('Location:guide_registration_2.php?id=' . $userid .'');
								}
								else
								{
									echo "<script type='text/javascript'>alert('not updated');</script>";
								}
					}
                } 
				else {
					echo "<script type='text/javascript'>alert('out1');</script>";
					}
				}
				else {
					echo "<script type='text/javascript'>alert('out2');</script>";
					}
}
else {
					echo "<script type='text/javascript'>alert('out3');</script>";
					}
?>