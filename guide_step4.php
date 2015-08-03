<?php
	session_start();
	echo "<script type='text/javascript'>alert('ram1');</script>";
	include("db.php");
	if(isset($_SESSION['userId']))
	{
		echo "<script type='text/javascript'>alert('1');</script>";
		if(isset($_POST['userid']))
		{
			echo "<script type='text/javascript'>alert('2');</script>";
			$userid=mysql_real_escape_string($_POST['userid']);
		}
		if($_SESSION['userId']!=$userid)
		{
			echo "<script type='text/javascript'>alert('3');</script>";
			/* header('Location:guide_registration_1.php');
			exit; */
		}
		else
		{
			$line = array();
				foreach(file('email_host_address.txt') as $lines) 
				{
					$line[] = $lines;
				}
				
				$hostAddress=$line[0];
				$HostEmail=$line[1];
				$HostPassword=$line[2];
				echo "<script type='text/javascript'>alert('$hostAddress');</script>";
				echo "<script type='text/javascript'>alert('$HostEmail');</script>";
				echo "<script type='text/javascript'>alert('$HostPassword');</script>";
			
			
			$emailFriend1=mysql_real_escape_string($_POST['emailFriend1']);
			$emailFriend2=mysql_real_escape_string($_POST['emailFriend2']);
			$emailFriend3=mysql_real_escape_string($_POST['emailFriend3']);
			
		/* $EA1=mysql_real_escape_string($_POST['emailFriend1']);
		  if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/i", $EA1)) {
		    $emailFriend1 = $EA1 ;
			$create1 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend1', '', 1, now())");
			}
		$EA2=mysql_real_escape_string($_POST['emailFriend2']);
		if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/i", $EA2)) {
		    $emailFriend2 = $EA2 ;
			$create2 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend1', '', 1, now())");
			}
		$EA3=mysql_real_escape_string($_POST['emailFriend3']);
		if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/i", $EA3)) {
		    $emailFriend3 = $EA3 ;
			$create3 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend1', '', 1, now())");
			} */
			
			if($emailFriend1!="" || $emailFriend1!=NULL)
			{
			$create1 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend1', '', 1, now())");
			}
			if($emailFriend2!="" || $emailFriend2!=NULL)
			{
			$create2 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend2', '', 1, now())");
			}
			if($emailFriend3!="" || $emailFriend3!=NULL)
			{
			$create3 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend3', '', 1, now())");
			}
			
			if($create1 || $create2 || $create3)
			{
				
				$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
				$username =  mysql_result($select, 0, 3) . " " . mysql_result($select, 0, 4);
				$from=mysql_result($select, 0, 5);
				$mobileNumber = mysql_result($select, 0, 6);
				
				$subject    = "Hi, I am " . $username . " inviting you to join for free"; 
				$message    = "Hi, I am " . $username . " inviting you to join for free";
				
				
				
				
				require("\PHPMailer_5.2.0\class.phpmailer.php");

				$mail = new PHPMailer();

				$mail->IsSMTP();                  			// set mailer to use SMTP
				$mail->Host =  "199.168.191.130";			// specify main and backup server
				$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
				$mail->Username = "contact@waltrump.com"; 	// SMTP username
				$mail->Password = "tarzan567"; 			  	// SMTP password

				$mail->From = "contact@waltrump.com";
				$mail->FromName = $username;
				if($create1)
				{
				$mail->AddAddress($emailFriend1, $emailFriend1);
				}
				if($create2)
				{
				$mail->AddAddress($emailFriend2, $emailFriend2);
				}
				if($create3)
				{
				$mail->AddAddress($emailFriend3, $emailFriend3);
				}
				
				$mail->WordWrap = 50;                   // set word wrap to 50 characters
				$mail->IsHTML(true);                     // set email format to HTML

				$mail->Subject = "Mail from " . $from . " - " . $subject . ".";
				$mail->Body    ="Email : " . $from . "<br />Subject : <b>" . $subject . "</b><br /><br />" . $message . ".";

				if(!$mail->Send())
				{
				unset($_SESSION['userId']);
				$errormsg="Something went wrong, Try again";
				echo "<script type='text/javascript'>alert('$errormsg');</script>";
				//header('Location: guided_profile.php?id=' . $userid . '');
				die;
				exit;
				}
				else
				{
				//unset($_SESSION['userId']);
				$msg="Successfully invited!!";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				/* header('Location: acknowledgeMail.php?id=' . $userid . '');
				die;
				exit; */
				}
			}
			else
			{
				echo "<script type='text/javascript'>alert('5');</script>";
			///header('Location: guided_profile.php?id=' . $userid . '');
			exit;
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('6');</script>";
		//header('Location:guide_registration_1.php');
		//exit;
	}
?>