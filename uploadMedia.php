<?php
session_start();
$upload_dir = parse_ini_file('config.ini',true)['imagePath'];
if((isset($_SESSION['userId'])) && (($_SESSION['phase'] == "signin") || ($_SESSION['phase'] == "reg")))
{
	if(isset($_POST['userid']) && isset($_POST['tourID']))
	{
	  $userid=$_POST['userid'];
	  $tourID=$_POST['tourID'];
	  
	}

	if (isset($_POST['picture']))
	{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file1"]["name"]);
		$file_extension = end($temporary);

		if ((($_FILES["file1"]["type"] == "image/png") || ($_FILES["file1"]["type"] == "image/jpg") || ($_FILES["file1"]["type"] == "image/jpeg")
		) && in_array($file_extension, $validextensions))
		{
			if ($_FILES["file1"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file1"]["error"] . "<br/><br/>";
			} 
			else 
			{
				$newName=date("dmYHms") . "_img." . $file_extension;
				move_uploaded_file($_FILES["file1"]["tmp_name"], $upload_dir . $newName);
				$bin_string = file_get_contents( $upload_dir . $newName);
				$hex_string = base64_encode($bin_string);
				unlink(parse_ini_file('config.ini',true)['imagePath'] . $newName);
				#$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'). parse_ini_file('config.ini',true)['imagePath'] . $newName;
				include("db.php");
				$insert = mysql_query("INSERT INTO `tbl_tour_media_pictures`(`tour_id`, `tour_picture`) VALUES ($tourID, '$hex_string')");
				if($insert)
				{
					$errormsg="Cover Picture uploaded.";
					error_log($errormsg,0);
					header('Location:mediaManagement.php?user='. $userid .'&tour=' . $tourID. '');
				}
				else
				{
					echo "<script type='text/javascript'>alert('7');</script>";
					$errormsg="Cover Picture could not uploaded.";
					error_log($errormsg,0);
				}
			}
		} 
		else 
		{
			$errormsg="Cover Picture type or size do not match the required type or size";
			error_log($errormsg,0);
		}
	}
	else if(isset($_POST['video']))
	{
		$validextensions = array("mp4", "mpeg", "wmv", "avi", "3gp");
		$temporary = explode(".", $_FILES["file2"]["name"]);
		$file_extension = end($temporary);

		if ((($_FILES["file2"]["type"] == "image/mp4") || ($_FILES["file2"]["type"] == "image/mpeg") || ($_FILES["file2"]["type"] == "image/wmv")  || ($_FILES["file2"]["type"] == "image/avi")  || ($_FILES["file2"]["type"] == "image/3gp")
		) && ($_FILES["file2"]["size"] < 10000000000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions))
		{
			if ($_FILES["file2"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file2"]["error"] . "<br/><br/>";
			} 
			else 
			{

				$newName=date("dmYHms") . "_vid." . $file_extension;
				move_uploaded_file($_FILES["file2"]["tmp_name"], $upload_dir . $newName);
				$bin_string = file_get_contents( $upload_dir . $newName);
				$hex_string = base64_encode($bin_string);
				unlink(parse_ini_file('config.ini',true)['imagePath'] . $newName);
				#$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'). parse_ini_file('config.ini',true)['imagePath'] . $newName;
				include("db.php");
				$insert = mysql_query("INSERT INTO `tbl_tour_media_videos`(`tour_id`, `tour_video`) VALUES ($tourID, '$hex_string')");
				if($insert)
				{
					$errormsg="Cover Picture uploaded.";
					error_log($errormsg,0);
					header('Location:guide_registration_2.php?id=' . $userid .'');
				}
				else
				{
					$errormsg="Cover Picture could not uploaded.";
					error_log($errormsg,0);
				}
			}
		}
		else 
		{
			echo '<script>alert("hii");</sript>';
			$errormsg="Cover Picture type or size do not match the required type or size";
			error_log($errormsg,0);
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
	include("signOut.php");
	header('Location:guide_registration_1.php');
}
?>

