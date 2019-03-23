<?php 
session_start();
  include("database_info.php");
if(isset($_SESSION['id'])){
 
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





if(isset($_POST['req_cont'])){
	
	    $name=$_POST['name'];
        $reason=$_POST['reason'];
        $emailid=$_POST['email'];
        
$sql= "INSERT INTO request_contributor( name,email,reason)
            VALUES ('$name', '$emailid','$reason')";


			 
			
	






if($mysql->query($sql)  ===  TRUE )// &&  $mysql->query($sql1)  ===  TRUE )
{
	echo "<script>alert('Your request is submitted.')</script>";
	
	
	
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px">
                    <a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="user_homepage.php">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    
                </nav>
    <div class="uk-background-muted uk-padding uk-panel">  
    <br>
    <div class="container">
        <span style="font-size: 40px; font-weight: 500">Just a step away from being a Contributor!</span><br>
        <span style="font-size: 20px;font-weight: 300">You’ll find endless opportunities from very talented IT experts. But first things first, <span style="font-weight: 600">Register yourself as a contributor.</span></span>
        <br>
        <br>
        <div class="row row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-body" style="width: 26rem">
                        
                        <span style="font-weight: 600; font-size: 20px" >Organisation Profile</span>
                        <hr>
                        <form action="form.php" method="post">
                                <div class="form-group">
                                  <label>Full Name of Organisation</label>
                                  <input type="text" name="name" id="name" class="form-control" placeholder="Name of Organisation">
								  <span id="nerror"></span>
                                 </div>
								<div class="form-group">
                                  <label>Email id</label>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="Email ID">
									<span id="eerror"></span>
								</div>
								 
                                <div class="form-group">
                                        <label>Why you want to become a Contributor?</label>
								<textarea  name="reason" id="reason" rows="5" cols="40" placeholder="Give your Answer"></textarea>
												           
									<span id="rerror"></span>					   
														   
									</div>
                                <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="accept" name="accept">
                                  <label class="form-check-label" style="font-size: 10px">By filling the details, you're giving us consent to share this data wherever your user profile appears. </label>
									<span id="aerror"></span>
							   </div>
                                <input type="submit" onclick="return validate()" value="Request" class="btn btn-danger" name="req_cont" style="width: 10rem;">
                              </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    </div>
<script>
 function validate(){
		var  email=document.getElementById("email").value;
		var  name=document.getElementById("name").value;
			
		var  reason=document.getElementById("reason").value;
		
		var  accept=document.getElementById("accept").checked;
	
	
	console.log(accept);
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

		 if( accept == false )
	 {
			
		document.getElementById("aerror").innerHTML="Please accept the condition";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("aerror").innerHTML="";
		}

		
		
		 if( name.toString().length === 0 )
	 {
			
		document.getElementById("nerror").innerHTML="Enter Correct Name";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
		}
		else 
		{
		document.getElementById("nerror").innerHTML="";
		}

		
		if( reason.toString().length < 200)
		{
			document.getElementById("rerror").innerHTML="Reason must be of 200 characters  or more";
			flag=false;
		
		}
		else 
		{
		document.getElementById("rerror").innerHTML="";
		}

		
		
		
 
	return flag;
	
	}
	
	</script>

	

	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php } else {

			//header('Location:index.php');
			//echo "<script>alert('Please login to Continue!');</script>";
			
			echo "<script>
alert('Please login to continue');
window.location.href='index.php';
</script>";
			
			
			
			
}	?>
