<?php
	session_start();
	include_once('db.php');
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
			
			
		include_once('sendEmail.php');
		$HostEmail = parse_ini_file('config.ini',true)['email'];
		$subject = "Guide " . $username . " has invited some friends";
		$message    = "<b>". $username . "</b> has invited some friends :<b><br />" . $emailaddresses . "</b><br /><br /> -----------------------------<br />";
		
		//function SendMail(fromAddress, fromName, toAddress, toName, subject, message)
		if(SendMail($HostEmail, 'GuidedGateway', 'ankitbhagat.ab@gmail.com', 'Ankit Bhagat', $subject, $message))
		//if(SendMail($HostEmail, 'GuidedGateway', 'support@guidedgateway.com', 'Guided Gateway Support', $subject, $message))
		{
			$errormsg="Acknowledgement email sent.";
			error_log($errormsg,0);
			header('Location: guide_profile.php?id='. $userid .'');
			die;
		}
		else
		{
			$errormsg="Acknowledgement email could not be send.";
			error_log($errormsg,0);
			header('Location: guide_profile.php?id='. $userid .'');
			exit;
		}
?>


