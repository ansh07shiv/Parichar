<?php 
session_start();
if(isset($_SESSION["id"])){

include("database_info.php");

function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
 } 






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
                   
  if(isset($_POST['accept_req']))
  {
			$problem_id = $_POST["problem_id"];
			$forker = $_POST["forker"];
			
			
			 $query = "select * from user_details where username = '$forker'";
        $query_run = mysqli_query($mysql,$query);



        //echo mysql_num_rows($query_run);
        if($query_run)
        {
            if(mysqli_num_rows($query_run)>0)
            {
				$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                
				  $forker_id = $row['id'];
 
}}

		
echo $forker_id;

echo "HAanan";

echo $id;
/************Delete the file for owner along with directory**************/
		$dirpath="uploads/".$id."/".$problem_id;
		rrmdir($dirpath);

		echo "<br> Jai Jaganath</br>";
/*********Copy the code of the forker into owner directory**************/
		  $src = "uploads/".$forker_id."/".$problem_id;
        $dest = "uploads/".$id."/".$problem_id;
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
      
		echo "Hoooooooooooo gaya kaaam  aab  aaap jaoooooooo orr dekh loooooooooo";
		
		$sql = "DELETE FROM push_request WHERE problem_id=$problem_id and owner='$username' and forker = '$forker'"; 
if(mysqli_query($mysql, $sql)){ 
    echo "Record was deleted successfully."; 
}  
else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                   . mysqli_error($mysql); 
} 
		
		
		header('refresh:5;url=problems.php');

  }
  }









?>

