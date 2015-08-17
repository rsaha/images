<?php
echo "<script type='text/javascript'>alert('ram2');</script>";
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
			for($i=0;$i<$num_rows;$i++)
			{
				$emailaddresses = $emailaddresses . "<br />" . mysql_result($select2, $i, 3);
			}
			
			
		$line = array();
		foreach(file('email_host_address.txt') as $lines) 
		{
			$line[] = $lines;
		}
		$hostAddress=$line[0];
		$HostEmail=$line[1];
		$HostPassword=$line[2];
		
		echo $hostAddress;
		echo $HostEmail;
		echo $HostPassword;
				
		$line = array();
		foreach(file('email_host_address.txt') as $lines) 
		{
			$line[] = $lines;
		}
		
		$hostAddress=trim($line[0]);
		$HostEmail=trim($line[1]);
		$HostPassword=trim($line[2]);
		
		
		require("\PHPMailer_5.2.0\class.phpmailer.php");

		$mail = new PHPMailer();

		$mail->IsSMTP();                  			// set mailer to use SMTP
		$mail->Host =  $hostAddress;			// specify main and backup server
		$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
		$mail->Username = $HostEmail; 	// SMTP username
		$mail->Password = $HostPassword; 			  	// SMTP password

		$mail->From = $HostEmail;
		$mail->FromName = $username;
		$mail->AddAddress("ankitbhagat.ab@gmail.com", "Ankit Bhagat");
		//$mail->AddAddress("touchus@xmapledatalab.com", "xmaple datalab");

		$mail->WordWrap = 50;                               // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = "Guide " . $username . "has envited his some friends";
		$mail->Body    ="<b>". $username . " has invited his friends of following email id...<br />" . $emailaddresses . "</b><br /><br /> -----------------------------<br />";

		if(!$mail->Send())
		{
			$errormsg="Acknowledgement email could not be send.";
			echo "<script>
			alert('Sorry! mail could not be sent at this moment. Please try again!');
			</script>";
			header('Location: guide_profile.php?id='. $userid .'');
			exit;
		}
		else
		{
			$errormsg="Acknowledgement email sent.";
				error_log($errormsg,0);
			echo "<script>
			alert('Thank you for contacting us. As early as possible  we will contact you.');
			</script>";
			header('Location: guide_profile.php?id='. $userid .'');
			die;
		}
?>


