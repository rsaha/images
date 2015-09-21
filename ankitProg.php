<?php
include('db.php');

$select = mysql_query("SELECT * FROM `tbl_user_profile`");


$count = mysql_num_rows($select);
if($count > 0)
{
	$flag=1;
	$c=1;
	while($row = mysql_fetch_array($select))
	{
		${"user_id_" . $c} = $row["user_id"];
		//echo '<script>alert("'.${"user_id_" . $c}.'")</script>';
		$oldPassword = $row["user_password"];
		//echo '<script>alert("'.$oldPassword.'")</script>';
		${"newPassword_" . $c} = md5($oldPassword);
		//echo '<script>alert("'.${"newPassword_" . $c}.'")</script>';
		$update = mysql_query("UPDATE `tbl_user_profile` SET `user_password` = '".${"newPassword_" . $c}."' WHERE `user_id` = ". ${"user_id_" . $c}."");
		if(!($update))
		{
			$flag=0;
		}
		if($flag==0)
		{
			echo '<script>alert("error eccored")</script>';
		}
		if($flag==1)
		{
			echo '<script>alert("All Password Encrypted Successfully.")</script>';
		}
	}
}

?>