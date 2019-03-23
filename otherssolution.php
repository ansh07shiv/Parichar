<?php 
session_start();
include("database_info.php");
$mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_SESSION['id'])){
        $email=$_SESSION["email"];
        $usertype=$_SESSION["usertype"];
        $username=	$_SESSION["username"];
        $user_id =   $_SESSION['id'];
    
        function reArrayFiles(&$file_post) {
            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);
            for ($i=0; $i<$file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }
            return $file_ary;
        }
    
if(!empty(isset($_POST['viewsolution']))){
    
            $id=$_POST['solutionid']; 
            $query = "select * from solution_details where solution_id = '$id'";
            $query_run = mysqli_query($mysql,$query);
            
            //echo mysql_num_rows($query_run);
            if($query_run)
            {
                
            if(mysqli_num_rows($query_run)>0)
            {
                
                $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                $problem_id = $row['problem_id'];
                $user_id = $row['user_id'];
                $user_name = $row['username'];
                $date_solution = $row['datetime'];
                #echo $problem_id;
                
                $x ='uploads/';
                $dir_name = $x.$user_id."/".$problem_id;

            }
                $id=$problem_id; 
                $query = "select * from problem_statements where id = '$id'";
                $query_run = mysqli_query($mysql,$query);
                $x ='uploads/';
                $dir_name = $x.$user_id."/".$id;
                $src = $dir_name;
                $dest = $x.$_SESSION['id']."/".$id;



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
            else {
                echo "Failed";
            }
    
        
}
    
?>
<html>
    <head>
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
                    <a class="navbar-brand" href="user_homepage.php">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            

                            <li class="nav-item">
                                <a class="nav-link" href="problems.php">Explore Problems</a>
                            </li>
                            
                            
                        </ul>
                        <form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form></div>
                </nav>
                <div class="uk-background-muted uk-padding uk-panel">
                <div class="alert alert-warning" role="alert">
                    Welcome <span style="font-size:20px; font-weight:600"><?php echo $_SESSION['username'];?></span> 
                </div>                
        <center>
            <?php 
                echo "<span style='font-weight:600'>Problem Name : </span>" . $title_problem;
                echo "<br><span style='font-weight:600'>Problem Type : </span>" . $type_problem;
                echo "<br><span style='font-weight:600'>Problem Description : </span>" . $desc_problem;
                echo "<br><span style='font-weight:600'>Problem Owner : </span>" . $owner_problem;
                echo "<br><span style='font-weight:600'>Problem Date : </span>" . $date_problem;
    

                echo "<br><br>";

                if (is_dir($dir_name)) {
                        //Create our directory if it does not exist
                            
                        
                $path = $dir_name."/";
                $files = preg_grep('/^([^.])/', scandir($path));
                foreach ($files as &$value) {
                //echo "<a href='http://localhost/".$value."' target='_blank' >".$value."</a><br/><br/>";
                    ?>
    </center>
                        <form action = 'readfile.php' method = 'post'>
                            <input type = 'hidden' name = 'fileid' value = "<?php echo $path."/".$value; ?>">
                            <input class="btn btn-outline-dark " type = 'submit' name = 'read_file' value = "<?php echo $value; ?>">
                            </form>
            <hr>
                       
            <?php }?>
            </div>
                        </div>
            <br>
            <div class="alert alert-success container" role="alert"><div align="center">
                Like this Submission? Fork it to have it in your own submissions. <form action = "fork.php" method = "post">
                <input type = 'hidden' name = 'src' value = "<?php echo $src;?>">
                <input type = 'hidden' name = 'dest' value = "<?php echo $dest;?>">
                <input type = 'hidden' name = 'problemid' value = "<?php echo $id;?>">
				<input type = 'hidden' name = 'forkername' value = "<?php echo $username;?>">
				<input type = 'hidden' name= 'solution_owner' value = "<?php echo $user_name;?>">
				
                <input class="btn btn-success" type = 'submit' name = 'fork' value = "Fork"></div>
            </form>
                </div>      
            <?php    }?>
                
            
        </center>
                </div>
    </body>
</html>

<?php }
else {
    header("Location: index.php");
}
?>