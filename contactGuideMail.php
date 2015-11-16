<?php
	
	
	
	if(isset($_GET['email']))
	{
	$Email = $_GET['email'];
	}	
			
		include_once('sendEmail.php');
		$HostEmail = parse_ini_file('config.ini',true)['email'];
		$subject = "Interested in custom tour";
		$message    = "Tourist is looking for a custom tour with guide <b><br />" . $Email . "</b><br /><br /> -----------------------------<br />";
		
		//function SendMail(fromAddress, fromName, toAddress, toName, subject, message)
		if(SendMail($HostEmail, 'GuidedGateway', 'support@guidedgateway.com', 'Guided Gateway Support', $subject, $message))
		{
			$errormsg="Acknowledgement email sent.";
			error_log($errormsg,0);
				if(SendMail($HostEmail, 'GuidedGateway', $Email, 'Tourist','thanx for contact', 'Thanks for contacting us for your personalized custom tour. Our customer service team will reach out to you.'))
				{
					$errormsg="Acknowledgement email sent.";
					error_log($errormsg,0);
				}
				else
		{
			$errormsg="Acknowledgement email could not be send.";
			error_log($errormsg,0);
			header('Location: guide-detail-sidebar.html');
			exit;
		}
			header('Location: guide-detail-sidebar.html');
			die;
		}
		else
		{
			$errormsg="Acknowledgement email could not be send.";
			error_log($errormsg,0);
			header('Location: guide-detail-sidebar.html');
			exit;
		}
?>


