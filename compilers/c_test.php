<?php
	$CC="gcc";
	$out=$filename;
	//$code=$_POST["code"];
	//$input=$_POST["input"];
    //$filename_code=$_FILES["Upload"]["name"];
#echo $filename_code;
    echo $filename."1 \n"; #main
    echo $filename_code."2 \n"; #uploads/10/2/main.c
    echo $dir."3 \n";#upload/10/2
    echo $filename_in."4 \n";#uploads/10/2/input.txt
	//$filename_in="input.txt";
	$filename_error="error.txt";
	$executable=$filename;
	$command=$CC." -o ".$filename." ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
    $output_file = fopen("outputfile.txt","w+");
    
    $input = file_get_contents($filename_in);
    echo "Input :".$input;
	//if(trim($code)=="")0
	//die("The code area is empty");
	
	//$file_code=fopen($filename_code,"w+");
	//fwrite($file_code,$code);
	//fclose($file_code);
	//$input = readfile("input.txt");
    
	exec("chmod 777 $executable"); 
	exec("chmod 777 $filename_error");	
	shell_exec($command_error);
	$error=file_get_contents($filename_error);
    echo $error;
	if(trim($error)=="")
	{
      echo "Inside 1";
		if(trim($input)=="")
		{
            echo "Inside 2";
			$output=shell_exec($out);
		}
		else{
            echo "Inside 3";
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
            echo $output;
            //readfile("output.txt");
            //fwrite($file_out,$output);
	     //fclose($file_out);
		}
		fwrite($output_file, $output);
        fclose($output_file);
        rename("outputfile.txt", $dir."/outputfile.txt");
        //fclose($file_out);
	}
	else if(!strpos($error,"error"))
	{
		/*echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}*/
		//else
		//{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		//}
		echo "<pre>$output</pre>";
	}
	else
	{
		//echo "<pre>$error</pre>";
        return $error;
	}
//	exec("rm $filename_code");
//	exec("rm *.o");
//	exec("rm *.txt");
//	exec("rm $executable");
?>