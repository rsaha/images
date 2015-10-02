<?php
session_start();
$upload_dir = parse_ini_file('config.ini',true)['imagePath'];
if((isset($_SESSION['userId'])) && (($_SESSION['phase'] == "signin") || ($_SESSION['phase'] == "reg")))
{
	echo '<script>alert("1");</sript>';
	$userid=$_SESSION['userId'];
	
	if (isset($_POST['cover_pic']))
	{
		echo '<script>alert("2");</sript>';
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file1"]["name"]);
			$file_extension = end($temporary);

		if ((($_FILES["file1"]["type"] == "image/png") || ($_FILES["file1"]["type"] == "image/jpg") || ($_FILES["file1"]["type"] == "image/jpeg")
				) && ($_FILES["file1"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
				&& in_array($file_extension, $validextensions))
				{
					echo '<script>alert("3");</sript>';
					if ($_FILES["file1"]["error"] > 0)
				{
					echo '<script>alert("4");</sript>';
			echo "Return Code: " . $_FILES["file1"]["error"] . "<br/><br/>";
			} 
			else 
			{
				echo '<script>alert("5");</sript>';
				$newName=date("dmYHms") . "_img." . $file_extension;
				move_uploaded_file($_FILES["file1"]["tmp_name"], $upload_dir . $newName);
					 $bin_string = file_get_contents( $upload_dir . $newName);
					 $hex_string = base64_encode($bin_string);
					 unlink($upload_dir . $newName);
					 #$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'). $upload_dir . $newName;
					include_once("db.php");
					$upl=0;
					$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
					$count = mysql_num_rows($select);
					if($count==0)
					{
						echo '<script>alert("6");</sript>';
						$insert = mysql_query("INSERT INTO `tbl_guide_detail_profile` (`user_id`, `guide_Cover_pic`, `status`, `datecreated`) VALUES ($userid, '$hex_string', 1, now())");
						if($insert)
						{
							echo '<script>alert("7");</sript>';
						$upl=1;
						}
					}
					else
					{	
				echo '<script>alert("8");</sript>';
						$update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `guide_Cover_pic` = '$hex_string' WHERE `user_id` = $userid");
						if($update)
						{
							echo '<script>alert("8");</sript>';
						$upl=1;
						}
					}
					if($upl == 1)
						{
							echo '<script>alert("9");</sript>';
							$errormsg="Cover Picture uploaded.";
					error_log($errormsg,0);
					//header('Location:guide_registration_2.php?id=' . $userid .'');
						}
						else
						{
							echo '<script>alert("10");</sript>';
							$errormsg="Cover Picture could not uploaded.";
							error_log($errormsg,0);
						}
			}
		} 
		else 
		{
			echo '<script>alert("11");</sript>';
		$errormsg="Cover Picture type or size do not match the required type or size";
						error_log($errormsg,0);
		}
		}
		else if(isset($_POST['profile_pic']))
		{
			echo '12';
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file2"]["name"]);
			$file_extension = end($temporary);

			if ((($_FILES["file2"]["type"] == "image/png") || ($_FILES["file2"]["type"] == "image/jpg") || ($_FILES["file2"]["type"] == "image/jpeg")
			) && ($_FILES["file2"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
			&& in_array($file_extension, $validextensions))
			{
				echo '<script>alert("13");</sript>';
					if ($_FILES["file2"]["error"] > 0)
						{
							echo '<script>alert("14");</sript>';
							echo "Return Code: " . $_FILES["file2"]["error"] . "<br/><br/>";
						} 
				else 
				{
					echo '<script>alert("15");</sript>';
					$newName=date("dmYHms") . "_img." . $file_extension;
					move_uploaded_file($_FILES["file2"]["tmp_name"], $upload_dir . $newName);
				 $bin_string = file_get_contents( $upload_dir . $newName);
				 $hex_string = base64_encode($bin_string);
				 unlink($upload_dir . $newName);
				 #$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'). $upload_dir . $newName;
				include_once("db.php");
				$upl=0;
				$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
				$count = mysql_num_rows($select);
				if($count==0)
				{
					echo '<script>alert("16");</sript>';
					$insert = mysql_query("INSERT INTO `tbl_guide_detail_profile` (`user_id`, `guide_profile_pic`, `status`, `datecreated`) VALUES ($userid, '$hex_string', 1, now())");
					if($insert)
					{
						echo '<script>alert("17");</sript>';
					$upl=1;
					}
				}
				else
				{	
			echo '<script>alert("18");</sript>';
					$update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `guide_profile_pic` = '$hex_string' WHERE `user_id` = $userid");
					if($update)
					{
						echo '<script>alert("19");</sript>';
					$upl=1;
					}
				}
				if($upl == 1)
					{
						echo '<script>alert("20");</sript>';
						$errormsg="Profile Picture Image uploaded.";
				error_log($errormsg,0);
				//header('Location:guide_registration_2.php?id=' . $userid .'');
					}
					else
					{
						echo '<script>alert("21");</sript>';
						$errormsg="Profile Picture could not uploaded.";
						error_log($errormsg,0);
					}
				}
			}
		else
		{
			echo '<script>alert("22");</sript>';
			$errormsg="Profile Picture type or size do not match the required type or size";
						error_log($errormsg,0);
		}
	}	
			else if(isset($_POST['licence_pic']))
			{
				$validextensions = array("jpeg", "jpg", "png");
				$temporary = explode(".", $_FILES["file3"]["name"]);
				$file_extension = end($temporary);

				if ((($_FILES["file3"]["type"] == "image/png") || ($_FILES["file3"]["type"] == "image/jpg") || ($_FILES["file3"]["type"] == "image/jpeg")
				) && ($_FILES["file3"]["size"] < 10000000) //Approx. 100kb files can be uploaded.
				&& in_array($file_extension, $validextensions))
					{
						if ($_FILES["file3"]["error"] > 0)
					{
				echo "Return Code: " . $_FILES["file3"]["error"] . "<br/><br/>";
				} 
				else 
				{
					$newName=date("dmYHms") . "_img." . $file_extension;
					move_uploaded_file($_FILES["file3"]["tmp_name"], $upload_dir . $newName);
					 $bin_string = file_get_contents( $upload_dir. $newName);
					 $hex_string = base64_encode($bin_string);
					 unlink($upload_dir . $newName);
					#$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'). $upload_dir . $newName;
					include_once("db.php");
					$upl=0;
					$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
					$count = mysql_num_rows($select);
					if($count==0)
					{
						$insert = mysql_query("INSERT INTO `tbl_guide_detail_profile` (`user_id`, `license_Image`, `status`, `datecreated`) VALUES ($userid, '$hex_string', 1, now())");
						if($insert)
						{
						$upl=1;
						}
					}
					else
					{	
						$update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `license_Image` = '$hex_string' WHERE `user_id` = $userid");
						if($update)
						{
						$upl=1;
						}
					}
					if($upl == 1)
					{
						$errormsg="Licence Image uploaded.";
						error_log($errormsg,0);
						//header('Location:guide_registration_2.php?id=' . $userid .'');
						exit;
					}
					else
					{
						$errormsg="Licence Image could not uploaded.";
						error_log($errormsg,0);
						//header('Location:guide_registration_2.php?id=' . $userid .'');
						exit;
					}
				}
			} 
			else 
			{
				$errormsg="Licence Image type or size do not match the required type or size";
						error_log($errormsg,0);
			}
		}
		else
		{
			echo '<script>alert("23");</sript>';
			$errormsg="Somthing Went Wrong!!";
		error_log($errormsg,0);
		}
	}
	else 
	{
		echo '<script>alert("24");</sript>';
		$errormsg="Unauthenticated access to the upload page, Registration Step 1 is not done";
		error_log($errormsg,0);
		include_once("signOut.php");
		//header('Location:guide_registration_1.php');
	}
?>