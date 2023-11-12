<?php

require ( '../connect_db.php' ) ;

function validateBook($value, $fieldname)
{		
		//Check if name is valid
		if($fieldname == 'title' || $fieldname == 'author')
		{
			//if (preg_match("/^[a-z ,.'-]+$/i", $value) && !empty($value))
			if (!empty($value))
			{
				$message = 'Valid';
			}
			else
			{
				$message = 'Please enter '.$fieldname;
			}
			/*else
			{
				$message = ''.$fieldname.' Is invalid';
			}*/
			return $message;
		}
		else if($fieldname == 'book_price')
		{
			if (!empty($value))
			{
				$message = 'Valid';
			}
			else
			{
				$message = 'Please enter price';
			}
			return $message;
		}
		else if($fieldname == 'slct1')
		{
			 if(!isset($_POST['slct1']))
			{
	 		 	$message = 'Please Select your location' ;
		 	}
			else
			{
				$message = 'Valid';
			}
			return $message;
		}
		else
		{
			$message = 'Valid';		
			return $message;
		}
}

function pic($title){
	
	//$target_dir = "images/";
	//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	$rand = rand(10000000, 999999999);//Cover people doing it at the same image at the same time
	$time = time();
	//$file_name = $rand.$time.$_FILES["fileToUpload"]["name"];
	
	//$file_name = $rand.$time.$_FILES["fileToUpload"]["name"];
	
	$filename = $_FILES["fileToUpload"]["name"];
	
	$filename = preg_replace('/\s+/', '_', $filename);
	$filename = strtolower($filename);
	
	$title = preg_replace('/\s+/', '_', $title);
	
	$file_name = $title."-".$rand."-".$time."-".$filename;
	$target_dir = "images/";
	$target_file = $target_dir . $file_name;
	
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	//Check image is not empty
	if(!empty($_FILES["fileToUpload"]["name"]))
	{
	   // Check if image file is a actual image or fake image
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  
	  if($check !== false) 
	  {
		  //echo "File is an image - " . $check["mime"] . ".";
		  $uploadOk = 1;
	  } 
	  else 
	  {
		  //echo "File is not an image.";
		  //$uploadOk = 0;
		  $message = "File is not an image.";
		  return $message;
	  }
	  // Check file size
	  if ($_FILES["fileToUpload"]["size"] > 5000000) 
	  {
		//echo "Sorry, your file is too large.";
		//$uploadOk = 0;
		$message = "Sorry, your file is too large.";
		return $message;
	  }
	  
	  // Allow certain file formats
	  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
	  {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		//$uploadOk = 0;
		$message = "Sorry, only JPG, JPEG & PNG files are allowed.";
		return $message;
	  }
	  // Check if $uploadOk is set to 0 by an error
	  if ($uploadOk == 0) 
	  {
		$message = "Sorry, your file was not uploaded.";
		return $message;
	  // if everything is ok, try to upload file
	  } 
	  else 
	  {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{		
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			session_start();
			$_SESSION['book_image'] = $target_file;;
			$message = 'Valid';
		} 
		else 
		{
			$message = "Sorry, there was an error uploading your file.";
		}
		return $message;
	  }
	}
	else{
		$message = "Please upload an image";
		return $message;
	}
}

?>