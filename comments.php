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

 
if(isset($_SESSION['id'])){
                           if(!empty(isset($_POST['discussion']))){


                            $proid=$_POST['problemid']; 
                            $query = "select * from problem_statements where id = '$proid'";
                            $query_run = mysqli_query($mysql,$query);
                           
                            $_SESSION["problem_id"]=$id;
                               
                            //echo mysql_num_rows($query_run);
                            if($query_run)
                            {
                                if(mysqli_num_rows($query_run)>0)
                                {
                                    $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                                    $title_problem = $row['title'];
                                    $type_problem = $row['type'];
                                    $owner_problem = $row['owner'];
                                    $desc_problem = $row['description'];
                                    $date_problem = $row['timedate'];
                                    
                                 }
                            }
                            else {
                                    echo "Failed";
                                }
                           }
						   if(!empty(isset($_POST['commented']))){


                            $proid=$_POST['problemid']; 
                            $query = "select * from problem_statements where id = '$proid'";
                            $query_run = mysqli_query($mysql,$query);
                           
                            $_SESSION["problem_id"]=$id;
                               
                            //echo mysql_num_rows($query_run);
                            if($query_run)
                            {
                                if(mysqli_num_rows($query_run)>0)
                                {
                                    $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                                    $title_problem = $row['title'];
                                    $type_problem = $row['type'];
                                    $owner_problem = $row['owner'];
                                    $desc_problem = $row['description'];
                                    $date_problem = $row['timedate'];
                                    
                                 }
                            }
                            else {
                                    echo "Failed";
                                }
                           }
						   

?>

<?php

             
if(isset($_POST['commented'])){
	  $proid=$_POST['problemid']; 
  
    $comment=$_POST['comment'];
$date = date("d/m/Y")." ".date("h:i:s");
                   
$sql= "INSERT INTO comments
            VALUES ('$proid', '$username', '$comment' , '$date')";


			 
			
	






if($mysql->query($sql)  ===  TRUE )// &&  $mysql->query($sql1)  ===  TRUE )
{
	echo "";	
	
	
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
}

}



















?>            


<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title> Comments</title>
        
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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px">
                    <a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="user_homepage.php">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="problems.php">Explore</a>
                            </li>
                            
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Explore</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#" style="font-weight: bold">Explore Problems</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Organisations</a>
                                    <a class="dropdown-item" href="#">Documentation</a>
                                </div>
                            </li> -->
                        </ul>
                        <!-- Search Bar -->
                        <!-- <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search keywords">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form> -->
                        
                                <!-- <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5" type="submit" style="color: white" href="login.html"> <a href="login.php">Sign In</a></button> -->
								<form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form>
						</div>
                </nav>




<div class="uk-background-muted uk-padding uk-panel">   
<br><br><br>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-3">
                        <div style="font-weight: 600; font-size: 28px">Discussion Forum</div>
                    </div>
                </div>
            </div>
<br><br>


<div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-8 ">
                        <div class="card">
                            <div class="card-body" style="font-size: 15px"> 
                               	<div class="form-group row">
										<label class="col-sm-2 col-form-label">Problem Title</label>
										<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $title_problem;?>">
										</div>
									</div>


									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Problem Type</label>
										<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $type_problem;?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Problem Description</label>
										<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $desc_problem;?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Problem Owner</label>
										<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $owner_problem;?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Problem Creation Date</label>
										<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $date_problem;?>">
										</div>
									</div>

									 <div class="row justify-content-md-center">
                    <div class="col-3">
                        <div style="font-weight: 600; font-size: 23px">Comments</div>
                    </div>
                </div>	
				
				
				
				
				<?php 
                           if(!empty(isset($_POST['discussion'])))  {
						$proid=$_POST['problemid']; 
                           			   
				echo "<table>";			 

if ($result = $mysql->query("SELECT  * from comments where problem_id='$proid' "))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		
		echo "<br><span style='font-size:30px'>".$row['username']."</span> - ".$row['timedate']."<br>".$row['comment']."

				
		<hr>";
			
		}
	}

	}
		else{
			
			echo "<p>No Data Found";
		}
			echo "</table>";
						   
}
                           if(!empty(isset($_POST['commented'])))  {
						$proid=$_POST['problemid']; 
                           			   
				echo "<table>";			 

if ($result = $mysql->query("SELECT  * from comments where problem_id='$proid' "))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		
		echo "<br><span style='font-size:30px'>".$row['username']."</span> - ".$row['timedate']."<br>".$row['comment']."

				
		<hr>";
			
			
		}
	}

	}
		else{
			
			echo "<p>No Data Found";
		}
			echo "</table>";
						   
}


?>


		<form action="comments.php" method = "post">
			
		<div class="form-group">

		<textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write a comment....."></textarea>
		<input type="hidden" name="problemid" value="<?php echo $_POST['problemid'];?>">
		<p id="cerror"></p>
		
		</div>
           <input class="btn btn-danger btn-lg btn-block" type="submit" value="Comment" name="commented" onclick="return validate()">
		
		
		
					</form>
<script>
 function validate(){
			var comment = document.getElementById("comment").value;
	var flag=true;
	 if( comment.toString().length === 0 )
	 {
			
		document.getElementById("cerror").innerHTML="Please enter a comment....";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("cerror").innerHTML="";
		}
return flag;

 }
	</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>




	<script>
	function validate(){
					var  name=document.getElementById("name").value;

		var  mobile=document.getElementById("mobile").value;
		//var cnfrm_pswd=document.getElementById("cnfrm_pswd").value;
	var amount=document.getElementById("amount").value;
	console.log(amount);
	
	 if( name.toString().length === 0 )
	 {
			
		document.getElementById("nerror").innerHTML="Enter Correct Name";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("eerror").innerHTML="";
		}

		
		if( mobile.toString().length != 10)
		{
			document.getElementById("merror").innerHTML="Enter Correct Mobile Number";
			flag=false;
		
		}
		else 
		{
		document.getElementById("merror").innerHTML="";
		}

		if( mobile.toString().length === 0|| parseint(amount) < 1)
		{
			document.getElementById("aerror").innerHTML="Amount must be minimum of Rs.1";
			flag=false;
		
		}
		else 
		{
		document.getElementById("aerror").innerHTML="";
		}
		
 
	return flag;
	}
	</script>
 <body>
	
   </body>
</html>

<?php }
else {
    header("Location: index.php");
}
?>