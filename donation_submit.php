<?php
session_start();
  include("database_info.php");
$email=$_SESSION["email"];
$usertype=$_SESSION["usertype"];
$username=	$_SESSION["username"];
$id =   $_SESSION['id'];

$mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}                  
$_SESSION["email"]=$email;
		$_SESSION["usertype"]=$usertype;
	$_SESSION["username"]=$username;
		  $_SESSION["id"]=$id;
	$date=date("d/m/Y")." ".date("h:i:s");



$problem_id=(int)$_SESSION["problem_id"]; 

	
	$name=$_POST["name"];
	$mobile=$_POST["mobile"];
	$amount=(int)$_POST["amount"];
	
	
$sql= "INSERT INTO donation_details  VALUES ($problem_id ,'$name', '$email', '$mobile',$amount,'$date'  )";


			 
			
	






if($mysql->query($sql)  ===  TRUE )// &&  $mysql->query($sql1)  ===  TRUE )
{
	echo "<h1>Thanks For Your Valuable Donation </h1><br/><br/>";
	echo "You will be redirected in 3 seconds!";
	header('refresh:3;url=user_homepage.php');
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
}


//	header('refresh:5;url=db_creation.php?email='.$email.'&mobile='.$mobile);


$mysql->close();












?>