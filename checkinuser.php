<?php
session_start();
include("database_info.php");
$mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['btn_register'])){
	    $name=$_POST['Username'];
        $password=$_POST['Password'];
        $email=$_POST['Email'];
        
$sql= "INSERT INTO user_details( username, email, password, user_type)
            VALUES ('$name', '$email', AES_ENCRYPT('$password','secret') , 'Solver')";


			 
			
	






if($mysql->query($sql)  ===  TRUE )// &&  $mysql->query($sql1)  ===  TRUE )
{
	echo "<h3>Data entered successfully</h3><br/><br/>";
	echo "You will be redirected in 5 seconds!";
	header('refresh:5;url=signin.php');
	
	
	
	
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
}


//	header('refresh:5;url=db_creation.php?email='.$email.'&mobile='.$mobile);



}

if(isset($_POST['login_btn']))
			{
				$email=$_POST["email"];
	$password=$_POST["password"];

$_SESSION["email"]=$email;
				
			$sql="SELECT id,username,AES_DECRYPT(password,'secret') AS 'Password',user_type from user_details where Email='$email'";


		$qry = mysqli_query($mysql,$sql) ;
		//or die(mysql_error($mysql));	
		//echo "Hiii";
		
		if (!$qry) {	
		//echo "Hiiiii";
				echo "Email Not Exist";
				printf("Errormessage: %s\n", mysqli_error($conn));
		}
		/*if($qry -> )
		{
			die(mysqli_error());
			echo "Mobile Number Not Found";
			exit(1);
		}*/
		
		$j=0;
		while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC))
		{
			//echo "hiiooioioioii";
				$j=1;
			$x=$row["Password"];
			$y=$row["user_type"];
			$z=$row["username"];	
			$id = $row["id"];
		if( $x == $password )
			{
				$_SESSION["usertype"]=$y;
				$_SESSION["username"]=$z;
				$_SESSION['id']=$id;
                   
					echo  "Login Sucessfully";
					header('refresh:0;url=user_homepage.php');					
				 $x ='uploads/';
                    $dir_name = $x.$id;
                    //Check if the directory with the name already exists
                    if (!is_dir($dir_name)) {
                        //Create our directory if it does not exist
                        mkdir($dir_name);
                    }
			}
			else
			{
					echo "Email  and Password Not Matches";
					header('refresh:10;url=signin.php');

			}
			
			
			
			
		}
		
		if($j==0){
		echo "Email Not Found!";
			header('refresh:5;url=signin.php');

		}
		
					
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			}
    
?>

