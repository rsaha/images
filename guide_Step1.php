<?php
	session_start();
	if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
	{
		$i = $_SESSION['userId'];
		header('Location:guide_profile.php?id='. $i .'');
		exit;
	}

	
	include_once("db.php");
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
		$Password = md5($Pass) ;
	}
	$Sel = mysql_query("SELECT * FROM `tbl_user_type` WHERE `user_type_name`='GUIDE'");
	$counter = mysql_num_rows($Sel);
	if($counter == 1)
	{
		$row4 = mysql_fetch_array($Sel);
		$user_type_id = $row4["user_type_id"];
		echo '<script>alert(' . $user_type_id . ')</script>';
	}
	
	$create = mysql_query("INSERT INTO tbl_user_profile(user_type_id, user_password, f_name, l_name, email, mobileNo, status, datecreated) VALUES ($user_type_id, '$Password', '$FirstName', '$LastName', '$EmailAddress', '$MobileNumber', 1, now())");
	
	if($create)
	{
		$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `email`='$EmailAddress' && `mobileNo`='$MobileNumber'");
		$row = mysql_fetch_assoc($select);
		$userid = $row["user_id"];
		$firstName =  $row["f_name"];
		$lastName =  $row["l_name"];
		$username =  $firstName . " " . $lastName;
		$from=$row["email"];
		$mobileNumber = $row["mobileNo"];
		
		$_SESSION['userId']=$userid;
		$_SESSION['phase'] = "reg";
		
		$errormsg="Guide registered with basic details in registration step 1.";
		error_log($errormsg,0);
		$msg="Successfully Updated!!";
		//echo "<script type='text/javascript'>alert('$msg');</script>";
		
		//$smtpAddress = parse_ini_file('config.ini',true)['smtpAddress'];
		$HostEmail = parse_ini_file('config.ini',true)['email'];
		//$HostPassword = parse_ini_file('config.ini',true)['password'];
		$apiKey = parse_ini_file('config.ini',true)['emailApiKey'];
        $templateId = parse_ini_file('config.ini',true)['welcomeTemplateId'];
		
		$subject = $username . " : Welcome to Guided Gateway - online marketplace for you";
		
		
		include_once('sendEmail.php');

		$emailSuccess = SendMailTemplate($HostEmail, 'Guided Gateway', $from, $username, $subject, $templateId);
        
		if($emailSuccess)
		{
			$tempSub = 'New Guide "' . $username . '" Registered in Guidedgateway';
			$tempMsg = 'Hi Admin<br>New guide with the following details registered just now... <br><br>Name : ' . $username . ' <br>Email : ' . $from . '<br>Mobile Number : ' . $mobileNumber . '';
			//$s = SendMail($HostEmail, 'Guided GateWay', 'ankitbhagat.ab@gmail.com', 'Ankit Bhagat', $tempSub, $tempMsg);
			$s = SendMail($HostEmail, 'Guided GateWay', 'support@guidedgateway.com', 'Rakesh Saha', $tempSub, $tempMsg);
			$errormsg="Registration Confirmation Email Sent.";
			error_log($errormsg,0);
			$msg="Confirmation Email Sent!!";
			//echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_registration_2.php?id=' . $userid . '');
			die;
			exit;
		}
		else
		{
			$errormsg="Registration confirmation email could not be send.";
			error_log($errormsg,0);
			//echo "<script type='text/javascript'>alert('$errormsg');</script>";
			header('Location:guide_registration_2.php?id=' . $userid . '');
			die;
			exit;
		}
	}
	else
	{
		$_SESSION['notification']="Email or Mobile Number already Exist.";
		$errormsg="Something went wrong, Could Not Register. Try again";
		error_log($errormsg,0);
		//echo "<script type='text/javascript'>alert('$errormsg');</script>";
		header('Location:guide_registration_1.php');
	}
?>

