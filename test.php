<html>
<head>
    <title>Test Page</title>
    </head>
    <body>
<?php 
session_start();
if(isset($_SESSION['id'])){
    if(!empty(isset($_POST['testfile']))){
        $testcases = $_POST['testcases'];
        $problemid = $_POST['problemid'];
        $userid = $_POST['userid'];
        
        
        $file=fopen("input.txt","w+");
        fwrite($file,$testcases);
        fclose($file);
        rename("input.txt", "uploads/".$userid."/".$problemid."/input.txt");
        
##Upload.php
$filename_in = "uploads/".$userid."/".$problemid."/input.txt";
$dir = "uploads/".$userid."/".$problemid;
        
$target_dir = $dir;
#$total=count($_FILES['Upload']['name']);
//$sender="paricharwebportal@gmail.com";
//$to = "avinashsaxena777@gmail.com";
$flag=0;

$files = preg_grep('/^([^.])/', scandir($dir));
echo $dir;
foreach ($files as &$tmpFilePath)  {
    echo $tmpFilePath;
  //Get the temp file path
    #$tmpFilePath = $_FILES['Upload']['name'][$i];
    #echo $tmpFilePath;

  //Make sure we have a file path
     if ($tmpFilePath != ""){
    //Setup our new file path
         //$newFilePath = "./uploadFiles/" . $_FILES['upload']['name'][$i];


          $target_file = $target_dir ."/".basename($tmpFilePath);
          #echo $target_file;
          $uploadOk = 1;
          $filename_code=$target_file;
         $path_parts = pathinfo($filename_code);
         $filename = $path_parts['filename'];
         
         #echo $filename_code;
          $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          switch($FileType)
			{
				case "c":
				{
                    $error=include("compilers/c_test.php");
                   // echo "$error";
					if($error != 1){
                        
                        echo "<pre>$filename_code"." : "."$error </pre>";
                        
                    }
                    else{
                        echo "<pre>$filename_code"." : Successfull Compilation(No Error) </pre>";
                    }
                  
					break;
				}
                  
				case "cpp":
				{
					include("compilers/cpp.php");
					break;
				}
				case "java":
				{	
					$error=include("compilers/java.php");
                    if($error != 1){
                        echo "<pre>$filename_code"." : "."$error </pre>";
                    }
                    else{
                        echo "<pre>$filename_code"." : Successfull Compilation(No Error)</pre>";
                    }
                  
					break;
				}
				
				case "py":
				{
                    $error=include("compilers/python.php");
                    echo "<pre>$filename_code"." : "."$error </pre>";
					break;
				}
			}
   
       }
    }
//mailing error
        ?><form action = "mysolution.php" method = "post">
        <input type = "hidden" value = "<?php echo $problemid; ?>" name = "problemid">
        <input type = "submit" value = "View My Solution" name = "afterread">
        </form>


    <?php }
?>   
    
        
        
        
    </body>
</html>
<?php }?>