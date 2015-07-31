<?php
	session_start();
    include("db.php");
	
	if(isset($_SESSION['userId']))
	{
	if(isset($_POST['userid']))
	{
	$userid=mysql_real_escape_string($_POST['userid']);
	}
	if($_SESSION['userId']!=$userid)
	{
		header('Location:guide_registration_1.php');
	}
	else
	{
	$Gender=mysql_real_escape_string($_POST['Gender']);
	
	$DOB=mysql_real_escape_string($_POST['DOB']);
	if($DOB=="")
	{
		$DOB="1987-06-28";
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
		$licenceexpiry="2020-06-28";
	}
	
	$licenceImage=mysql_real_escape_string($_POST['licenceImage']);
	
	$landlinenumber=mysql_real_escape_string($_POST['landlinenumber']);
	
	$contacttime=mysql_real_escape_string($_POST['contacttime']);
	
	$paymentcurrency=mysql_real_escape_string($_POST['paymentcurrency']);
	
	$paymentterms=mysql_real_escape_string($_POST['paymentterms']);
	
	$communicationmechanism= mysql_real_escape_string($_POST['communicationmechanism']);
	
	$coverpicture=mysql_real_escape_string($_POST['coverpicture']);
	
	$profilepicture=mysql_real_escape_string($_POST['profilepicture']);
	
	
	include("db.php");
	
	$update = mysql_query("UPDATE `tbl_user_profile` SET `gender`='$Gender', `d_o_b`=$DOB, `street_address`='$streetaddress', `city`='$city', `state`='$state', `country`='$country', `datecreated`=now() WHERE `user_id`=$userid");
	
	if($update)
	{
		
	$create = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
	`user_id`, 
	`nick_name`, 
	`license_no`, 
	`validity`, 
	`landline_no`, 
	`Best_time_for_contact`,
	`payment_currency`, 
	`payment_terms`, 
	`Communication_mechanism`, 
	`status`, 
	`datecreated`
	) VALUES (
	$userid, 
	'$nickname', 
	'$licencenumber',
	$licenceexpiry,
	'$landlinenumber',
	'$contacttime',
	'$paymentcurrency',
	'$paymentterms',
	'$communicationmechanism',
	1, 
	now()
	)");
	}
	
	if($create)
	{
		echo "<script type='text/javascript'>alert('created');</script>";
		$_session['login']="true";
		$msg="Successfully Updated!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header('Location:guide_registration_3.php?id=' . $userid . '');
	}
	else
	{
		$errormsg="Something went wrong, Try again";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
	}
	}
	}
	else
	{
	header('Location:guide_registration_1.php');	
	}
?>