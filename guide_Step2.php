<?php
	session_start();
$upload_dir = parse_ini_file('config.ini',true)['imagePath'];

function getExtension($str) 
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	
    include_once("db.php");
	
	if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
	{
		$i = $_SESSION['userId'];
		header('Location:guide_profile.php?id='. $i .'');
		exit;
	}
	else if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "reg"))
	{
		if(isset($_POST['userid']))
		{
			$userid=mysql_real_escape_string($_POST['userid']);
		}
		if($_SESSION['userId']!=$userid)
		{
			$errormsg="Unauthenticated access to the step 2 page, Registration Step 1 is not done";
			error_log($errormsg,0);
			include_once("signOut.php");
			header('Location:guide_registration_1.php');
			exit;
		}
		else
		{
			$Gender=mysql_real_escape_string($_POST['Gender']);
			
			$DOB=mysql_real_escape_string($_POST['DOB']);
			if($DOB=="")
			{
				$DOB="1990-01-01";
			}
			
			$streetaddress=mysql_real_escape_string($_POST['streetaddress']);
			
			$cityTemp = mysql_real_escape_string($_POST['city']);
			$cityArray = explode(", ", $cityTemp);
			$city = $cityArray[0];
			
			$state=mysql_real_escape_string($_POST['state']);
			
			$country=mysql_real_escape_string($_POST['country']);
			
			$nickname=mysql_real_escape_string($_POST['nickname']);
			
			$licencenumber=mysql_real_escape_string($_POST['licencenumber']);
			
			$licenceexpiry=mysql_real_escape_string($_POST['licenceexpiry']);
			if($licenceexpiry=="")
			{
				$licenceexpiry="1991-01-01";
			}
			
			$landlinenumber=mysql_real_escape_string($_POST['landlinenumber']);
			
			$contacttime=mysql_real_escape_string($_POST['contacttime']);
			
			$paymentterms=mysql_real_escape_string($_POST['paymentterms']);
			
			$communicationmechanism= mysql_real_escape_string($_POST['communicationmechanism']);
			
			@$languageKnown= $_POST['languageKnown'];
			
			$guideTerritory= mysql_real_escape_string($_POST['guideTerritory']);
			
			$hex_string = "";
			
			include_once("db.php");
			$update = mysql_query("UPDATE `tbl_user_profile` SET `gender`='$Gender', `d_o_b`='$DOB', `street_address`='$streetaddress', `city`='$city', `state`='$state', `country`='$country', `datecreated`=now() WHERE `user_id`=$userid");
		
		
		define ("MAX_SIZE","400");
		$image =$_FILES["licenceImage"]["name"];
		$uploadedfile = $_FILES['licenceImage']['tmp_name'];

		if ($image) 
		{
			$filename = stripslashes($_FILES['licenceImage']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);


			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
				$errormsg="Licence Image type do not match the required type";
				error_log($errormsg,0);
			}
			else
			{
				$size=filesize($_FILES['licenceImage']['tmp_name']);

				if ($size > MAX_SIZE*1024)
				{
					$errormsg="Licence Image size do not match the required size";
					error_log($errormsg,0);
				}

				if($extension=="jpg" || $extension=="jpeg" )
				{
					$uploadedfile = $_FILES['licenceImage']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);
				}
				else if($extension=="png")
				{
					$uploadedfile = $_FILES['licenceImage']['tmp_name'];
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

				$newName=date("dmYHms") . "_img." . $extension;
				$filename = $upload_dir . $newName;
				imagejpeg($tmp,$filename,100);

				imagedestroy($src);
				imagedestroy($tmp);

				$bin_string = file_get_contents($filename);
				$hex_string = base64_encode($bin_string);
				//unlink($filename);
			}
		}
		else 
		{
			$hex_string = "";
			$errormsg="Could not upload the licence attachment.";
			error_log($errormsg,0);
		}
			
			$upl=0;
			$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
			$count = mysql_num_rows($select);
			if($count==0)
			{
				if($hex_string == "")
				{
					$create = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
					`user_id`, 
					`nick_name`, 
					`license_no`,	
					`validity`, 
					`guide_territory`,
					`landline_no`, 
					`Best_time_for_contact`,
					`payment_terms`, 
					`Communication_mechanism`,
					`status`, 
					`datecreated`
					) VALUES (
					$userid, 
					'$nickname', 
					'$licencenumber',
					'$licenceexpiry',
					'$guideTerritory',
					'$landlinenumber',
					'$contacttime',
					'$paymentterms',
					'$communicationmechanism',
					1, 
					now()
					)");
				}
				else
				{
					$create = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
					`user_id`, 
					`nick_name`, 
					`license_no`,
					`license_Image`,	
					`validity`, 
					`guide_territory`,
					`landline_no`, 
					`Best_time_for_contact`,
					`payment_terms`, 
					`Communication_mechanism`,
					`status`, 
					`datecreated`
					) VALUES (
					$userid, 
					'$nickname', 
					'$licencenumber',
					'$hex_string',
					'$licenceexpiry',
					'$guideTerritory',
					'$landlinenumber',
					'$contacttime',
					'$paymentterms',
					'$communicationmechanism',
					1, 
					now()
					)");
				}
				if($create)
				{
					$upl=1;
				}
			}
			else
			{
				if($hex_string == "")
				{
					$update2 = mysql_query("UPDATE `tbl_guide_detail_profile` SET 
					`nick_name` = '$nickname', 
					`license_no` = '$licencenumber',
					`validity` = '$licenceexpiry', 
					`guide_territory` = '$guideTerritory',
					`landline_no` = '$landlinenumber', 
					`Best_time_for_contact` = '$contacttime',
					`payment_terms` = '$paymentterms', 
					`Communication_mechanism` = '$communicationmechanism',
					`datecreated` = now()
					WHERE `user_id` = $userid");
				}
				else
				{
					$update2 = mysql_query("UPDATE `tbl_guide_detail_profile` SET 
					`nick_name` = '$nickname', 
					`license_no` = '$licencenumber',
					`validity` = '$licenceexpiry', 
					`license_Image` = '$hex_string',	
					`guide_territory` = '$guideTerritory',
					`landline_no` = '$landlinenumber', 
					`Best_time_for_contact` = '$contacttime',
					`payment_terms` = '$paymentterms', 
					`Communication_mechanism` = '$communicationmechanism',
					`datecreated` = now()
					WHERE `user_id` = $userid");
				}
				
				
				if($update2)
				{
					$upl=1;
				}
			}
				
		
			if($update || $upl == 1)
			{
				if( is_array($languageKnown))
				{
					$deleteee = mysql_query("DELETE FROM `tbl_guide_known_languages` WHERE `user_id` = $userid");
					while (list ($key, $val) = each ($languageKnown)) 
					{
						$insertINLan = mysql_query("INSERT INTO `tbl_guide_known_languages`
						(
						`user_id`, 
						`language_id`
						) VALUES (
						$userid,
						$val
						)")  or die('Error : ' . mysql_error());
					}
				}
				$errormsg="Registratin Step 2 completed.";
				$_session['login']="true";
				$msg="Successfully Updated!!";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header('Location:guide_registration_3.php?id=' . $userid . '');
				exit;
			}
			else
			{
				$errormsg="Something went wrong in registration step 3, Try again";
				error_log($errormsg,0);
			$msg="Something went wrong!!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
			}
		}
	}
	else
	{
		$errormsg="Unauthenticated access to the step 2 page, Registration Step 1 is not done";
	error_log($errormsg,0);
     include_once("signOut.php");
	header('Location:guide_registration_1.php');	
	}
?>