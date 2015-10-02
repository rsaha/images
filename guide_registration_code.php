<?php
	session_start();
	include_once("db.php");
	
	$FirstName=mysql_real_escape_string($_POST['FirstName']);
	$LastName=mysql_real_escape_string($_POST['LastName']);
	$EmailAddress=mysql_real_escape_string($_POST['EmailAddress']);
	$MobileNumber=mysql_real_escape_string($_POST['MobileNumber']);
	$Password=mysql_real_escape_string($_POST['Password']);
		  
	$update=mysql_query("INSERT INTO `tbl_user_profile`(`user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `status`, `datecreated`) VALUES (1, '$Password', '$FirstName', '$LastName', '$EmailAddress', '$MobileNumber', 1, now())");

	if($update)
	{
		$msg="Successfully Updated!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header('Location:guide_registration_2.php');
	}
	else
	{
		$errormsg="Something went wrong, Try again";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
		header('Location:guide_registration_2.php');
	}
?>