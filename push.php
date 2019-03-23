<?php 
session_start();
include("database_info.php");
if(isset($_SESSION['id'])){
        $email=$_SESSION["email"];
        $usertype=$_SESSION["usertype"];
        $username=	$_SESSION["username"];
        $user_id =   $_SESSION['id'];
        $problemid =   $_SESSION['problem_id'];

        $mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }                  
		
		




$directory = "provisional_uploads/".$problemid;
//echo $directory;
$filecount = 0;
$files = scandir($directory);
if ($files){
 $filecount = count($files);
}
echo $filecount;
if($filecount < 4){
	echo "Push Request Not Possible";
	header('Location:problems.php');
}
if($filecount == 4){
	
	//echo "Zinda huuu mae";
//echo $directory;
$path = $directory."/";
//echo $path;
                    	$val = array();
					$files = preg_grep('/^([^.])/', scandir($path));
                    foreach ($files as &$value) {
                    //echo "<a href='http://localhost/".$value."' target='_blank' >".$value."</a><br/><br/>";
						
						
						$fi = $directory."/".$value."/";
						echo $fi;
						
						$sad =	preg_grep('/^([^.])/', scandir($fi));
						print_r($sad);
						array_push($val,$sad);
						
						
					  }
			if($val[0] == $val[1]){
				echo "Haan rukko krte hain";
				
				print_r($val[1]);
				$file = highlight_file($val[1], true);
            echo "<pre>$file</pre>";
        
				
				
				
				
				
			}

}}
?>