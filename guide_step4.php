<?php
	session_start();
	include("db.php");
	$userid=mysql_real_escape_string($_POST['userid']);
	$emailFriend1=mysql_real_escape_string($_POST['emailFriend1']);
	$emailFriend2=mysql_real_escape_string($_POST['emailFriend2']);
	$emailFriend3=mysql_real_escape_string($_POST['emailFriend3']);
	
		 
		$create1 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend1', '', 1, now())");
		if($create1)
		{
			$create2 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend2', '', 1, now())");
		}
		if($create2)
		{
			$create3 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '', '$emailFriend3', '', 1, now())");
		}
		
		if($create3)
		{
			$select = mysql_query("SELECT * FROM ` tbl_user_profile` WHERE `user_id` = $userid");
			$username =  mysql_result($select, 0, 3) . " " . mysql_result($select, 0, 4);
			$from=mysql_result($select, 0, 5);
			$mobileNumber = mysql_result($select, 0, 6);
			
			$subject    = "Hi, I am " . $username . " inviting you to join for free"; 
			$message    = "Hi, I am " . $username . " inviting you to join for free";
			
			require("\PHPMailer_5.2.0\class.phpmailer.php");

			$mail = new PHPMailer();

			$mail->IsSMTP();                  			// set mailer to use SMTP
			$mail->Host = "199.168.191.130";  			// specify main and backup server
			$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
			$mail->Username = "contact@waltrump.com"; 	// SMTP username
			$mail->Password = "tarzan567"; 			  	// SMTP password

			$mail->From = "contact@waltrump.com";
			$mail->FromName = $username;
			$mail->AddAddress($emailFriend1, $emailFriend1);
			$mail->AddAddress($emailFriend2, $emailFriend2);
			$mail->AddAddress($emailFriend3, $emailFriend3);

			$mail->WordWrap = 50;                        // set word wrap to 50 characters
			$mail->IsHTML(true);                         // set email format to HTML

			$mail->Subject = "Mail from " . $from . " - " . $subject . ".";
			$mail->Body    ="Email : " . $from . "<br />Subject : <b>" . $subject . "</b><br /><br />" . $message . ".";

			if(!$mail->Send())
			{
				header("Location: acknowledgeMail.php");
				exit;
			}
			header('Location: acknowledgeMail.php?id=' . $userid . '');
			die;
			
			
			$msg="Successfully Updated!!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:acknowledgeMail.php?id=' . $userid . '');
		}
		else
		{
			$errormsg="Something went wrong, Try again";
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
		}
?>