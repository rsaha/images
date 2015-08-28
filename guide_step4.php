<?php
	session_start();
	include("db.php");
	if((isset($_SESSION['userId'])) && (($_SESSION['phase'] == "reg")||($_SESSION['phase'] == "signin")))
	{
		if(isset($_POST['userid']))
		{
			$userid=mysql_real_escape_string($_POST['userid']);
		}
		if($_SESSION['userId']!=$userid)
		{
			$errormsg="Unauthenticated access to the step 4 page, Registraion Step 1 is not done";
				error_log($errormsg,0);
			include("signOut.php");
			header('Location:guide_registration_1.php');
			exit;
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
			
			
			if(isset($_POST['nameFriend1']))
			{
				$nameFriend1=mysql_real_escape_string($_POST['nameFriend1']);
			}
			if(isset($_POST['nameFriend2']))
			{
				$nameFriend2=mysql_real_escape_string($_POST['nameFriend2']);
			}
			if(isset($_POST['nameFriend3']))
			{
				$nameFriend3=mysql_real_escape_string($_POST['nameFriend3']);
			}
			
			if(isset($_POST['emailFriend1']))
			{
				$emailFriend1=mysql_real_escape_string($_POST['emailFriend1']);
			}
			if(isset($_POST['emailFriend2']))
			{
				$emailFriend2=mysql_real_escape_string($_POST['emailFriend2']);
			}
			if(isset($_POST['emailFriend3']))
			{
				$emailFriend3=mysql_real_escape_string($_POST['emailFriend3']);
			}
			
			if(isset($_POST['mobileFeiend1']))
			{
				$mobileFeiend1=mysql_real_escape_string($_POST['mobileFeiend1']);
			}
			if(isset($_POST['mobileFeiend2']))
			{
				$mobileFeiend2=mysql_real_escape_string($_POST['mobileFeiend2']);
			}
			if(isset($_POST['mobileFeiend3']))
			{
				$mobileFeiend3=mysql_real_escape_string($_POST['mobileFeiend3']);
			}
			
			
		
			
			if($emailFriend1!="" || $emailFriend1!=NULL)
			{
			$create1 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '$nameFriend1', '$emailFriend1', '$mobileFeiend1', 1, now())");
			}
			if($emailFriend2!="" || $emailFriend2!=NULL)
			{
			$create2 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '$nameFriend2', '$emailFriend2', '$mobileFeiend2', 1, now())");
			}
			if($emailFriend3!="" || $emailFriend3!=NULL)
			{
			$create3 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '$nameFriend3', '$emailFriend3', '$mobileFeiend3', 1, now())");
			}
			
            #This step needs to be repeated for each invite friend - can't invite all of them in smae email
			if($create1 || $create2 || $create3)
			{
				
				$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
				$username =  mysql_result($select, 0, 3) . " " . mysql_result($select, 0, 4);
				$from=mysql_result($select, 0, 5);
				$mobileNumber = mysql_result($select, 0, 6);
				
				$subject    = $username . " invited you to register with Guided Gateway - online marketplace for Guides in India"; 
								
				$line = array();
				foreach(file('email_host_address.txt') as $lines) 
				{
					$line[] = $lines;
				}
				
				$hostAddress=trim($line[0]);
				$HostEmail=trim($line[1]);
				$HostPassword=trim($line[2]);
				
				$nameFriend=array();
				$emailFriend=array();
				$mobileFeiend=array();
				
				if($create1)
				{
					array_push($nameFriend, $nameFriend1);
					array_push($emailFriend, $emailFriend1);
					array_push($mobileFeiend, $mobileFeiend1);
				}
				if($create2)
				{
					array_push($nameFriend, $nameFriend2);
					array_push($emailFriend, $emailFriend2);
					array_push($mobileFeiend, $mobileFeiend2);
				}
				if($create3)
				{
					array_push($nameFriend, $nameFriend3);
					array_push($emailFriend, $emailFriend3);
					array_push($mobileFeiend, $mobileFeiend3);
				}
				
				$sentSuccess=0;
				require("PHPMailer_5.2.0/class.phpmailer.php");
				for ($x=0 ; $x<=count($emailFriend) ; $x++)
				{
					$mail = new PHPMailer();

					$mail->IsSMTP();                  			// set mailer to use SMTP
					$mail->Host =  $hostAddress;			// specify main and backup server
					$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
					$mail->Username = $HostEmail; 			// SMTP username
					$mail->Password = $HostPassword; 			  	// SMTP password

					$mail->From = $HostEmail;
					$mail->FromName = $username;
					$mail->AddAddress($emailFriend[$x], $emailFriend[$x]);
					
					
					$message    = "Hi ".$nameFriend[$x].",<br/> You guide friend ".$username." registered with Guided Gateway and also inviting you to <a href=http://guide.guidedgateway.com>register</a> with it for a better earning potential from tourists through an integrated service offering. This is absolutely free. <br/><br/>. <a href=http://guide.guidedgateway.com/howitworks_guide.html>Learn more</a>.<br/><br/> Thanks,<br/> Guided Gateway Team - online service just for you";
					
					$mail->WordWrap = 50;                   // set word wrap to 50 characters
					$mail->IsHTML(true);                     // set email format to HTML

					$mail->Subject = "Mail from " . $from . " - " . $subject . ".";
					$mail->Body    ="Email : " . $from . "<br />Subject : <b>" . $subject . "</b><br /><br />" . $message . ".";

					if(!$mail->Send())
					{
						if($sentSuccess==0)
						{
						$sentSuccess=0;
						}
					}
					else
					{
						$sentSuccess=1;
					}
				}
				if($sentSuccess==0)
				{
					unset($_SESSION['userId']);
					$errormsg="Referring to the friend email could not be send.";
					error_log($errormsg,0);
					$msg="Something Went Wrong!!";
					echo "<script type='text/javascript'>alert('$msg');</script>";
					header('Location: guide_profile.php?id=' . $userid . '');
					die;
					exit;
				}
				if($sentSuccess==1)
				{
					$_SESSION['notification']="Congratulation! welcome to your profile, you are now registered with us.";
					$errormsg="Referring to friend Email Sent.";
					error_log($errormsg,0);
					$msg="Successfully invited!!";
					echo "<script type='text/javascript'>alert('$msg');</script>";
					header('Location: acknowledgeMail.php?id=' . $userid . '');
					die;
					exit;
				}
				
			}
			else
			{
				$_SESSION['notification']="Congratulation! welcome to your profile, you are now registered with us.";
				header('Location: guide_profile.php?id=' . $userid . '');
				exit;
			}
		}
	}
	else
	{
		$errormsg="Unauthenticated access to the step 4 page, Registraion Step 1 is not done";
		error_log($errormsg,0);
		include("signOut.php");
		header('Location:guide_registration_1.php');
		exit;
	}
?>