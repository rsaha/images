<?php
	session_start();
	if(isset($_SESSION['phase']) && ($_SESSION['phase'] == "signin"))
			{
				header('Location:guided_profile.php?id=' . $_SESSION['userId'] . '');
				exit;
			}
	
	include("db.php");
	$FirstName=mysql_real_escape_string($_POST['FirstName']);
	   
	$LastName=mysql_real_escape_string($_POST['LastName']);
	
	$EA=mysql_real_escape_string($_POST['EmailAddress']);
	if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/i", $EA))
	{
	$EmailAddress = $EA ;
	}

	$MN=mysql_real_escape_string($_POST['MobileNumber']);
	if(preg_match("/^[7-9]{1}\d{9}$/i",$MN))
	{
	$MobileNumber = $MN ;
	}
	
	$Pass=mysql_real_escape_string($_POST['Password']);
	if(preg_match("/^[a-zA-Z_0-9!@#$%^&* ]{6,15}$/i",$Pass))
	{
		$Password = $Pass ;
	}
	
	$create = mysql_query("INSERT INTO tbl_user_profile(user_type_id, user_password, f_name, l_name, email, mobileNo, status, datecreated) VALUES (1, '$Password', '$FirstName', '$LastName', '$EmailAddress', '$MobileNumber', 1, now())");
	
	if($create)
	{
		$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `email`='$EmailAddress' && `mobileNo`='$MobileNumber'");
		$userid = mysql_result($select, 0, 0);
		
		$_SESSION['userId']=$userid;
		$_SESSION['phase'] = "reg";
		
		
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

