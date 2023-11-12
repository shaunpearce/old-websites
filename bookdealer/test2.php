<?php 
	session_start(); 
//	require 'connection.php'; 
	$image = file_get_contents('php://input'); 
	if(!$image) { print "ERROR: Failed to read the uploaded image data.\n"; 
	exit();
	
}  
  
  $name = date('YmdHis'); 
  
  $newname="images/".$name.".jpg'"; 
  $file = file_put_contents($newname, $image); 
  
  if(!$file) 
  { 
  	print "ERROR: Failed to write data to $filename, check permissions.\n"; exit(); 
	
  } 
  else 
  { 
  	//$sql = 'INSERT INTO entry(images) values('. mysqli_real_escape_string($con, $newname).')';
   	//$result = mysqli_query($con, $sql) or die('Error in query'); 
   	//$value = mysqli_insert_id($con); $_SESSION["myvalue"] = $value; 
  } 
   
   $url = 'http://'. $_SERVER['HTTP_HOST']. dirname($_SERVER['REQUEST_URI']). '/'.$newname; print "$url\n"; 
 
 
 ?> 