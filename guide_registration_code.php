<?php
	session_start();
	include("db.php");
	
	$FirstName=mysql_real_escape_string($_POST['FirstName']);
	$LastName=mysql_real_escape_string($_POST['LastName']);
	$EmailAddress=mysql_real_escape_string($_POST['EmailAddress']);
	$MobileNumber=mysql_real_escape_string($_POST['MobileNumber']);
	$Password=mysql_real_escape_string($_POST['Password']);
	$DateOfBirth=mysql_real_escape_string($_POST['Byear'])." ".mysql_real_escape_string($_POST['Bday'])." ".mysql_real_escape_string($_POST['Bmonth'])." 00 00 00";
	$Gender=mysql_real_escape_string($_POST['Gender']);
	$StreetAddress=mysql_real_escape_string($_POST['StreetAddress']);
	$City=mysql_real_escape_string($_POST['City']);
	$State=mysql_real_escape_string($_POST['State']);
	$Country=mysql_real_escape_string($_POST['Country']);
	  
	$update=mysql_query("INSERT INTO ` tbl_user_profile`(`user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `status`, `datecreated`) VALUES (1, '$Password', '$FirstName', '$LastName', '$EmailAddress', '$MobileNumber',  '$Gender', STR_TO_DATE('$DateOfBirth','%Y %m %d %h:%i:%s'), '$StreetAddress', '$City', '$State', '$Country', 1, now())");

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