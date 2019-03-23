<?php 

session_start();
include("database_info.php");
$mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
if(isset($_SESSION['id'])){
    if(!empty(isset($_POST['prevsolution']))){
            $id = $_POST['problemid'];
            // echo $_POST['problemid'];
            
            $query = "select * from solution_details where problem_id = '$id'";
            //echo $query;
            $query_run = mysqli_query($mysql,$query);
            //echo mysql_num_rows($query_run);
            if($query_run)
            {
                $i=-1;
                while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                    $i++;
                    $solutions[$i]= $row;
                    $_SESSION['solutions'] = $solutions;
                }
                $num_solutions=$i;
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

         <link rel="stylesheet" href="style.css" />
    </head>
    <body><nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px">
                    <a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="#">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Why Parichar?</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="problems.php">Explore</a>
                            </li>
                            
                            
                        </ul>
                        <form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form></div>
                </nav>
                <div class="uk-background-muted uk-padding uk-panel">
            <?php
            $i=0;
            while($i<=$num_solutions){
            ?>
            <li class="list-group-item">
                    <div class="card">
                        <h5 class="card-header"><span style="font-weight:600">Added by </span><?php echo $solutions[$i]['username'];?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><span style="font-weight:600">Problem ID<span> <?php echo $solutions[$i]['problem_id'];?></h5>
                            <p><span style="font-weight:600">Uploaded at </span><?php echo $solutions[$i]['datetime'];?></p>
                            <form action="otherssolution.php" method = "post">
                                <input type = "hidden" name = "solutionid" value = "<?php echo $solutions[$i]['solution_id'];?>">
                                <input type="submit" value="View Solution" name ="viewsolution" class="btn btn-outline-danger">
							 </form>

                              <?php 
                                if($_SESSION['usertype'] == 'Contributor'){
                                if($solutions[$i]['rating'] == 0)
                                {?>
                                <div align="center">
                                <div class="alert alert-secondary col-8" role="alert" align="center"> 
                                <span style="font-weight:600">Rate this Submission!</span> 
                                    
                                
                                        
                                        <form id="ratingsForm" action="rating_submission.php" method="POST">
                                        
                                        <input type = "hidden" name = "problemid" value = "<?php echo $solutions[$i]['problem_id'];?>">   
                                        <input type = "hidden" name = "username" value = "<?php echo $solutions[$i]['username'];?>">   
                                        
                                        
                                        <div class="stars">

                                        

                                            <input type="radio" name="star" class="star-1" id="star-1" value="1" />
                                            <label class="star-1" for="star-1">1</label>
                                            <input type="radio" name="star" class="star-2" id="star-2" value="2"/>
                                            <label class="star-2" for="star-2">2</label>
                                            <input type="radio" name="star" class="star-3" id="star-3" value="3"/>
                                            <label class="star-3" for="star-3">3</label>
                                            <input type="radio" name="star" class="star-4" id="star-4" value="4"/>
                                            <label class="star-4" for="star-4">4</label>
                                            <input type="radio" name="star" class="star-5" id="star-5" value="5"/>
                                            <label class="star-5" for="star-5">5</label>
                                            <span></span>
                                        </div>
                                        <input type="submit" class="btn btn-outline-dark" value="Rate">
                                
                                    
                                    </form>
                                </div>
                                </div>
                                <?php
                                }
                                else {?>
                                    <div class="alert alert-warning" role="alert"> 
                                    <span>Rated!</span></div>
                                <?php
                                }}
                            ?>

                        </div>
                    </div>
                </li>
    
        <?php $i++;}
    }
        ?>
        </div>
    </body>
</html>