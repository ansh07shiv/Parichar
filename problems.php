<?php
session_start();
  include("database_info.php");
  $mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
  
if(isset($_SESSION['id'])){
	
	$email=$_SESSION["email"];
$usertype=$_SESSION["usertype"];
$username=	$_SESSION["username"];
$id =   $_SESSION['id'];
                 
$_SESSION["email"]=$email;
		$_SESSION["usertype"]=$usertype;
	$_SESSION["username"]=$username;
		  $_SESSION["id"]=$id;
}
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 85px;">
				<a class="navbar-brand ml-md-5" style="font-size: 24px; font-weight: 500" href="#">Parichar</a>
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logo.png" style="width: 76px; height: 78px;" /></a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
											<?php if(!isset($_SESSION['id'])){
	
					
						?>


						<!-- <li class="nav-item" style="padding:20px;">
                                <a class="nav-item-bar" href="index.php">Home</a>
                            </li>
                            
                            <li class="nav-item" style="padding:20px;">
                                <a class="nav-item-bar" href="#" >Problems</a>
                            </li> -->

					<?php } else {					?>


	<?php if($usertype=="Contributor"){
?>
						  <!-- <li class="nav-item" style="padding:20px;">
                                <a class="nav-item-bar" href="user_homepage.php">Contributor</a>
                            </li> -->
                            
                            <li class="nav-item">
                                <a class="nav-link" href="addproblem.php" >Add Problems</a>
                            </li>
							
								<!-- <li class="nav-item">
                                <a class="nav-item-bar" href="#" >Problems Statements</a>
                            </li> -->
							
							<li class="nav-item">
                                <a class="nav-link" href="donation_history.php" >Donation History</a>
                            </li>
							
							
							
	<?php				} 
						else{
						
						?>
						  <!-- <li class="nav-item" style="padding:20px;">
                                <a class="nav-item-bar" href="user_homepage.php">Solver</a>
                            </li> -->
                            
                            <!-- <li class="nav-item" style="padding:20px;">
                                <a class="nav-item-bar" href="#" >Problem Statements</a>
                            </li> -->


						<?php }  
						
					}						
						?>			



			            </ul>
					<?php if(isset($_SESSION['id'])){
	
					
						?><span> <span style="color:white; font-size:16px">Logged in as: </span> <span style="color:white; font-weight:600"><?php echo $username ?></span><br> <span style="font-weight:700; color:white; font-size:20px"><?php echo $usertype ?></span></span>
						<form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form>
						
						
					<?php } else {					?>
                       
						
						<form class="form-inline my-2 my-lg-0"  action="signin.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Login</button>
                        </form>
						
					<?php  } ?>
		<br><br>
</nav>

      <div class="uk-background-muted uk-padding uk-panel"> 
<div class="col-lg-12">
		
				<?php
    $mark=0;
    if(!empty(isset($_POST['fin_prblm']))){
        $query = "select * from problem_statements where type like '%Financial%'";
        //echo $query;
        $query_run = mysqli_query($mysql,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
        {
            $i=-1;
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                $i++;
                $problem[$i]= $row;
                $_SESSION['problem'] = $problem;
            }
            $num_prblm=$i;
            $mark=1;
        }
    }
	else if(!empty(isset($_POST['both_prblm']))){
        $query = "select * from problem_statements where type like 'Financial and Knowledge'";
        //echo $query;
        $query_run = mysqli_query($mysql,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
        {
            $i=-1;
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                $i++;
                $problem[$i]= $row;
                $_SESSION['problem'] = $problem;
            }
            $num_prblm=$i;
            $mark=4;
        }
    }
 else if(!empty(isset($_POST['kno_prblm']))){
        $query = "select * from problem_statements where type like '%Knowledge%'";
        //echo $query;
        $query_run = mysqli_query($mysql,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
        {
            $i=-1;
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                $i++;
                $problem[$i]= $row;
                $_SESSION['problem'] = $problem;
            }
            $num_prblm=$i;
            $mark = 2;
        }
    }
    
   else{          //(!empty(isset($_POST['all_prblm']))){
     $query = "select * from problem_statements";
        //echo $query;
        $query_run = mysqli_query($mysql,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
        {
            $i=-1;
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                $i++;
                $problem[$i]= $row;
                $_SESSION['problem'] = $problem;
            }
            $num_prblm=$i;
			 $mark = 0;
        }
    }
?>
  <!--==========================
    Intro Section
  ============================-->
  
  <div class="alert alert-danger container-fluid" role="alert">
        <div align="center" style="font-size:40px; font-weight:200">Discover Problem Statements</div>
<br>
        <div class="row justify-content-center" >
            <div class="col">
                <form action="problems.php" method="post">
                    <?php if($mark == 0){?>
                    <input type="submit" value="All Problems" name = "all_prblm" class="btn btn-outline-danger" >
                <?php }else {?><input type="submit" value="All Problems" name = "all_prblm" class="btn btn-outline-danger" ><?php }?>
                </form>
            </div>
            <div class="col">
                <form action="problems.php" method="post">
                    <?php if($mark == 1) { ?>
                    <input type="submit" value="Financial Problems" name = "fin_prblm" class="btn btn-outline-danger" >
                    <?php } else{?><input type="submit" value="Financial Problems" name = "fin_prblm" class="btn btn-outline-danger"><?php }?>
                </form>
            </div>
            <div class="col">
                <form action="problems.php" method="post">
                    <?php if($mark == 2) { ?>
                    <input type="submit" value="Knowledge Based" name = "kno_prblm" class="btn btn-outline-danger" >
                    <?php } else {?><input type="submit" value="Knowledge Based" name = "kno_prblm" class="btn btn-outline-danger" ><?php }?>
                </form>           
            </div>
            <div class="col">
                <form action="problems.php" method="post">
                    <?php if($mark == 3) { ?>
                    <input type="submit" value="Financial and Knowledge Based" name = "both_prblm" class="btn btn-outline-danger" >
                    <?php } else {?><input type="submit" value="Financial and Knowledge Based" name = "both_prblm" class="btn btn-outline-danger" ><?php }?>
                </form>
            </div>
        </div>
        
            
             
            
            
    
			
            </div>
      </div>
      <!-- /.col-lg-3 -->
      <!-- <div class="col-lg-9">
           -->
          <br>
        <div class="card mt-4">
        
        <!-- /.card -->

          <div class="card-body">
              <ul class="list-group">
                  <?php 
                    $i=0;
                    while($i<=$num_prblm){
                        if(isset($_SESSION['id'])){
                            ?>
                           <li class="list-group-item">
                                <div class="card">
                                    <h5 class="card-header"><span style="font-weight:700;">Added by </span><?php echo $problem[$i]['owner'];?></h5>
                                    <div class="card-body">
                                        <h5 class="card-title"><span style="font-weight:700;">Type: </span><?php echo $problem[$i]['type'];?></h5>
                                        <p class="card-text"><span style="font-weight:700;">Description: </span><?php echo $problem[$i]['description'];?></p>
                                        <p><span style="font-weight:700;">Uploaded at </span><?php echo $problem[$i]['timedate'];?></p>
                                      

<!-----------------------FINANCIAL Section---------------------------------------------------------------------------------------------------------->
									  <form action="financial.php" method = "post">
                                        <?php if($problem[$i]['type'] == 'Financial'){?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="Donate" name ="addsolution" class="btn btn-danger">
                                        <?php }?>
                                         </form>
                                        <form action="comments.php" method = "post">
                                        <?php if($problem[$i]['type'] == 'Financial'){?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="Discussion Forum" name ="discussion" class="btn btn-success">
                                        <?php }?>
                                         </form>
                                        
							
<!-----------------------FINANCIAL END---------------------------------------------------------------------------------------------------------->			
										
										
										

<!-----------------------Knowledge Section---------------------------------------------------------------------------------------------------------->										
                                        <?php if($problem[$i]['type'] == 'Knowledge'){?>
                                        <form action="previoussolutions.php" method = "post">
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="View Existing Solutions" name ="prevsolution" class="btn btn-danger">
                                        </form>
                                        <?php
                                                $x ='uploads/';
                                                $dir_name = $x.$_SESSION['id']."/".$problem[$i]['id'];; 
                                                //Check if the directory with the name already exists
                                            ?>    
                                        <form action="mysolution.php" method = "post">
                                            <?php if (!is_dir($dir_name)){
                                            ?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="Add Solution" name ="addsolution" class="btn btn-danger">
                                        <?php   }
                                        else {?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="View My Solution" name ="addsolution" class="btn btn-danger">
                                            <?php }
                                        }?>
                                            
                                        </form>
                                    <form action="comments.php" method = "post">
                                        <?php if($problem[$i]['type'] == 'Knowledge'){?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="Discussion Forum" name ="discussion" class="btn btn-success">
                                        <?php }?>
                                         </form>
                                        





<!-----------------------Knowledge End Section---------------------------------------------------------------------------------------------------------->
















<!-----------------------FINANCIAL Section---------------------------------------------------------------------------------------------------------->

								   <?php if($problem[$i]['type'] == 'Financial and Knowledge'){?>
                                            <form action="previoussolutions.php" method = "post">
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="View Existing Solutions" name ="prevsolution" class="btn btn-danger">
                                        </form>
                                        <?php
                                                $x ='uploads/';
                                                $dir_name = $x.$_SESSION['id']."/".$problem[$i]['id'];; 
                                                //Check if the directory with the name already exists
                                                ?>
                                        <form action="mysolution.php" method = "post">
                                            <?php if (!is_dir($dir_name)){
                                            ?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="Add Solution" name ="addsolution" class="btn btn-danger">
                                          
                                        <?php   }
                                        else {?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="View My Solution" name ="addsolution" class="btn btn-danger">
                                            <?php } 
                                            
                 ?>                      
                                        </form>
                                        <form action="financial.php" method = "post">
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="Donate" name ="addsolution" class="btn btn-danger">
											</form>		
									 <form action="comments.php" method = "post">
                                        <?php if($problem[$i]['type'] == 'Financial and Knowledge'){?>
                                            <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                            <input type="submit" value="Discussion Forum" name ="discussion" class="btn btn-success">
                                        <?php }?>
										</form>
										
					 
            <?php }?>
                                       
                                    </div>
                                </div>
                                        </li>
                

                <?php } else{?>
               <li class="list-group-item">
                    <div class="card">
                        <h5 class="card-header"><span style="font-weight:700;">Added by </span><?php echo $problem[$i]['owner'];?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><span style="font-weight:700;">Type: </span><?php echo $problem[$i]['type'];?></h5>
                            <p class="card-text"><span style="font-weight:700;">Description: </span><?php echo $problem[$i]['description'];?></p>
                            <p><span style="font-weight:700;">Uploaded at </span><?php echo $problem[$i]['timedate'];?></p>
                            <form action="financial.php" method = "post">
                            <?php if($problem[$i]['type'] == 'Financial'){?>
                                <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                <input type="submit" value="Donate" name ="addsolution" class="btn btn-danger">
                            <?php }?>
							 </form>
                            <form action="mysolution.php" method = "post">
                            <?php if($problem[$i]['type'] == 'Knowledge'){?>
                                <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                <input type="submit" value="Add Solution" name ="addsolution" class="btn btn-danger">
                            <?php }?>
							</form>
							<form action="mysolution.php" method = "post">
                            <?php if($problem[$i]['type'] == 'Financial and Knowledge'){?>
                                <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
                                <input type="submit" value="Add Solution" name ="addsolution" class="btn btn-danger">
							</form>
							<form action="financial.php" method = "post">							
                                <input type = "hidden" name = "problemid" value = "<?php echo $problem[$i]['id'];?>">
								<input type="submit" value="Donate" name ="addsolution" class="btn btn-danger">
                            <?php }?>
                                                      

						   </form>
                        </div>
                    </div>
                </li>
                            <?php }$i++; }?>
            </ul>
            
          </div>
        </div>
        <!-- /.card -->

      </div>

      </div>