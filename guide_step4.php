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
			
			$create1 = $create2 = $create3 = 0;
		
			if(isset($emailFriend1))
			{
				if($emailFriend1!="" || $emailFriend1!=NULL)
				{
					$create1 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '$nameFriend1', '$emailFriend1', '$mobileFeiend1', 1, now())");
				}
			}
			if(isset($emailFriend2))
			{
				if($emailFriend2!="" || $emailFriend2!=NULL)
				{
					$create2 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '$nameFriend2', '$emailFriend2', '$mobileFeiend2', 1, now())");
				}
			}
			if(isset($emailFriend3))
			{
				if($emailFriend3!="" || $emailFriend3!=NULL)
				{
					$create3 = mysql_query("INSERT INTO `tbl_referrals`(`referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES ($userid, '$nameFriend3', '$emailFriend3', '$mobileFeiend3', 1, now())");
				}
			}
			
            #This step needs to be repeated for each invite friend - can't invite all of them in smae email
			if($create1 || $create2 || $create3)
			{
				
				$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
				$row = mysql_fetch_assoc($select);
				$firstName =  $row["f_name"];
				$lastName =  $row["l_name"];
				$username =  $firstName . " " . $lastName;
				$from=$row["email"];
				$mobileNumber = $row["mobileNo"];
				
				$sentSuccess=0;
				/* $nameFriend=array();
				$emailFriend=array();
				$mobileFeiend=array(); */
				include('sendEmail.php');
				
				$HostEmail = parse_ini_file('config.ini',true)['email'];
                
                $subject = $username . " invited you to join Guided Gateway - online marketplace for Guides";
				
				if($create1)
				{
					/* array_push($nameFriend, $nameFriend1);
					array_push($emailFriend, $emailFriend1);
					array_push($mobileFeiend, $mobileFeiend1); */
					
					$message = "Hi " . $nameFriend1 . ",<br/> Your friend <i>" . $username . "</i> registered with <a href=\"www.guidedgateway.com\">Guided Gateway</a>. <br/>He is inviting you to join so that you can also :<br/><ul><li><b>Attract more tourists</b></li><br/><li>Make more from each tourists</li><br/><br/>
                    The registration is totally free and will take only 10 mins<br/><br/> 
					<a href=http://www.guidedgateway.com>Learn more</a> or contact us at support@guidedgateway.com.<br/><br/> 
					Thanks,<br/> 
					Guided Gateway Team <br/>";
					
					//function SendMail(apiKey, fromAddress, fromName, toAddress, toName, subject, message)
					$susx1 = SendMail($HostEmail, 'Guided Gateway', $emailFriend1, $nameFriend1, $subject, $message);
					if($susx1)
					{
						$sentSuccess=1;
					}
					else
					{
						if($sentSuccess==0)
						{
						$sentSuccess=0;
						}
					}
				}
				if($create2)
				{
					/* array_push($nameFriend, $nameFriend2);
					array_push($emailFriend, $emailFriend2);
					array_push($mobileFeiend, $mobileFeiend2); */
					
					$subject = "Mail from " . $from . " - " . $username . " invited you to register with Guided Gateway - online marketplace for Guides in India";
					$message = "Hi " . $nameFriend2 . ",<br/> Your friend <i>" . $username . "</i> registered with <a href=\"www.guidedgateway.com\">Guided Gateway</a>. <br/>He is inviting you to join so that you can also :<br/><ul><li><b>Attract more tourists</b></li><br/><li>Make more from each tourists</li><br/><br/>
                    The registration is totally free and will take only 10 mins<br/><br/> 
					<a href=http://www.guidedgateway.com>Learn more</a> or contact us at support@guidedgateway.com.<br/><br/> 
					Thanks,<br/> 
					Guided Gateway Team <br/>";
					
					//function SendMail(apiKey, fromAddress, fromName, toAddress, toName, subject, message)
					$susx1 = SendMail($HostEmail, 'Guided Gateway', $emailFriend2, $nameFriend2, $subject, $message);
					if($susx1)
					{
						$sentSuccess=1;
					}
					else
					{
						if($sentSuccess==0)
						{
						$sentSuccess=0;
						}
					}
				}
				if($create3)
				{
					/* array_push($nameFriend, $nameFriend3);
					array_push($emailFriend, $emailFriend3);
					array_push($mobileFeiend, $mobileFeiend3); */
					
					$message = "Hi " . $nameFriend3 . ",<br/> Your friend <i>" . $username . "</i> registered with <a href=\"www.guidedgateway.com\">Guided Gateway</a>. <br/>He is inviting you to join so that you can also :<br/><ul><li><b>Attract more tourists</b></li><br/><li>Make more from each tourists</li><br/><br/>
                    The registration is totally free and will take only 10 mins<br/><br/> 
					<a href=http://www.guidedgateway.com>Learn more</a> or contact us at support@guidedgateway.com.<br/><br/> 
					Thanks,<br/> 
					Guided Gateway Team <br/>";
					
					//function SendMail(apiKey, fromAddress, fromName, toAddress, toName, subject, message)
					$susx1 = SendMail($HostEmail, 'Guided Gateway', $emailFriend3, $nameFriend3, $subject, $message);
					if($susx1)
					{
						$sentSuccess=1;
					}
					else
					{
						if($sentSuccess==0)
						{
						$sentSuccess=0;
						}
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
					if($_SESSION['phase'] == "reg")
					{
						$_SESSION['notification']="Congratulation! welcome to your profile, you are now registered with us.";
					}
					else
					{
						$_SESSION['notification']="";
						unset($_SESSION['notification']);
					}
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
				if($_SESSION['phase'] == "reg")
				{
					$_SESSION['notification']="Congratulation! welcome to your profile, you are now registered with us.";
				}
				else
				{
					$_SESSION['notification']="";
					unset($_SESSION['notification']);
				}
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