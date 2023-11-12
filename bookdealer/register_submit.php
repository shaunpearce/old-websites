<?php

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('../connect_db.php'); 
	  require ( 'login_tools.php' ) ;
  
	 $fn = mysqli_real_escape_string( $dbc, trim( $_POST[ 'first_name' ] ) ) ;
	  $ln = mysqli_real_escape_string( $dbc, trim( $_POST[ 'last_name' ] ) ) ;
	  $e = mysqli_real_escape_string( $dbc, trim( $_POST[ 'email' ] ) ) ; 
	  $pnum = mysqli_real_escape_string( $dbc, trim( $_POST[ 'phone_number' ] ) ) ;
	  $p = mysqli_real_escape_string( $dbc, trim( $_POST[ 'password' ] ) ) ;
	  
	 
	  //if(isset ($_POST['slct1'] )){$cy =  mysqli_real_escape_string( $dbc, trim( $_POST['slct1'] ));}
	  $cy =  mysqli_real_escape_string( $dbc, trim( $_POST['slct1'] ));
	  
	   if(isset ($_POST['slct2'] )){$ce = mysqli_real_escape_string( $dbc, trim( $_POST['slct2'] ));}
		if(isset ($_POST['course'] )){$c = mysqli_real_escape_string( $dbc, trim( $_POST['course'] ));}
	  
	  # On success register user inserting into 'users' database table.
	  $t = "Test";
	  
	   $q = "INSERT INTO users (user_county, first_name, last_name, email, phone_number, pass, reg_date ) VALUES ('$t','$fn','$ln','$e', '$pnum', SHA1('$p'), NOW())";
	    $r = @mysqli_query ( $dbc, $q ) ;
	    if ($r)
	    {  
			#echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>'; 
			$insert_id = mysqli_insert_id($dbc);
			
			 # Access session.
    		session_start();
			$_SESSION[ 'user_id' ] = $insert_id;
  		  	$_SESSION[ 'first_name' ] = $fn;
			$_SESSION[ 'last_name' ] = $ln;
			$_SESSION[ 'email' ] = $e ;
			$_SESSION[ 'phone_number' ] = $pnum;
			
	 	if( isset($_SESSION['first_name']))
        {		
				load ('home.php') ;

		}
  
	    # Close database connection.
	    mysqli_close($dbc); 
	    exit();
	  }
	}

?>
