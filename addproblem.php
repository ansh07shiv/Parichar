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
   <!-- <body>
        <h3>Welcome  <?php// echo $_SESSION['username'];?></h3>
        <h4>Add Problem</h4>
        <center>
            <form action = "addproblem.php" method = "post">
                Enter Problem Title: <input type= "text" name = "title" placeholder="Title"><br>
                Select Problem Type: <select name="type">
                                        <option value="Financial">Financial Support</option>
                                        <option value="Knowledge">Knowledge Support</option>
                                        <option value="Both">Both</option>
                                    </select><br>
                Enter Problem Description: <input type= "text" name = "desc" placeholder="Description">
                <input type="submit" value="Submit" name="add_problem">
            </form>
        </center>
    </body>
</html>-->

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
		<link rel="icon" href="C:\Users\CHANDAN\Desktop\SIH 2019\favicon.ico" sizes="196x196" />

		<!-- <style>
		
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


.route-head	p{
			text-align:center;
			font-size:27px;
			color:#b91560;
			font-weight:600;
		
		}
		.route-head{
			margin-top:50px!important;
			margin:20px 0px;
		}.form_head{

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
		}


		</style>  -->
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
                        <div style="font-weight: 600; font-size: 28px">Add Problem</div>
                    </div>
                </div>
            </div>
				  

			<br><br>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-6 ">
                        <div class="card">
                            <div class="card-body" style="font-size: 15px"> 
                                    <form action="addproblem.php" method="POST">
                                            <div class="form-group">
                                                    <label >Problem Title</label>
                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                            </div>
											<hr>
											<div class="form-group">
													<label>Problem Type</label>
													<select class="form-control" name="type" id="type">
													<option value="Financial">Financial</option>
													<option value="Knowledge">Knowledge</option>
													<option value="Financial and Knowledge">Financial and Knowledge</option>
													</select>
												</div>

											<div class="form-group">
												<label for="exampleFormControlTextarea1">Problem Description</label>
												<textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Problem Description"></textarea>
											</div>
                                            <input class="btn btn-danger btn-lg btn-block" type="submit" value="Submit" name="add_problem" onclick="return validate()">
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>	  
				  
				  
	
			   
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
 <script>
 function validate(){
			var title = document.getElementById("title").value;
			var type = document.getElementById("type").value;
			var desc = document.getElementById("desc").value;
	
	 if( title.toString().length === 0 )
	 {
			
		document.getElementById("ptierror").innerHTML="Enter Correct Title";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("nerror").innerHTML="";
		}
	 if( desc.toString().length === 0 )
	 {
			
		document.getElementById("pderror").innerHTML="Enter Correct Description";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("pderror").innerHTML="";
		}

		
 
	return flag;
	
	}
	
	</script>

 













<?php if(!empty(isset($_POST['add_problem']))){
                          
						  $title=$_POST['title'];
                            $type=$_POST['type'];
                            $desc=$_POST['desc'];
                            $owner=$_SESSION['username'];
                            $date = date("d/m/Y")." ".date("h:i:s");
                            //echo $date;
                            $sql = "INSERT INTO problem_statements (type, title, description, owner, timedate) VALUES ('$type', '$title', '$desc','$owner', '$date')";

                            if ($mysql->query($sql)  ===  TRUE ) {
                              echo "Problem Added Sucessfully";
                            } 
                            else {
                                    echo "Failed";
									echo "Error:". $sql ."<br/>". $mysql->error;
                                }
                           }
?>

	
   </body>
</html>


