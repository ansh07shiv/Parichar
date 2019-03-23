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

 
?>
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
		<style>
/* 		

		
input[type=text],input[type=email],select,input[type=password],input[type=date],input[type=number] {
				width: 90%;
				font-size:18px;
				padding: 12px 20px;
				margin: 8px 0;
				border-bottom
				box-sizing: border-box;
				border: 0;
				outline: 0;
				background: transparent;
				border-bottom: 1px solid black;
			}
			
	
		input[type=submit],input[type=button],button{
			padding:10px;	
			background:#5abd56;
			border:1px solid;
			font-size:23px;
			
		}
		button span{
			font-size:20px;

		}		
	td{
		width:20px;
	}

.admin-head	p{
			margin-top:20px;
			text-align:center;
			font-size:27px;
			color:#b91560;
			font-weight:600;
		
		}
		.admin-head{
			margin-top:50px!important;
			margin:20px 0px;
		}
		
		.route-head{

    font-size: 23px;
    color: black;
    font-style: bold;
    font-weight: 500;
}.add-problem {
	text-align:center;
	padding:50px;
}
		.form_head{

    font-size: 23px;
    color: black;
    font-style: bold;
    font-weight: 500;
}
table{
			margin-bottom:70px;
}
tr,td,th {
				text-align:center!important;
				width:400px!important;
				padding:20px 20px;
				
		} */

		</style>
        <title>Parichar</title>
    </head>
    <body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px">
                    <a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="user_homepage.php">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="addproblem.php">Add Problem</a>							
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="problems.php">Explore Problems</a>							
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
				Donation History
			</div>
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
			
			echo "<br><br>";
			echo  "<table class='uk-table uk-table-divider' align='center' border='1' class='his' >
			<tr>
			<th>S.no.</th>
			<th>Problem Title</th>
			<th>Problem Type</th>
			<th>Problem Description</th>
			<th>Amount Donated</th>	
			<th>Name of Donor</th>
			<th>Email id of Donor</th>
			<th>Mobile No. of Donor</th>
			<th>Date of Donation</th>
		</tr>";
	if ($result = $mysql->query("SELECT   p.title,p.type,p.description,d.amount,d.name,d.email,d.mobile,d.timedate  from donation_details as d , problem_statements as p where p.id=d.problem_id and d.email='$email'"))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		
		echo "<tr>
				<td>".$i.".</td>
				<td>".$row['title']."</td>
				<td>".$row['type']."</td>
				<td>".$row['description']."</td>
				<td>".$row['amount']."</td>
				<td>".$row['name']."</td>
				<td>".$row['email']."</td>
				<td>".$row['mobile']."</td>
				<td>".$row['timedate']."</td>
				
			</tr>";
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
	
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  

	</div>
</div>	
	</form>

			   
			   <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.bundle.min.js.map"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js.map"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="js/uikit.min.js"></script>
	
   </body>
</html>


