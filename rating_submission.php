<?php 
    session_start();
    include("database_info.php");
    $email = $_SESSION["email"];
    $usertype = $_SESSION["usertype"];
    // $username=	$_SESSION["username"];
    $id  = $_SESSION['id'];

    $mysql = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $_SESSION["email"]=$email;
	$_SESSION["usertype"]=$usertype;
	// $_SESSION["username"]=$username;
    $_SESSION["id"]=$id;
    
    $problem_id = (int)$_POST["problemid"];
    $rating = $_POST['star'];
    $username = $_POST['username'];

    $query = "SELECT reward FROM user_details WHERE username='$username'";
    $query_run = mysqli_query($mysql,$query);
    
    if (mysqli_num_rows($query_run) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($query_run)) {
            echo "reward: " . $row["reward"];
            $var = $row["reward"];
        }
    } else {
        echo "0 results";
    }

    $var = $var + $rating;

    $sql = "UPDATE user_details SET reward = $var WHERE username='$username'";
    if($mysql->query($sql)  ===  TRUE )// &&  $mysql->query($sql1)  ===  TRUE )
    {
        echo "<h1>Reward Updated Accordingly</h1><br/><br/>";
    }

    $sql = "UPDATE solution_details SET rating = $rating WHERE problem_id = $problem_id AND username='$username'";
    if($mysql->query($sql)  ===  TRUE )// &&  $mysql->query($sql1)  ===  TRUE )
    {
        echo "<h1>Thanks For Your Valuable Review </h1><br/><br/>";
        echo "You will be redirected in 3 seconds!";
        header('refresh:3;url=user_homepage.php');
    }
    else
    {
        echo "Error:". $sql ."<br/>". $mysql->error;
    }
?>