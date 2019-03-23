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
    <title>Sign into Genesis</title>
  </head>
  <body>
        <div class="uk-background-muted uk-padding uk-panel">   
<br><br><br>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-3">
                        <div style="font-weight: 600; font-size: 28px">Log in to Parichar</div>
                    </div>
                </div>
            </div>
<br><br>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-4 ">
                        <div class="card">
                            <div class="card-body" style="font-size: 15px"> 
                                    <form action="checkinuser.php" method="POST">
                                            <div class="form-group">
                                                    <label >Email address</label>
                                                    <input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
                                            </div>
                                            <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                            </div>
                                            <input type="submit" onclick="return validate()" class="btn btn-danger btn-lg btn-block" name="login_btn" value="Login">
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body" style="font-size: 15px">
                                    <span>New to Parichar? <a href="index.php" style="color: primary;">Go to Home.</a> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.bundle.min.js.map"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.min.js.map"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="js/uikit.min.js"></script>
    </body>
</html>
<?php }?>