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
				
		require("\PHPMailer_5.2.0\class.phpmailer.php");

		$mail = new PHPMailer();

		$mail->IsSMTP();                  			// set mailer to use SMTP
		$mail->Host =  "199.168.191.130";			// specify main and backup server
		$mail->SMTPAuth = true;     	 			// turn on SMTP authentication
		$mail->Username = "contact@waltrump.com"; 	// SMTP username
		$mail->Password = "tarzan567"; 			  	// SMTP password
		
		$mail->From = "contact@waltrump.com";
		$mail->FromName = $username;
		$mail->AddAddress("ankitbhagat.ab@gmail.com", "Ankit Bhagat");

		$mail->WordWrap = 50;                               // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = "Guide " . $username . "has envited his some friends";
		$mail->Body    ="<b>". $username . " has invite his friends of following email id...<br />" . $emailaddresses . "</b><br /><br /> -----------------------------<br />Waltrump Technology<br>(www.Guided Gateway Website)<br />Email: quote@Guided Gateway Website<br /> Contact: +91 121 2708197, +91 93 6854 1767";

		if(!$mail->Send())
		{
			echo "<script>
			alert('Sorry! mail could not be sent at this moment. Please try again!');
			</script>";
			exit;
		}
		echo "<script>
		alert('Thank you for contacting us. As early as possible  we will contact you.');
		</script>";
		header('Location: guided_profile.php?id='. $userid .'');
		die;
?>


