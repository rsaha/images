<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="assets/js/functions.js"></script>

<?php 
session_start();


include_once('db.php');

if (isset($_POST['username']) and isset($_POST['password']))
{

$tbxUsername = $_POST['username'];
$tbxPassword = $_POST['password'];
$check = false;
$query1 = "SELECT * FROM `tbl_user_profile` WHERE ((email_id = '$tbxUsername' || mobile_no = '$tbxUsername')&& password = '$tbxPassword')";
$result1 = mysql_query($query1);
$count = mysql_num_rows($result1);


if ($count==1)
{
	$_SESSION["login"]="true";
header('location:guide_profile.php');
}
else
{
	$_SESSION["login"]="false";
	header('location:guide_login.php');
}
}

?>