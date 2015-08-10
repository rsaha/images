<?php
	session_start();
    include("db.php");
	
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
			include("signOut.php");
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
			
			$city=mysql_real_escape_string($_POST['city']);
			
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
			
			include("db.php");
			$update = mysql_query("UPDATE `tbl_user_profile` SET `gender`='$Gender', `d_o_b`=$DOB, `street_address`='$streetaddress', `city`='$city', `state`='$state', `country`='$country', `datecreated`=now() WHERE `user_id`=$userid");
		
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["licenceImage"]["name"]);
			$file_extension = end($temporary);
			if (
			(
			($_FILES["licenceImage"]["type"] == "image/png") || 
			($_FILES["licenceImage"]["type"] == "image/jpg") || 
			($_FILES["licenceImage"]["type"] == "image/jpeg")
			) && 
			($_FILES["licenceImage"]["size"] < 10000000) && 
			in_array($file_extension, $validextensions)
			)
			{
				if ($_FILES["licenceImage"]["error"] > 0)
				{
				echo "Return Code: " . $_FILES["licenceImage"]["error"] . "<br/><br/>";
				} 
				else 
				{
					echo "hello";
					$newName=date("dmYHms") . "_img." . $file_extension;
					move_uploaded_file($_FILES["licenceImage"]["tmp_name"], "upload/" . $newName);
					$bin_string = file_get_contents( "upload/" . $newName);
					$hex_string = base64_encode($bin_string);
					$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "upload/" . $newName;
				}
			} 
			else 
			{
				$errormsg="Could not upload the licence attachment.";
				error_log($errormsg,0);
			}
			
			$upl=0;
			$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
			$count = mysql_num_rows($select);
			if($count==0)
			{
				$create = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
				`user_id`, 
				`nick_name`, 
				`license_no`,
				`license_Image`,	
				`validity`, 
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
				$licenceexpiry,
				'$landlinenumber',
				'$contacttime',
				'$paymentterms',
				'$communicationmechanism',
				1, 
				now()
				)");
				if($create)
				{
					$upl=1;
				}
			}
			else
			{
				$update2 = mysql_query("UPDATE `tbl_guide_detail_profile` SET 
				`nick_name` = '$nickname', 
				`license_no` = '$licencenumber',
				`license_Image` = '$hex_string',	
				`validity` = $licenceexpiry, 
				`landline_no` = '$landlinenumber', 
				`Best_time_for_contact` = '$contacttime',
				`payment_terms` = '$paymentterms', 
				`Communication_mechanism` = '$communicationmechanism',
				`datecreated` = now()
				WHERE `user_id` = $userid");
				
				if($update2)
				{
				$upl=1;
				}
			}
				
		
			if($update || $upl == 1)
			{
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
     include("signOut.php");
	header('Location:guide_registration_1.php');	
	}
?>