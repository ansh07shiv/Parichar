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
        <title>Request</title>
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
                                <a class="nav-link" href="#">Request</a>
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
                                <a class="nav-link" href="#">Request</a>
                            </li>

                            <!-- // <li class="nav-item">
                            //     <a class="nav-link" href="discussion_forum.php">Discussion Forum</a>
                            // </li> -->


						<?php }  
						
						
						?>			
                        </ul>
                       <form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form>
						
						
						
						
						
                      
                    </div>
                </nav>
					
<div class="uk-background-muted uk-padding uk-panel">
				<div class="alert alert-danger" role="alert">
			<div align="center" style="font-size:40px; font-weight:300">
				Request
			</div>
			</div>
				<?php 		
        $query = "select * from push_request where owner = '$username'";
        $query_run = mysqli_query($mysql,$query);



        //echo mysql_num_rows($query_run);
        if($query_run)
        {
            if(mysqli_num_rows($query_run)>0)
            {
				$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                
				  $problem_id = $row['problem_id'];
                $forker = $row['forker'];
                $query = "select * from user_details where username = '$forker'";
                $query_run = mysqli_query($mysql,$query);
                if($query_run){
                    if(mysqli_num_rows($query_run)>0)
                    {
				        $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                        $forker_id = $row['id'];
                    }
                }
            }
				?>
				
					<p> Problem Id : <?php echo $problem_id; ?></p>
					<p> Requester Username : <?php echo $forker; ?></p>
				<div class="col-md-2">
					
                    <?php   
                    $path = "uploads/".$forker_id."/".$problem_id."/";
                    $files = preg_grep('/^([^.])/', scandir($path));
                    foreach ($files as &$value) {
                    //echo "<a href='http://localhost/".$value."' target='_blank' >".$value."</a><br/><br/>";
                        ?>
                        <form action = 'readfile.php' method = 'post'>
                        <input type = 'hidden' name = 'fileid' value = "<?php echo $path."/".$value; ?>">
                        <input class="btn btn-outline-dark" type = 'submit' name = 'read_file' value = "<?php echo $value; ?>">
                        <hr>
                
                        </form>
                <?php }
                    ?>
                    
                    <form action = "accept.php" method="post">
					
					<input type="hidden" name="problem_id" value = "<?php echo $problem_id;?>">
					<input type="hidden" name="forker" value = "<?php echo $forker;?>">
					<input class="btn btn-danger btn-lg btn-block" type="submit" value="Accept" name="accept_req">
					</form>

	</div>
<br>			
			<div class="col-md-2">
				<form action = "index.php" method="post">
				
					<input class="btn btn-danger btn-lg btn-block" type="submit" value="Decline" name="decline_req">
					</form>
				</div>
				
				
				<?php 
        }
								
			else
				
				{
					
					
						echo "No request found";
				}
			
	
				?>

		


</body>
</html>



<?php }
else{
    header("Location: index.php");
}
?>


