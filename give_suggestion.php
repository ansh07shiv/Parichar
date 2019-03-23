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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parichar</title>

        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css.map">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css.map">

        <link rel="stylesheet" href="css/uikit.min.css">
        <link rel="stylesheet" href="css/uikit-rtl.min.css">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px">
                    <a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="#">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="problems.php">Explore</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form></div>
                </nav>           
                <div class="uk-background-muted uk-padding uk-panel"> 
				  
				  
                  <br><br><br>
              <div class="container">
                  <div class="row justify-content-md-center">
                      <div class="col-6">
                          <div style="font-weight: 600; font-size: 28px">Suggest a Problem</div>
                          <small id="emailHelp" class="form-text text-muted">Please note that, the user should provide a <span style="color: red">feasible solution (Read Only) </span>which will give a brief summary of solution suggested.</small>
                      </div>
                  </div>
              </div>
                    
  
              <br><br>
              <div class="container">
                  <div class="row justify-content-md-center">
                      <div class="col-6 ">
                          <div class="card">
                              <div class="card-body" style="font-size: 15px"> 
                                      <form action="record_suggestion.php" method="POST">
                                              <div class="form-group">
                                                      <label >Problem Title</label>
                                                      <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                              </div>
                                              <hr>
  
                                              <div class="form-group">
                                                  <label>Problem Description</label>
                                                  <textarea class="form-control" id="p_desc" name="p_desc" rows="3" placeholder="Problem Description"></textarea>
                                              </div>

                                              <div class="form-group">
                                                  <label>Suggested Solution</label>
                                                  <textarea class="form-control" id="s_desc" name="s_desc" rows="3" placeholder="Solution Description"></textarea>
                                              </div>

                                              <input class="btn btn-danger btn-lg btn-block" type="submit" value="Suggest" name="add_problem">
                                      </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <br>	  
</body>
</html>

<?php } 
    else{
        header('Location: index.php');
    }
?>