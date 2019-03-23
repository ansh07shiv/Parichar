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
                   
          $query = "SELECT reward FROM user_details WHERE username='$username'";
          $query_run = mysqli_query($mysql,$query);
          
          if (mysqli_num_rows($query_run) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($query_run)) {
                //   echo "reward: " . $row["reward"];
                  $var = $row["reward"];
              }
          } else {
              echo "0 results";
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
						<?php if($usertype=="Contributor"){
?>
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
                                <a class="nav-link" href="request.php">Requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="suggestion.php">Check Suggestions</a>
                            </li>
				

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="discussion_forum.php">Discussion Forum</a>
                            </li> -->
	<?php				} 
						else{
						
						?>
						  <!-- <li class="nav-item">
                                <a class="nav-link" style="color:white">Logged in as Solver</a>
                            </li>
                             -->
                            <li class="nav-item">
                                <a class="nav-link" href="problems.php" >Explore Problems</a>
                            </li>

							 <li class="nav-item">
                                <a class="nav-link" href="form.php" >Become a Contributor</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="donation_history_solver.php" >Donation History</a>
                            </li>
				
							<li class="nav-item">
                                <a class="nav-link" href="request.php">Requests</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="give_suggestion.php">Give Suggestion</a>
                            </li>

                            <!-- // <li class="nav-item">
                            //     <a class="nav-link" href="discussion_forum.php">Discussion Forum</a>
                            // </li> -->


						<?php }  
						
						
						?>			
                        </ul>
                        <span> <span style="color:white; font-size:16px">Logged in as: </span> <span style="color:white; font-weight:600"><?php echo $username ?></span><br> <span style="font-weight:700; color:white; font-size:20px"><?php echo $usertype ?></span></span>
                       <form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form>
						
						
						
						
						
                      
                    </div>
                </nav>
					




				<div class="uk-background-muted uk-padding uk-panel">  
    <br>
    <div class="container">
        <span style="font-size: 40px; font-weight: 500">Welcome to Parichar</span><br>
        <span style="font-size: 20px;font-weight: 300">You’ll find endless opportunities to learn, code, and create. But first things first, <span style="font-weight: 600">Discover Problem Statements</span></span>
        <br>
        <br>
        <div class="row row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body" style="width: 45rem">
                        <div class="container">
                            <span style="font-weight: 600; font-size: 15px">Contribute your way! Filter the problem statements.</span>
                        </div>
                         <br>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                <div class="alert alert-danger" role="alert">
                                <a href="problems.php" class="alert-link">Financial</a></div>
                                </div>
                                <div class="col">
                                <div class="alert alert-danger" role="alert">
                                <a href="problems.php" class="alert-link">Knowledge</a></div>
                                </div>
							</div>
                            <br>
							<div class="row justify-content-center">
                            <div class="alert alert-danger" role="alert">
                                <a href="problems.php" class="alert-link">Financial and Knowledge</a></div>
							</div>
                        </div>
                        <?php 
                            if(4)
                            {?>
                                <hr>
                                <div class="container">
                                        <span style="color:#8B0000; font-weight:600">Your Reward Points: </span > <span style="font-size:22px"> <?php echo $var ?></span>
                                        <small id="emailHelp" class="form-text text-muted">Rewards points determines the reputation of the user on the platform <span style="color: red">these can be referred by organisations looking for hiring skilled IT force.</span></small>
                                    </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
	</div>
	

			   
               <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.bundle.min.js.map"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js.map"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="js/uikit.min.js"></script>
        <script>
 function validate(){
			var name = document.getElementById("Username").value;
					var  email=document.getElementById("Email").value;

		var  pswd=document.getElementById("Password").value;
		//var cnfrm_pswd=document.getElementById("cnfrm_pswd").value;
	
	var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
	 var flag=true;

	 var letters = /^[A-Za-z]+$/;
  
	 var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    
	 
	 
	 if( name.toString().length === 0 )
	 {
			
		document.getElementById("nerror").innerHTML="Enter Correct UserName";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("nerror").innerHTML="";
		}
	 if( email.toString().length === 0 )
	 {
			
		document.getElementById("eerror").innerHTML="Enter Correct Email";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("eerror").innerHTML="";
		}

		
		if( !re.test(pswd))
		{
			console.log(pswd);
			document.getElementById("pwderror").innerHTML="Password must be minimum of eight character and contains at least 1 uppercase , 1 lowercase ,1 numbers and 1  special character.";
			flag=false;
		
		}
		else 
		{
		document.getElementById("pwderror").innerHTML="";
		}

		
 
	return flag;
	
	}
	
	</script>

    </body>
</html>
<?php }
else{
    header("Location: index.php");
}
?>