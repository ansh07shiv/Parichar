<!doctype html>
<?php
session_start();
if(isset($_SESSION["id"])){
    header("Location: user_homepage.php");
}
else{
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

        <title>Parichar</title>
    </head>
    <body>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px">
                    <a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="#">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="whyparichar.php">Why Parichar?</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="problems.php">Explore</a>
                            </li>
                           
                        </ul>
                        <a class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5" href="signin.php" role="button" style="color:white">Log In</a>  
                    </div>
                </nav>
                    <div class="uk-background-muted uk-padding uk-panel">
                            
                    <div class="row justify-content-center">
                        <div class="col">
                            <span class="ml-md-4" style="font-size: 40px; font-weight: 400">Who is a Contributor ?</span><br>
                            <div style="width: 400px" class="ml-md-4"><span>Any person who wants to give a financial or knowledge contribution in the form of Algorithmic solution or any raw or complete product solution.</span></div>
                            <br>
                            <br>
                            <span class="ml-md-4" style="font-size: 40px; font-weight: 400">Who will upload the Problems ?</span><br>
                            <div style="width: 400px" class="ml-md-4"><span>Problems will be made public by any government Organisation or any authorised representative. He will be the one authorising changes in master directory.</span></div>
                        </div>
                        <div class="col-4 mr-md-5">
                            <div class="card">
                                <div class="card-body" >
                                    <form action="checkinuser.php" method="POST">
                                            <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" placeholder="Create a username" id="Username" name="Username">
                                            </div>
                                            <div class="form-group">
                                                    <label >Email address</label>
                                                    <input type="email" class="form-control" placeholder="Enter email" id="Email" name="Email">
                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" placeholder="Password" id="Password" name="Password">
                                                    <small id="emailHelp" class="form-text text-muted">Make sure it's more than 3 characters OR <span style="color: red">at least 8 characters including a number and a lowercase letter</span></small>
                                            </div>
                                            <input type="submit" class="btn btn-danger btn-lg btn-block" onclick="return validate()" value="Register" name="btn_register">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js.map"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.bundle.min.js.map"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="js/uikit.min.js"></script>
        
    </body>
</html>
<?php }?>