<?php
	session_start();
	function getExtension($str) 
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}

	$upload_dir = parse_ini_file('config.ini',true)['imagePath'];
	if((isset($_SESSION['userId'])) && (($_SESSION['phase'] == "signin") || ($_SESSION['phase'] == "reg")))
	{
		$userid=$_SESSION['userId'];
		include_once('db.php');
		$selectt1 = mysql_query("SELECT `mobileNo` FROM `tbl_user_profile` WHERE `user_id` = $userid");
		$roww11 = mysql_fetch_assoc($selectt1);
		$mobileNumber=$roww11["mobileNo"];

		if (isset($_POST['cover_pic']))
		{
			define ("MAX_SIZE","400");
			$image =$_FILES["file1"]["name"];
			$uploadedfile = $_FILES['file1']['tmp_name'];

			if ($image) 
			{
				$filename = stripslashes($_FILES['file1']['name']);
				$extension = getExtension($filename);
				$extension = strtolower($extension);


				if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
				{
					$errormsg="Cover picture type do not match the required type";
					error_log($errormsg,0);
				}
				else
				{
					$size=filesize($_FILES['file1']['tmp_name']);

					if ($size > MAX_SIZE*1024)
					{
						$errormsg="Cover picture size do not match the required size";
						error_log($errormsg,0);
					}

					if($extension=="jpg" || $extension=="jpeg" )
					{
						$uploadedfile = $_FILES['file1']['tmp_name'];
						$src = imagecreatefromjpeg($uploadedfile);
					}
					else if($extension=="png")
					{
						$uploadedfile = $_FILES['file1']['tmp_name'];
						$src = imagecreatefrompng($uploadedfile);
					}
					else 
					{
						$src = imagecreatefromgif($uploadedfile);
					}

					list($width,$height)=getimagesize($uploadedfile);

					$newwidth=1400;
					$newheight=200; //($height/$width)*$newwidth;
					$tmp=imagecreatetruecolor($newwidth,$newheight);

					imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

					$newName=$mobileNumber . "_cover." . $extension; //date("dmYHms") . "_img." . $extension;
					$filename = $upload_dir . $newName;
					imagejpeg($tmp,$filename,100);

					imagedestroy($src);
					imagedestroy($tmp);

					$bin_string = file_get_contents($filename);
					$hex_string = base64_encode($bin_string);
					unlink($filename);

					include_once("db.php");
					$upl=0;
					$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
					$count = mysql_num_rows($select);
					if($count==0)
					{
						$insert = mysql_query("INSERT INTO `tbl_guide_detail_profile` (`user_id`, `guide_Cover_pic`, `status`, `datecreated`) VALUES ($userid, '$hex_string', 1, now())");
						if($insert)
						{
							$upl=1;
						}
					}
					else
					{
						$update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `guide_Cover_pic` = '$hex_string' WHERE `user_id` = $userid");
						if($update)
						{
							$upl=1;
						}
					}
					if($upl == 1)
					{
						$errormsg="Cover Picture uploaded.";
						error_log($errormsg,0);
						if($_SESSION['phase'] == "signin") //$_SESSION['phase'] == "reg")
						{
							header('Location:guide_profile_edit.php?id=' . $userid .'');
						}
						else
						{
							header('Location:guide_registration_2.php?id=' . $userid .'');
						}
						exit;
					}
					else
					{
						$errormsg="Cover Picture could not uploaded.";
						error_log($errormsg,0);
						if($_SESSION['phase'] == "signin") //$_SESSION['phase'] == "reg")
						{
							header('Location:guide_profile_edit.php?id=' . $userid .'');
						}
						else
						{
							header('Location:guide_registration_2.php?id=' . $userid .'');
						}
						exit;
					}
				}
			}
		}
		else if(isset($_POST['profile_pic']))
		{
			define ("MAX_SIZE","400");
			$image =$_FILES["file2"]["name"];
			$uploadedfile = $_FILES['file2']['tmp_name'];

			if ($image) 
			{
			$filename = stripslashes($_FILES['file2']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);


			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
			$errormsg="Profile picture type do not match the required type";
			error_log($errormsg,0);
			}
			else
			{
			$size=filesize($_FILES['file2']['tmp_name']);

			if ($size > MAX_SIZE*1024)
			{
			$errormsg="Profile picture size do not match the required size";
			error_log($errormsg,0);
			}

			if($extension=="jpg" || $extension=="jpeg" )
			{
			$uploadedfile = $_FILES['file2']['tmp_name'];
			$src = imagecreatefromjpeg($uploadedfile);
			}
			else if($extension=="png")
			{
			$uploadedfile = $_FILES['file2']['tmp_name'];
			$src = imagecreatefrompng($uploadedfile);
			}
			else 
			{
			$src = imagecreatefromgif($uploadedfile);
			}

			list($width,$height)=getimagesize($uploadedfile);

			$newwidth=198;
			$newheight=198; //($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);

			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			$newName=$mobileNumber . "_profile." . $extension; //date("dmYHms") . "_img." . $extension;
			$filename = $upload_dir . $newName;
			imagejpeg($tmp,$filename,100);

			imagedestroy($src);
			imagedestroy($tmp);

			$bin_string = file_get_contents($filename);
			$hex_string = base64_encode($bin_string);
			unlink($filename);


			include_once("db.php");
			$upl=0;
			$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
			$count = mysql_num_rows($select);
			if($count==0)
			{
			$insert = mysql_query("INSERT INTO `tbl_guide_detail_profile` (`user_id`, `guide_profile_pic`, `status`, `datecreated`) VALUES ($userid, '$hex_string', 1, now())");
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
			$errormsg="Profile Picture Image uploaded.";
			error_log($errormsg,0);
			if($_SESSION['phase'] == "signin") //$_SESSION['phase'] == "reg")
			{
				header('Location:guide_profile_edit.php?id=' . $userid .'');
			}
			else
			{
				header('Location:guide_registration_2.php?id=' . $userid .'');
			}
			exit;
			}
			else
			{
			$errormsg="Profile Picture could not uploaded.";
			error_log($errormsg,0);
			if($_SESSION['phase'] == "signin") //$_SESSION['phase'] == "reg")
			{
				header('Location:guide_profile_edit.php?id=' . $userid .'');
			}
			else
			{
				header('Location:guide_registration_2.php?id=' . $userid .'');
			}
			exit;
			}
			}
			}
		}
		else if(isset($_POST['licence_pic']))
		{
			define ("MAX_SIZE","400");
			$image =$_FILES["file3"]["name"];
			$uploadedfile = $_FILES['file3']['tmp_name'];

			if ($image) 
			{
			$filename = stripslashes($_FILES['file3']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);


			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
			$errormsg="Licence Image type do not match the required type";
			error_log($errormsg,0);
			}
			else
			{
			$size=filesize($_FILES['file3']['tmp_name']);

			if ($size > MAX_SIZE*1024)
			{
			$errormsg="Licence Image size do not match the required size";
			error_log($errormsg,0);
			}

			if($extension=="jpg" || $extension=="jpeg" )
			{
			$uploadedfile = $_FILES['file3']['tmp_name'];
			$src = imagecreatefromjpeg($uploadedfile);
			}
			else if($extension=="png")
			{
			$uploadedfile = $_FILES['file3']['tmp_name'];
			$src = imagecreatefrompng($uploadedfile);
			}
			else 
			{
			$src = imagecreatefromgif($uploadedfile);
			}

			list($width,$height)=getimagesize($uploadedfile);

			$newwidth=250;
			$newheight=180; //($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);

			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			$newName=$mobileNumber . "_licence." . $extension; //date("dmYHms") . "_img." . $extension;
			$filename = $upload_dir . $newName;
			imagejpeg($tmp,$filename,100);

			imagedestroy($src);
			imagedestroy($tmp);

			$bin_string = file_get_contents($filename);
			$hex_string = base64_encode($bin_string);
			unlink($filename);

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
			if($_SESSION['phase'] == "signin") //$_SESSION['phase'] == "reg")
			{
				header('Location:guide_profile_edit.php?id=' . $userid .'');
			}
			else
			{
				header('Location:guide_registration_2.php?id=' . $userid .'');
			}
			exit;
			}
			else
			{
			$errormsg="Licence Image could not uploaded.";
			error_log($errormsg,0);
			if($_SESSION['phase'] == "signin") //$_SESSION['phase'] == "reg")
			{
				header('Location:guide_profile_edit.php?id=' . $userid .'');
			}
			else
			{
				header('Location:guide_registration_2.php?id=' . $userid .'');
			}
			exit;
			}
			}
			}
		}
		else
		{
			$errormsg="Somthing Went Wrong!!";
			error_log($errormsg,0);
		}
	}
	else 
	{
		$errormsg="Unauthenticated access to the upload page, Registration Step 1 is not done";
		error_log($errormsg,0);
		include_once("signOut.php");
	}
?>