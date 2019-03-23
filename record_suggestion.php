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

$p_desc = $_POST['p_desc'];
$s_desc = $_POST['s_desc'];
$title = $_POST['title'];


$query = "INSERT INTO suggestions (suggestion_problem, suggestion_solution, username, suggestion_title) VALUES ('$p_desc', '$s_desc', '$username', '$title')";
if($mysql->query($query)  ===  TRUE )// &&  $mysql->query($sql1)  ===  TRUE )
{
	echo "<h1>Thanks For Your Valuable Suggestions</h1><br/><br/>";
	echo "You will be redirected in 3 seconds!";
	header('refresh:3;url=user_homepage.php');
}
else
{
echo "Error:". $query ."<br/>". $mysql->error;
}
          
?>