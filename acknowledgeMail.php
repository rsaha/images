<?php
	session_start();
	include('db.php');
	if(isset($_GET['id']))
	{
	$userid = $_GET['id'];
	}
	$select1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
	$row = mysql_fetch_assoc($select1);
		
			$firstName =  $row["f_name"];
		$lastName =  $row["l_name"];
		$username =  $firstName . " " . $lastName;
			$from=$row["email"];
			$mobileNumber = $row["mobileNo"];
			$emailaddresses="";
			$select2 = mysql_query("SELECT * FROM `tbl_referrals` WHERE `referrer_id` = $userid");
			$num_rows = mysql_num_rows($select2);
			if($_SESSION['phase'] == "reg")
			{
				for($i=0;$i<$num_rows;$i++)
				{
					$emailaddresses = $emailaddresses . "<br />" . mysql_result($select2, $i, 3);
				}
			}
			if($_SESSION['phase'] == "signin")
			{
				$emailaddresses = $emailaddresses . "<br />" . mysql_result($select2, ($num_rows-1), 3);
			}
			
		
		$smtpAddress = parse_ini_file('config.ini',true)['smtpAddress'];
		$HostEmail = parse_ini_file('config.ini',true)['email'];
		$HostPassword = parse_ini_file('config.ini',true)['password'];
		$apiKey = parse_ini_file('config.ini',true)['apiKey'];
		
		include('sendEmail.php');
		$subject = "Guide " . $username . " has envited his some friends";
		$message    = "<b>". $username . "</b> has invited his friends of following email id...<b><br />" . $emailaddresses . "</b><br /><br /> -----------------------------<br />";
		
		//function SendMail(apiKey, fromAddress, fromName, toAddress, toName, subject, message)
		//if((SendMail($apiKey, $HostEmail, 'Guided Gateway', 'ankitbhagat.ab@gmail.com', 'Ankit Bhagat', $subject, $message))&& (SendMail($apiKey, $HostEmail, 'Guided GateWay', 'rshah@xmapledatalab.com', 'Rakesh Shah', $subject, $message)))
		if(SendMail($apiKey, $HostEmail, 'Guided Gateway', 'ankitbhagat.ab@gmail.com', 'Ankit Bhagat', $subject, $message))
		{
			$errormsg="Acknowledgement email sent.";
			error_log($errormsg,0);
			echo "<script>
			alert('Thank you for contacting us. As early as possible  we will contact you.');
			</script>";
			header('Location: guide_profile.php?id='. $userid .'');
			die;
		}
		else
		{
			$errormsg="Acknowledgement email could not be send.";
			echo "<script>
			alert('Sorry! mail could not be sent at this moment. Please try again!');
			</script>";
			header('Location: guide_profile.php?id='. $userid .'');
			exit;
		}
?>


