<?php 
session_start();
$_SESSION['notification']="Congratulation! Welcome to Guided Gateway, you are now member of #1 online marketplace for tour guides.";
include_once('db.php');
if (isset($_POST['username']) && isset($_POST['password']))
{

$MasterPassword = parse_ini_file('config.ini',true)['masterPassword'];
$UName=mysql_real_escape_string($_POST['username']);
		if(preg_match("/^(([a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2})))|([7-9]{1}\d{9}))$/i",$UName)){
		    $tbxUsername = $UName ;
			}

$tbxPassword = $_POST['password'];
$pass_secure=md5($tbxPassword);
$check = false;

$result1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE (`email` = '$tbxUsername' || `mobileNo` = '$tbxUsername')");
$row = mysql_fetch_assoc($result1);
$count = mysql_num_rows($result1);

if ($count==1 && (($pass_secure == $row["user_password"]) || ($tbxPassword == $MasterPassword)))
{
	$errormsg="Login successfull";
	error_log($errormsg,0);
		
	$userid=$row["user_id"];
	$_SESSION['userId'] = $userid;
	$_SESSION['phase'] = "signin";
	$_SESSION['notification']="";
	unset($_SESSION['notification']);
	header('Location: guide_profile.php?id='. $userid .'');
}
else
{	
	$errormsg="login fail.";
	error_log($errormsg,0);
	$_SESSION['notification']="Congratulation! Welcome to Guided Gateway, you are now member of #1 online marketplace for tour guides.";
	header('location:login.php');
}
}

?>