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
	if(isset($_POST['userid']) && isset($_POST['tourID']))
	{
	  $userid=$_POST['userid'];
	  $tourID=$_POST['tourID'];
	}

	if (isset($_POST['picture']))
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
				$errormsg="Tour Media picture type do not match the required type";
				error_log($errormsg,0);
			}
			else
			{
				$size=filesize($_FILES['file1']['tmp_name']);

				if ($size > MAX_SIZE*1024)
				{
					$errormsg="Tour Media picture size do not match the required size";
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

				$newwidth=400;
				$newheight=203; //($height/$width)*$newwidth;
				$tmp=imagecreatetruecolor($newwidth,$newheight);

				imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

				$newName=date("dmYHms") . "_img." . $extension;
				$filename = $upload_dir . $newName;
				imagejpeg($tmp,$filename,100);

				imagedestroy($src);
				imagedestroy($tmp);

				$bin_string = file_get_contents($filename);
				$hex_string = base64_encode($bin_string);
				//unlink($filename);

				include_once("db.php");
				$insert = mysql_query("INSERT INTO `tbl_tour_media_pictures`(`tour_id`, `tour_picture`) VALUES ($tourID, '$hex_string')");
				if($insert)
				{
					$errormsg="Tour Media Picture uploaded.";
					error_log($errormsg,0);
					header('Location:mediaManagement.php?user='. $userid .'&tour=' . $tourID. '');
				}
				else
				{
					echo "<script type='text/javascript'>alert('7');</script>";
					$errormsg="Tour Media Picture could not uploaded.";
					error_log($errormsg,0);
				}
			}
		}
	}
	else if(isset($_POST['video']))
	{
		$validextensions = array("mp4", "mpeg", "wmv", "avi", "3gp");
		$temporary = explode(".", $_FILES["file2"]["name"]);
		$file_extension = end($temporary);

		if ((($_FILES["file2"]["type"] == "video/mp4") || ($_FILES["file2"]["type"] == "video/mpeg") || ($_FILES["file2"]["type"] == "video/wmv")  || ($_FILES["file2"]["type"] == "video/avi")  || ($_FILES["file2"]["type"] == "video/3gp")
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
				//unlink(parse_ini_file('config.ini',true)['imagePath'] . $newName);
				#$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'). parse_ini_file('config.ini',true)['imagePath'] . $newName;
				include_once("db.php");
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
	include_once("signOut.php");
	header('Location:guide_registration_1.php');
}
?>