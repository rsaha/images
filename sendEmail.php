<?php
//Need to send welcome email with template header
function SendMail($fromAddress, $fromName, $toAddress, $toName, $subject, $message)
{
	require_once("./sendgrid-php/sendgrid-php.php");
	$apiKey = parse_ini_file('config.ini',true)['emailApiKey'];
	
	$sendgrid = new SendGrid($apiKey); //New API
	
	$email = new SendGrid\Email();
	$email
		->setFrom($fromAddress)
		->setFromName($fromName)
		->addTo($toAddress, $toName)
		->setSubject($subject)
		->setText($message)
		->setHtml('<font style="font-size:15px;">' . $message . '</strong>')
	;

	try
	{
		$sendgrid->send($email);
		unset($sendgrid);
		unset($email);
		return 1;
	} 
	catch(\SendGrid\Exception $e) 
	{
		unset($sendgrid);
		unset($email);
		return 0;
	}
}

//Need to send welcome email with template header
function SendMailTemplate($fromAddress, $fromName, $toAddress, $toName, $subject, $templateId)
{
	require_once("./sendgrid-php/sendgrid-php.php");
	$apiKey = parse_ini_file('config.ini',true)['emailApiKey'];
	
	$sendgrid = new SendGrid($apiKey); //New API
	
	$email = new SendGrid\Email();
	$email
		->setFrom($fromAddress)
		->setFromName($fromName)
		->addTo($toAddress, $toName)
		->setSubject($subject)
		->setText(' ')
		->setHtml(' ')
        ->setTemplateid($templateId)
	;

	try
	{
		$sendgrid->send($email);
		unset($sendgrid);
		unset($email);
		return 1;
	} 
	catch(\SendGrid\Exception $e) 
	{
		unset($sendgrid);
		unset($email);
		return 0;
	}
}
?>