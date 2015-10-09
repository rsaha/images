<?php

if(isset($_POST["email"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli('localhost' , 'gg_admin', 'xMapleAdmin123', 'gg_stage_db');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    $statement = $mysqli->prepare("SELECT email FROM tbl_user_profile WHERE status=1 and email=?");
    $statement->bind_param('s', $email);
    $statement->execute();
    $statement->bind_result($email);
    if($statement->fetch()){
        die('<img src="img/available.png" />');
    }else{
        die('<img src="img/not-available.png" />');
    }
}

?>