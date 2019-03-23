<!doctype html>
<html lang="en">
    <head>
        <title>Forked Successfully</title>
    </head>
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css.map">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css.map">

        <link rel="stylesheet" href="css/uikit.min.css">
        <link rel="stylesheet" href="css/uikit-rtl.min.css">
<body>
<?php 
session_start();
include("database_info.php");



if(isset($_SESSION['id'])){
        $email=$_SESSION["email"];
        $usertype=$_SESSION["usertype"];
        $username=	$_SESSION["username"];
        $user_id =   $_SESSION['id'];
        
        $mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    
    if(!empty(isset($_POST['fork']))){
        $src = $_POST['src'];
        $dest = $_POST['dest'];
        //echo $src;
        //echo $dest;
        if(!is_dir($dest)){
            mkdir($dest);
        }
        // Move all images files
        $files = glob($src."/*.*");
        foreach($files as $file){
            $file_to_go = str_replace($src."/",$dest."/",$file);
            copy($file, $file_to_go);
            }
        
								  $problemid=$_POST['problemid'];
                            $forkername=$_POST['forkername'];
                            $owner=$_POST['solution_owner'];
                            //echo $date;
                            $sql = "INSERT INTO fork (problem_id,owner,forker) VALUES ('$problemid', '$owner', '$forkername')";

                            if ($mysql->query($sql)  ===  TRUE ) {
                            //   echo "foker Added Sucessfully";
                            } 
                            else {
                                    echo "Failed";
									echo "Error:". $sql ."<br/>". $mysql->error;
                                }
                           
		
		
		
		
		
		
		
		
		
    }
?>
    <!-- Forked Successfully -->
    <br><br>    
    <div align="center">
    <form action = "mysolution.php" method = "post">
        <input type = "hidden" name = "problemid" value = "<?php echo $_POST['problemid']?>">
        <input type = "hidden" name = "solution_owner" value = "<?php echo $_POST['solution_owner']?>">        
        <input type = "submit" name = "problem" value = "View My Solution" class="btn btn-success">
    </form>
    </div>
    </body>
</html>
<?php }else{
    header("Location: index.php");
}?>