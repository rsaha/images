<?php
	session_start();
	include('db.php');
	if(isset($_GET['id']))
	{
	$userid = $_GET['id'];
	}
	$select1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
			$username =  mysql_result($select1, 0, 3) . " " . mysql_result($select1, 0, 4);
			$from=mysql_result($select1, 0, 5);
			$mobileNumber = mysql_result($select1, 0, 6);
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
			
			
		include('sendEmail.php');
		$HostEmail = parse_ini_file('config.ini',true)['email'];
		$subject = "Guide " . $username . "has envited his some friends";
		$message    = "<b>". $username . "</b> has invited his friends of following email id...<b><br />" . $emailaddresses . "</b><br /><br /> -----------------------------<br />";
		
		//function SendMail(apiKey, fromAddress, fromName, toAddress, toName, subject, message)
		if(SendMail($HostEmail, 'GuidedGateway', 'touchus@xmapledatalab.com', 'Guided Gateway Support', $subject, $message))
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


