<?php 
       session_start();
    if(isset($_SESSION['id'])){
        if(isset($_POST['runhtml'])){
     
            $filename=$_POST["filename"];
            
            include($filename);
            
            
        }}












?>