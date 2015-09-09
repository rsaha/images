<?php
			session_start();
			include("db.php");
			if(isset($_POST['nameFriend']))
			{
				$nameFriend=mysql_real_escape_string($_POST['nameFriend']);
			}
			
			if(isset($_POST['emailFriend']))
			{
				$emailFriend=mysql_real_escape_string($_POST['emailFriend']);
			}
			
			if(isset($_POST['mobileFeiend']))
			{
				$mobileFeiend=mysql_real_escape_string($_POST['mobileFeiend']);
			}
			
			if($emailFriend!="" || $emailFriend!=NULL)
			{
			$create1 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '$nameFriend', '$emailFriend', '$mobileFeiend', 1, now())");
			}
			

				$smtpAddress = parse_ini_file('config.ini',true)['smtpAddress'];
				$username = parse_ini_file('config.ini',true)['email'];
				$password = parse_ini_file('config.ini',true)['password'];
				
				require("PHPMailer_5.2.0/class.phpmailer.php");

				$mail = new PHPMailer();

				$mail->IsSMTP();                  			// set mailer to use SMTP
				$mail->Host =  $smtpAddress;			// specify main and backup server
				$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
				$mail->Username = $username; 			// SMTP username
				$mail->Password = $password; 			  	// SMTP password

				$mail->From = $HostEmail;
				$mail->FromName = $username;
				
				$mail->AddAddress($emailFriend, $nameFriend);
				
				
                $message    = "Hi ".$nameFriend.",<br/> You guide friend ".$username." registered with Guided Gateway and also inviting you to <a href=http://www.guidedgateway.com>register</a> with it for a better earning potential from tourists through an integrated service offering. This is absolutely free. <br/>br/>. <a href=http://guide.guidedgateway.com/howitworks_guide.html>Learn more</a>.<br/><br/> Thanks,<br/> Guided Gateway Team - online service just for you";
                
				$mail->WordWrap = 50;                   // set word wrap to 50 characters
				$mail->IsHTML(true);                     // set email format to HTML

				$mail->Subject = "Mail from " . $from . " - " . $subject . ".";
				$mail->Body    ="Email : " . $from . "<br />Subject : <b>" . $subject . "</b><br /><br />" . $message . ".";

				if(!$mail->Send())
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
				
				?>