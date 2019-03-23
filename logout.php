<?php
	session_start();
	
	
	$email=$_SESSION["email"];

$_SESSION["email"]=$email;
	
	
	
	
	
	
	
	
	
	header('Location:index.php');


















	session_unset();
?>