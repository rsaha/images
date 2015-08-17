<?php

				$line = array();
				foreach(file('email_host_address.txt') as $lines) 
				{
					$line[] = $lines;
				}
				
				$hostAddress=trim($line[0]);
				$HostEmail=trim($line[1]);
				$HostPassword=trim($line[2]);
				require("PHPMailer_5.2.0/class.phpmailer.php");

				$mail = new PHPMailer();

				$mail->IsSMTP();                  			// set mailer to use SMTP
				$mail->Host =  $hostAddress;			// specify main and backup server
				$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
				$mail->Username = $HostEmail; 			// SMTP username
				$mail->Password = $HostPassword; 			  	// SMTP password

				$mail->From = $HostEmail;
				$mail->FromName = $username;
				
				$mail->AddAddress($emailFriend1, $emailFriend1);
				
				
                $message    = "Hi ".$nameFriend1.",<br/> You guide friend ".$username." registered with Guided Gateway and also inviting you to <a href=http://guide.guidedgateway.com>register</a> with it for a better earning potential from tourists through an integrated service offering. This is absolutely free. <br/>br/>. <a href=http://guide.guidedgateway.com/howitworks_guide.html>Learn more</a>.<br/><br/> Thanks,<br/> Guided Gateway Team - online service just for you";
                
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