<?php
	session_start();
	
	include("db.php");
	$FirstName=mysql_real_escape_string($_POST['FirstName']);
	$LastName=mysql_real_escape_string($_POST['LastName']);
	$EmailAddress=mysql_real_escape_string($_POST['EmailAddress']);
	$MobileNumber = mysql_real_escape_string($_POST['MobileNumber']);
	$Password = mysql_real_escape_string($_POST['Password']); 
		 
		$create = mysql_query("INSERT INTO `tbl_user_profile`(`user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `status`, `datecreated`) VALUES (1, '$Password', '$FirstName', '$LastName', '$EmailAddress', '$MobileNumber', 1, now())");
		
		if($create)
		{
			$select = mysql_query("SELECT * FROM ` tbl_user_profile` WHERE `email`='$EmailAddress' && `mobileNo`='$MobileNumber'");
			$userid = mysql_result($select, 0, 0);
			
			$_SESSION["userReg"]=$userid;
			
			$msg="Successfully Updated!!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_registration_2.php?id=' . $userid . '');
		}
		else
		{
			$errormsg="Something went wrong, Try again";
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
			header('Location:guide_registration_1.php');
		}
?>

