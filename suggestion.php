<?php 
session_start();
if(isset($_SESSION["id"])){

include("database_info.php");
$mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$email=$_SESSION["email"];
$usertype=$_SESSION["usertype"];
$username=	$_SESSION["username"];
$id =   $_SESSION['id'];
                   
$_SESSION["email"]=$email;
		$_SESSION["usertype"]=$usertype;
	$_SESSION["username"]=$username;
		  $_SESSION["id"]=$id;
             
	  if(isset($_POST['add'])){
			$type="Knowledge";
			$title=$_POST["title"];
			$description = $_POST["description"];
			$owner = $username;
			$suggest_id = $_POST["suggest_id"];
			      $date = date("d/m/Y")." ".date("h:i:s");
                            //echo $date;
                            $sql = "INSERT INTO problem_statements (type, title, description, owner, timedate) VALUES ('$type', '$title', '$description','$owner', '$date')";

                            if ($mysql->query($sql)  ===  TRUE ) {
                              echo "<script>alert('Problem added Successfullly')</script>";
                            } 
                            else {
                                    echo "Failed";
									echo "Error:". $sql ."<br/>". $mysql->error;
                                }
				
$sql = "DELETE FROM suggestions WHERE ID=$suggest_id"; 
if(mysqli_query($mysql, $sql)){ 
    echo ""; 
}  
else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($mysql); 
} 

	
	  }

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css.map">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css.map">

        <link rel="stylesheet" href="css/uikit.min.css">
        <link rel="stylesheet" href="css/uikit-rtl.min.css">
        <title>Parichar</title>
    </head>
    <body>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px;">
				<a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="#">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						  <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Contributor</a>
                            </li> -->
                            
                            <li class="nav-item">
                                <a class="nav-link" href="addproblem.php" >Add Problem</a>
                            </li>
							
								<li class="nav-item">
                                <a class="nav-link" href="problems.php" >Explore Problems</a>
                            </li>
							
							<li class="nav-item">
                                <a class="nav-link" href="donation_history.php">Donations</a>
                            </li>

							<li class="nav-item">
                                <a class="nav-link" href="request.php">Request</a>
                            </li>
				
							<li class="nav-item">
                                <a class="nav-link" href="#">Suggestion</a>
                            </li>
								

  </ul>
                       <form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form>
						
						
						
						
						
                      
                    </div>
                </nav>
					
<div class="uk-background-muted uk-padding uk-panel">
				<div class="alert alert-danger" role="alert">
			<div align="center" style="font-size:40px; font-weight:300">
Suggestions			</div>
			</div>
		<div class="row">
		
	
	<div class="col-md-12 route-head">
	
	
	<?php
			

if($mysql->connect_error)
{
	echo "Not";
	die('Connection not established '. $mysql->connect_error());	
}
			
			$i=1;
			
			
	if ($result = $mysql->query("SELECT   * from  suggestions "))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		$suggest_id=$row['ID'];
		$suggestion_title=$row['suggestion_title'];
		$suggestion_problem=$row['suggestion_problem'];
		$suggestion_solution=$row['suggestion_solution'];
		
		echo "<div class='card' style='width: 100%;'>
				<div class='card-body'>
				<span style='font-weight:600; font-size:18px'>Suggested Title: </span><span></span>".$row['suggestion_title']."
				<br><br><span style='font-weight:600; font-size:18px'>Suggested Problem</span><br><span></span>".$row['suggestion_problem']."
				<br><br><span style='font-weight:600; font-size:18px; color:#8B0000'>Proposed Solution Details: </span><br><span></span>".$row['suggestion_solution']."
				<br><br>
			<form action='suggestion.php' method='post'>
				  <input type = 'hidden' name = 'title' value = '$suggestion_title'>
				  <input type = 'hidden' name = 'description' value = '$suggestion_problem'>
				  <input type = 'hidden' name = 'suggest_id' value = '$suggest_id'>
				  
                        <input type='submit' value='Add Problem' name='add' class='btn btn-success'/>
					</form>
					</div>
				</div>";
			$i++;
		}
	}

	}
		else{
			
			echo "<p>No Data Found";
		}
			echo "</table>";

$mysql->close();
?>
	
				  
				  
				  
	<?php }
else{
    header("Location: index.php");
}
?>			  
				  
				  
				 