<?php
session_start();

	if(isset($_SESSION['userId']))
	{
	if(isset($_POST['userid']))
	{
	  $userid=$_POST['userid'];
	}
	if($_SESSION['userId']!=$userid)
	{
		session_destroy();
        header('Location:guide_registration_1.php');
	}
	else
	{
			$firstName=mysql_real_escape_string($_POST['firstName']);
			$lastName=mysql_real_escape_string($_POST['lastName']);
			$emailID = mysql_real_escape_string($_POST['emailID']);
			$mobileNumber = mysql_real_escape_string($_POST['mobileNumber']);
			$gender = mysql_real_escape_string($_POST['gender']);
			$birthday = mysql_real_escape_string($_POST['birthday']);
			$streetAddress = mysql_real_escape_string($_POST['streetAddress']);
			$city = mysql_real_escape_string($_POST['city']);
			$state = mysql_real_escape_string($_POST['state']);
			$country = mysql_real_escape_string($_POST['country']);

			//$profilePicture = mysql_real_escape_string($_POST['profilePicture']);
			//$coverPicture = mysql_real_escape_string($_POST['coverPicture']);
			//$licenceImage = mysql_real_escape_string($_POST['licenceImage']);
			$licenceNumber = mysql_real_escape_string($_POST['licenceNumber']);
			$licenceValidty = mysql_real_escape_string($_POST['licenceValidty']);
			$summary = mysql_real_escape_string($_POST['summary']);
			$experiance = mysql_real_escape_string($_POST['experiance']);
			$intrest = mysql_real_escape_string($_POST['intrest']);
			$landLineNumber = mysql_real_escape_string($_POST['landLineNumber']);
			$paymentCurrency = mysql_real_escape_string($_POST['paymentCurrency']);
			$paymentTerm = mysql_real_escape_string($_POST['paymentTerm']);
			$bestTimeToContace = mysql_real_escape_string($_POST['bestTimeToContace']);
			$communicationMechanism = mysql_real_escape_string($_POST['communicationMechanism']);
			$remark = mysql_real_escape_string($_POST['remark']);

			include("db.php");
			
			$update1 = mysql_query("UPDATE `tbl_user_profile` SET `f_name`='$firstName', `l_name`='$lastName', `email`='$emailID', 
			`mobileNo`='$mobileNumber, `gender`='$gender', `d_o_b`=$birthday, `street_address`='$streetAddress', `city`='$city', 
			`state`='$state', `country`='$country', `datecreated`=now() WHERE `user_id` = $userid");
			
			if($update1)
			{
				echo "<script type='text/javascript'>alert('update1 run');</script>";
			$update2 = mysql_query("UPDATE `tbl_guide_detail_profile` SET `license_no`='$licenceNumber',`validity`=$licenceValidty,
			`guide_summary`='$summary',`guide_experience`='$experiance',`guide_interest`='$intrest',`landline_no`='$landLineNumber',
			`payment_currency`='$paymentCurrency',`payment_terms`='$paymentTerm',`Best_time_for_contact`='$bestTimeToContace',
			`Communication_mechanism`='$communicationMechanism',`guide_Remarks`='$remark',`datecreated`=now() WHERE `user_id` = $userid");
			}
			 if($update1)
			{
			$msg="Successfully Updated!!";
            error_log("Guide '$emailID' Profile '$msg'");
			echo "<script type='text/javascript'>alert('$msg');</script>";
			//header('Location:guided_profile.php?id=' . $userid . '');
			
			} 
			else{
				error_log("Guide '$emailID' Profile update failed");
			    echo "<script type='text/javascript'>alert('$msg');</script>";
			}
	}
	}
	else
	{
        session_destroy();
	    header('Location:guide_registration_1.php');
	    exit;
	}
?>
