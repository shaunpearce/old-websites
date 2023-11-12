<?php
  function validation ($value, $fieldname)
	  {
		  require ( '../connect_db.php' ) ;
		  
		  //Check if name is valid
		  if($fieldname == 'first_name' || $fieldname == 'last_name')
		  {
			  if (preg_match("/^[a-z ,.'-]+$/i", $value) && !empty($value))
			  {
				  $message = 'Valid';
			  }
			  else
			  {
				  $message = ($fieldname == 'first_name')? 'Invalid First Name' : 'Invalid Last Name';
			  }
			  return $message;
		  }
		  
		  //Check if email is valid
		  if($fieldname == 'email')
		  {
			  if(filter_var( $value, FILTER_VALIDATE_EMAIL) && !empty( $value))
			  {
				  $e = $value;
				  $q = "SELECT user_id FROM users WHERE email='$e'" ;
				  $r = @mysqli_query ( $dbc, $q ) ;
			  
				  if ( mysqli_num_rows( $r ) == 0 )
				  {
					  $message = 'Valid';
				  }
				  else if ( mysqli_num_rows( $r ) == 1)
				  {
					  $message = '<img src="includes/invalid.png" style="width:15px;height:15px"> Email already registered';
				  }
			  }
			  else
			  {
				  $message = '<img src="includes/invalid.png" style="width:15px;height:15px"> Invalid email address';	
			  }
			  return $message;
		  }
		  
		  //Check if phone number is valid
		  if($fieldname == 'phone_number')
		  {
			  if (preg_match('/^\+?\d+$/', $value) && !empty( $value) && strlen($value) > 6)
			  { 
					  $message = 'Valid';
			  }
			  else
			  {	
				  $message = '<img src="includes/invalid.png" style="width:15px;height:15px"> Invalid Phone Number';
			  }
			  return $message;
		  }
		  
		  if($fieldname == 'pass')
		  {	
			  if(strlen($value) >= 6)
			  {
				  $message = 'Valid';
			  }
			  else
			  {
				  $message = '<img src="includes/invalid.png" style="width:15px;height:15px"> Password is too short';
			  }
			  return $message;
		  }	
	  }
	
	function insert ($dbc, $fn, $ln, $pnum, $e, $p)
	{
		$fn = mysqli_real_escape_string( $dbc, trim( $_POST[ 'first_name' ] ) ) ;
	  	$ln = mysqli_real_escape_string( $dbc, trim( $_POST[ 'last_name' ] ) ) ;
	  	$e = mysqli_real_escape_string( $dbc, trim( $_POST[ 'email' ] ) ) ; 
	  	$pnum = mysqli_real_escape_string( $dbc, trim( $_POST[ 'phone_number' ] ) ) ;
	  	$p = mysqli_real_escape_string( $dbc, trim( $_POST[ 'pass' ] ) ) ;
		
		if(isset ($_POST['slct1'] )){$cy =  mysqli_real_escape_string( $dbc, trim( $_POST['slct1'] ));}
	   if(isset ($_POST['slct2'] )){$ce = mysqli_real_escape_string( $dbc, trim( $_POST['slct2'] ));}
		if(isset ($_POST['course'] )){$c = mysqli_real_escape_string( $dbc, trim( $_POST['course'] ));}
		
		
		//if Lecture or Class Rep		
		if(isset($_POST['lc']))
		{
			$com_code = md5(uniqid(rand()));
			$q1 = "INSERT INTO users (first_name, last_name, phone_number, email, pass, reg_date, user_county, user_college, user_course, com_code) VALUES ('$fn', '$ln', '$pnum', '$e', SHA1('$p'), NOW(), '$cy', '$ce', '$c', '$com_code')";
			
			$r1 = @mysqli_query ( $dbc, $q1 ) ;
	    	
			if ($r1)
			{	
				
			   $to = $e;
			   $subject = "Confirmation from BookDealer to $fn";
			   //$header = "BookDealer: Confirmation from BookDealer";
			   $headers = 'From: validation@bookdealer.ie' . "\r\n" .
   				'Reply-To: validation@bookdealer.ie' . "\r\n" .
   				'X-Mailer: PHP/' . phpversion();
			   
			   $message = "Please click the link below to verify and activate your account. \r\n";
			   $message .= "http://www.bookdealer.ie/htdocs/confirm.php?passkey=$com_code";
			   $sentmail = mail($to,$subject,$message,$headers);
			
			   if($sentmail)
			   {	
					$note = "Your Confirmation link Has Been Sent To Your Email Address";
					include ( 'home.php' ) ;
					return $note;
			   }
			   else
			   {
					echo "Cannot send Confirmation link to your e-mail address";
			   }	
			}
		}
		//Else if normal User
		else
		{	
		// Inserting form values into 'users' database table.
		  $q = "INSERT INTO users (first_name, last_name, phone_number, email, pass, reg_date, user_county, user_college, user_course) VALUES ('$fn', '$ln', '$pnum', '$e', SHA1('$p'), NOW(), '$cy', '$ce', '$c')";
		  $r = @mysqli_query ( $dbc, $q ) ;
		  if ($r)
		   {  	
			  $insert_id = mysqli_insert_id($dbc);
			  session_start();
			  //Add user details to session varibales that will be used throughout their time logged in to provide a more personal experience
			  $_SESSION[ 'user_id' ] = $insert_id;
			  $_SESSION[ 'first_name' ] = $fn;
			  $_SESSION[ 'last_name' ] = $ln;
			  $_SESSION[ 'email' ] = $e ;
			  $_SESSION[ 'phone_number' ] = $pnum;
			  
			if( isset($cy)) $_SESSION[ 'user_county' ] = $cy;
			if( isset($ce)) $_SESSION[ 'user_college' ] = $ce;
			if( isset($c)) $_SESSION[ 'user_course' ] = $c;
			  
			  /*$_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
			  $_SESSION[ 'email' ] = $data[ 'email' ] ;
			  $_SESSION[ 'phone_number' ] = $data[ 'phone_number' ] ;*/
			  
			  require ( 'login_tools.php' ) ;
			  
			  load ('home.php') ;
			# Close database connection.
			mysqli_close($dbc); 
			exit();
		  }
	}
	
  } 
?>