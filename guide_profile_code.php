<?php 
session_start();

$_SESSION["login"]="false";
header('location:Index.php');

?>