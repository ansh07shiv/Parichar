<?php 
session_start();
include("database_info.php");
if(isset($_SESSION['id'])){
        $email=$_SESSION["email"];
        $usertype=$_SESSION["usertype"];
        $username=	$_SESSION["username"];
        $user_id =   $_SESSION['id'];
        $directory_exist = 1;

        $mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }                  

$problem_id =0;

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


                          


        $id=$_POST['problemid']; 
		$problem_id =  $_POST['problemid'];
		$_SESSION['problem_id']=$_POST['problemid'];
	   $query = "select * from problem_statements where id = '$id'";
        $query_run = mysqli_query($mysql,$query);
        $x ='provisional_uploads/';
        $dir_name = $x.$_SESSION['id']."/".$id;



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

    ##Upload.php
    if(!empty(isset($_POST['uploadfile']))){
               
			   $errors = array();
                        $uploadedFiles = array();
                        $extension = array("jpeg","jpg","png","gif");
                        $bytes = 1024;
                        $KB = 1024;
                        $totalBytes = $bytes * $KB; 
                        $counter = 0;
                        $x ='provisional_uploads/';
                        $id=$_POST['problemid'];
                       // $problem_id=$_POST['problemid'];
                        
						$dir_name = $x.$_SESSION['id']."/".$id;
                        $UploadFolder = $dir_name;
                        $user_id=$_SESSION['id'];
                        
                         
                        //Check if the directory with the name already exists
                        if (!is_dir($dir_name)) {
                        //Create our directory if it does not exist
                            mkdir($dir_name);
                            $directory_exist = 0;
                        }
        
        
                        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
                            $temp = $_FILES["files"]["tmp_name"][$key];
                            $name = $_FILES["files"]["name"][$key];

                            if(empty($temp))
                            {
                                break;
                            }

                            $counter++;
                            $UploadOk = true;

                            if(file_exists($UploadFolder."/".$name) == true){
                                $UploadOk = false;
                                array_push($errors, $name." file is already exist.");
                            }

                            if($UploadOk == true){
                                move_uploaded_file($temp,$UploadFolder."/".$name);
                                array_push($uploadedFiles, $name);
                            }
                        }

                        if($counter>0){
                            if(count($errors)>0)
                            {
                                // echo "<b>Errors:</b>";
                                // echo "<br/><ul>";
                                foreach($errors as $error)
                                {
                                    // echo "<li>".$error."</li>";
                                }
                                // echo "</ul><br/>";
                            }

                            if(count($uploadedFiles)>0){
                                echo "<b>Uploaded Files:</b>";
                                // echo "<br/><ul>";
                                foreach($uploadedFiles as $fileName)
                                {
                                     echo "<li>".$fileName."</li>";
                                }
                                // echo "</ul><br/>";

                                if($directory_exist == 0){
                                   /* $date = date("Y-m-d")." ".date("H:i:s");
                                    //echo $date;
                                    $sql = "INSERT INTO solution_details (problem_id, user_id, datetime, username) VALUES ('$id', '$user_id', '$date', '$username')";

                                    if ($mysql->query($sql)  ===  TRUE ) {
                                        // echo "Problem Added Sucessfully";
                                    } 
                                    else {
                                        // echo "Failed";
                                        // echo "Error:". $sql ."<br/>". $mysql->error;
                                    }
                                }*/
							}
                            }
                                
                                



                            }                               
                        }
                        else{
                            // echo "Please, Select file(s) to upload.";
                        }
    
    
?>
<html>
    <head>
        <title>Collaborate Work</title>
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


						<?php }  
						
						
						?>			
                        </ul>
                       <form class="form-inline my-2 my-lg-0"  action="logout.php">
                                <button class="btn btn-outline-danger my-2 my-sm-0 ml-md-3 mr-md-5 "id="sign_in" type="submit"   style="color: white">Logout</button>
                        </form>
                    </div>
                </nav>
                <div class="uk-background-muted uk-padding uk-panel">
<br>
                <div class="alert alert-danger container" role="alert">
                <h3><span style="font-weight:700;">Welcome </span><?php echo $_SESSION['username'];?></h3>
                </div>

        <div class="card container" style="width: 60rem;">
        <div class="card-body">
                <center>
                <?php 
                    echo "<span style=\"font-weight:700;\">Problem Name : </span>" . $title_problem;
                    echo "<br><span style=\"font-weight:700;\">Problem Type : </span>" . $type_problem;
                    echo "<br><span style=\"font-weight:700;\">Problem Description : </span>" . $desc_problem;
                    echo "<br><span style=\"font-weight:700;\">Problem Owner : </span>" . $owner_problem;
                    echo "<br><span style=\"font-weight:700;\">Problem Date : </span>" . $date_problem;
                ?>
                
                
                <p><br><br></p>
                    <form action = "collaborate.php" method="post" enctype="multipart/form-data" name="formUploadFile">      
                        <label>Select file to upload:</label>
                        <input type="file" name="files[]" multiple="multiple" />
                        <input type = "hidden" name = "problemid" value = "<?php echo $id?>">
                        <input type="submit" value="Upload File" name="uploadfile" class="btn btn-success"/>
                    </form>
                    
              <form action = 'push.php' method = 'post'>
                        <input type = "hidden" name = "problempath" value = "<?php echo 'provisional_uploads/'.$problem_id;?>">
			  

                        <input class="btn btn-outline-dark" style="width:20%" type = 'submit' name = 'push_repos' value = "Push Request">
                        <hr>
                
                        </form>
                    <hr>
                    <span style="font-weight:600">Uploaded Files</span>
                    </center>
                 




				






				 <br><br>    



			<div class="col-md-6">
			
					<p>Final Repository</p>
                    <?php
						$y="final_uploads/";
					   $fidir_name = $y.$problem_id;
                        //      echo $fidir_name; 
                     
					if (is_dir($fidir_name)) {
                            //Create our directory if it does not exist
                          //    echo $fidir_name; 
                            
                    $path = $fidir_name."/";
					//echo $path;
                    $files = preg_grep('/^([^.])/', scandir($path));
                    foreach ($files as &$value) {
                    //echo "<a href='http://localhost/".$value."' target='_blank' >".$value."</a><br/><br/>";
                        ?>
                        <form action = 'readfile.php' method = 'post'>
                        <input type = 'hidden' name = 'fileid' value = "<?php echo $path."/".$value; ?>">
                        <input class="btn btn-outline-dark" style="width:20%" type = 'submit' name = 'read_file' value = "<?php echo $value; ?>">
                        <hr>
                
                        </form>
                      

                <?php }
                    }?>


        </div>
		



			<div class="col-md-6">
					<p>Provisional Repository</p>
                    <?php
                    if (is_dir($dir_name)) {
                            //Create our directory if it does not exist
                                
                            
                    $path = $dir_name."/";
                    $files = preg_grep('/^([^.])/', scandir($path));
                    foreach ($files as &$value) {
                    //echo "<a href='http://localhost/".$value."' target='_blank' >".$value."</a><br/><br/>";
                        ?>
                        <form action = 'readfile.php' method = 'post'>
                        <input type = 'hidden' name = 'fileid' value = "<?php echo $path."/".$value; ?>">
                        <input class="btn btn-outline-dark" style="width:20%" type = 'submit' name = 'read_file' value = "<?php echo $value; ?>">
                        <hr>
                
                        </form>
                <?php }
                    }







$directory = "provisional_uploads/".$problem_id;
//echo $directory;
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}
//echo "There were $filecount files";

if($filecount){
	
	
	
}



?>



        </div>
		
		
        </div>
        </div>
    </body>
</html>

<?php }
else {
    header("Location: index.php");
}
?>
?>