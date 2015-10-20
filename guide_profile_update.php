j<?php
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
	if(isset($_SESSION['userId']))
	{
	if(isset($_POST['userid']))
	{
	  $userid=$_POST['userid'];
	}
	if($_SESSION['userId']!=$userid)
	{
		$errormsg="Unauthenticated access to the Guide edit page, Registration Step 1 is not done";
		error_log($errormsg,0);
		include_once("signOut.php");
        header('Location:registration.php');
	}
	else
	{
		$flag1=0;
		$flag2=0;
			include_once('db.php');
			$firstName=mysql_real_escape_string($_POST['firstName']);
			$lastName=mysql_real_escape_string($_POST['lastName']);
			$emailID = mysql_real_escape_string($_POST['emailID']);
			$mobileNumber = mysql_real_escape_string($_POST['mobileNumber']);
			$gender = mysql_real_escape_string($_POST['gender']);
			$birthday = mysql_real_escape_string($_POST['birthday']);
			$streetAddress = mysql_real_escape_string($_POST['streetAddress']);
			$cityTemp = mysql_real_escape_string($_POST['city']);
			$cityArray = explode(", ", $cityTemp);
			$city = $cityArray[0];
			$state = mysql_real_escape_string($_POST['state']);
			$country = mysql_real_escape_string($_POST['country']);
			
			$licenceNumber = mysql_real_escape_string($_POST['licenceNumber']);
			$licenceValidty = mysql_real_escape_string($_POST['licenceValidty']);
			$guideTerritory = mysql_real_escape_string($_POST['guideTerritory']);
			$landLineNumber = mysql_real_escape_string($_POST['landLineNumber']);
			$paymentTerm = mysql_real_escape_string($_POST['paymentTerm']);
			$bestTimeToContact = mysql_real_escape_string($_POST['bestTimeToContact']);
			$communicationMechanism = mysql_real_escape_string($_POST['communicationMechanism']);
			@$languageKnown= $_POST['languageKnown'];
			
			$experianceInYear = mysql_real_escape_string($_POST['experianceInYear']);
			$otherExperiance = mysql_real_escape_string($_POST['otherExperiance']);
			$remark = mysql_real_escape_string($_POST['remark']);
			
			
			$update1 = mysql_query("UPDATE `tbl_user_profile` SET `f_name`='$firstName', `l_name`='$lastName', `email`='$emailID', 
			`mobileNo`='$mobileNumber', `gender`='$gender', `d_o_b`='$birthday', `street_address`='$streetAddress', `city`='$city', 
			`state`='$state', `country`='$country', `datecreated`=now() WHERE `user_id` = $userid") or die('Error : ' . mysql_error());
			if($update1)
			{
				$flag1=1;
			}
			else
			{
				$flag1=0;
				error_log($update1);
			}
			
			include_once("db.php");
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

					$newName=$mobileNumber . "_licence." . $extension;
					//$newName=date("dmYHms") . "_img." . $extension;
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
				//$hex_string = null;
				$errormsg="Could not upload the licence attachment.";
				error_log($errormsg,0);
			}
			
			$select4exval = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
			$count4exval = mysql_num_rows($select4exval);
			if ($count4exval==0)
			{
				
				if(isset($hex_string))
				{
					$insert2 = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
					`user_id`, 
					`license_no`,
					`license_Image`, 
					`validity`, 
					`guide_territory`, 
					`landline_no`, 
					`Best_time_for_contact`,
					`payment_terms`, 
					`Communication_mechanism`,
					`guide_Remarks`,
					`experiance_in_year`,
					`other_experience`,
					`status`, 
					`datecreated`
					) VALUES (
					$userid, 
					'$licenceNumber',
					'$hex_string',
					'$licenceValidty',
					'$guideTerritory',
					'$landLineNumber',
					'$bestTimeToContact',
					'$paymentTerm',
					'$communicationMechanism',
					'$remark'
					'$experianceInYear',
					'$otherExperiance',
					1, 
					now()
					)") or die('Error : ' . mysql_error());
					
					if($insert2)
					{
						$flag2=1;
					}
					else
					{
						$flag2=0;
                        error_log("insert guide detail profile" . mysql_error());
					}
				}
				else
				{
                   $insert2 = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
					`user_id`, 
					`license_no`,
					`validity`, 
					`guide_territory`,
					`landline_no`, 
					`Best_time_for_contact`,
					`payment_terms`, 
					`Communication_mechanism`,
					`guide_Remarks`,
					`experiance_in_year`,
					`other_experience`,
					`status`, 
					`datecreated`
					) VALUES (
					$userid, 
					'$licenceNumber',
					'$licenceValidty',
					'$guideTerritory',
					'$landLineNumber',
					'$bestTimeToContact',
					'$paymentTerm',
					'$communicationMechanism',
					'$remark',
					'$experianceInYear',
					'$otherExperiance',
					1, 
					now()
					)") or die('Error : ' . mysql_error());
                    
					if($insert2)
					{
						$flag2=1;
					}
					else
					{
                        $flag2=0;
                        error_log("insert guide detail profile" . mysql_error());
					}
				}
			}
			else
			{
				
				if(isset($hex_string))
				{
					$update2 = mysql_query("UPDATE `tbl_guide_detail_profile` SET 
					`other_experience` = '$otherExperiance', 
					`experiance_in_year` = '$experianceInYear',
					`license_no`='$licenceNumber',
					`validity`='$licenceValidty', 
					`guide_territory` = '$guideTerritory',
					`license_Image` = '$hex_string',
					`landline_no`='$landLineNumber', 
					`payment_terms`='$paymentTerm',
					`Best_time_for_contact`='$bestTimeToContact', 
					`Communication_mechanism`='$communicationMechanism',
					`guide_Remarks`='$remark',
					`datecreated`=now() 
					WHERE `user_id` = $userid") or die('Error : ' . mysql_error());
					if($update2)
					{
						$flag2=1;
					}
					else
					{
						$flag2=0;
						error_log("Error: ".mysql_error());
					}
				}
				else
				{
					$update2 = mysql_query("UPDATE `tbl_guide_detail_profile` SET 
					`other_experience` = '$otherExperiance', 
					`experiance_in_year` = '$experianceInYear',
					`license_no`='$licenceNumber',
					`validity`='$licenceValidty', 
					`guide_territory` = '$guideTerritory',
					`landline_no`='$landLineNumber', 
					`payment_terms`='$paymentTerm',
					`Best_time_for_contact`='$bestTimeToContact', 
					`Communication_mechanism`='$communicationMechanism',
					`guide_Remarks`='$remark',
					`datecreated`=now() 
					WHERE `user_id` = $userid") or die('Error : ' . mysql_error());
					if($update2)
					{
						$flag2=1;
					}
					else
					{
						$flag2=0;
						error_log("Error: ".mysql_error());
						
					}
				}
			}
			
			if($flag1==1 && $flag2==1)
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
			$msg = "Guide '$emailID' Profile Successfully Updated!!";
			error_log($msg,0);
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_profile.php?id=' . $userid . '');
			
			} 
			else
			{
				
				$msg="Guide '$emailID' Profile update failed!";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				error_log($msg, 0);
				header('Location:guide_profile.php?id=' . $userid . '');
			}
	}
	}
	else
	{
		$errormsg="Unauthenticated access to the Guide edit page, Registration Step 1 is not done";
		error_log($errormsg,0);
		include_once("signOut.php");
        header('Location:registration.php');
	    exit;
	}
?>
