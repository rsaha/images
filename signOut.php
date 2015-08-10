<?php
	session_start();
	unset($_SESSION['userId']);
		
	$_SESSION['phase']="";
	unset($_SESSION['phase']);
	
	$_SESSION['signin']="";
	unset($_SESSION['signin']);
	
	session_unset();
	
	session_destroy();
	
	header('Location:guide_login.php');
?>