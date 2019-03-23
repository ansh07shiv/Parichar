<html>
    <head><title>Parichar</title>
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
    <p>
        <?php
        session_start();
    if(isset($_SESSION['id'])){
        if(!empty(isset($_POST['read_file']))){
            $filename = $_POST['fileid'];
            echo "<div class='alert alert-secondary' role='alert'><span style='font-weight:600'>File Location: </span>".$filename."</div>";
            $file = highlight_file($filename, true);
            echo "<pre>$file</pre>";
        
	}}
        
		
        
        
        
        $allowed =  array('html');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(in_array($ext,$allowed) ) {
  ?>
        <form action="runhtml.php" method="post">
                    <input type="hidden" name="filename" value="<?php echo $filename;?>" >
                    <input type="submit" name="runhtml" value="Run Code">
                    </form>
        
        
        <?php
}
	   $allowed =  array('c');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(in_array($ext,$allowed) ) {
  ?>	

          <!new-->    <form action = "test.php" method="post" enctype="multipart/form-data" name="formTestFile"> 
                    <!new--><textarea id="testcases" name="testcases"></textarea><br><br>
                            <input type = "hidden" name = "problemid" value = "<?php echo $id?>">
                            <input type = "hidden" name = "userid" value = "<?php echo $user_id?>">
                     <!-- new -->        <input type="submit" value="Testing(provide test cases)" name="testfile" class="btn btn-success"/>
                    <!new--></form>
                    
                    <?php }  ?>
        </p></div>
    </body>
</html>