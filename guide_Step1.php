<?php
	session_start();
	if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
	{
		$i = $_SESSION['userId'];
		header('Location:guide_profile.php?id='. $i .'');
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
		$username =  mysql_result($select, 0, 3) . " " . mysql_result($select, 0, 4);
		$from=mysql_result($select, 0, 5);
		$mobileNumber = mysql_result($select, 0, 6);
		
		$_SESSION['userId']=$userid;
		$_SESSION['phase'] = "reg";
		
		$errormsg="Guide registered with basic details in registration step 1.";
		error_log($errormsg,0);
		$msg="Successfully Updated!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		
		
				
				$subject    = "Hi " . $username . " , We Welcome you in Guided Gateway"; 
				$message    = "Hi, " . $username . " Thankyou for joining our group, We will open gate of opportunity for you.";
				
				$line = array();
				foreach(file('email_host_address.txt') as $lines) 
				{
					$line[] = $lines;
				}
				
				$hostAddress=trim($line[0]);
				$HostEmail=trim($line[1]);
				$HostPassword=trim($line[2]);
				
				require("/PHPMailer_5.2.0/class.phpmailer.php");

				$mail = new PHPMailer();

				$mail->IsSMTP();                  			// set mailer to use SMTP
				$mail->Host =  $hostAddress;			// specify main and backup server
				$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
				$mail->Username = $HostEmail; 			// SMTP username
				$mail->Password = $HostPassword; 			  	// SMTP password

				$mail->From = $HostEmail;
				$mail->FromName = "Guided Gateway";
				$mail->AddAddress($from, $username);
				
				$mail->WordWrap = 50;                   // set word wrap to 50 characters
				$mail->IsHTML(true);                     // set email format to HTML

				$mail->Subject = "Mail from " . $from . " - " . $subject . ".";
				$mail->Body    ="Email : " . $from . "<br />Subject : <b>" . $subject . "</b><br /><br />" . $message . ".";

				if(!$mail->Send())
				{
				$errormsg="Registration conformation email could not be send.";
				error_log($errormsg,0);
				echo "<script type='text/javascript'>alert('$errormsg');</script>";
				header('Location:guide_registration_2.php?id=' . $userid . '');
				die;
				exit;
				}
				else
				{
				$errormsg="Registration Conformation Email Sent.";
				error_log($errormsg,0);
				$msg="Successfully invited!!";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header('Location:guide_registration_2.php?id=' . $userid . '');
				die;
				exit;
				}
	}
	else
	{
		$errormsg="Something went wrong, Could Not Register. Try again";
		error_log($errormsg,0);
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
		header('Location:guide_registration_1.php');
	}
?>

