<?php # PROCESS LOGIN ATTEMPT.

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( '../connect_db.php' ) ;

  # Get connection, load, and validate functions.
  require ( 'login_tools.php' ) ;

  # Check login.
  list ( $check, $data ) = validate ( $dbc, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

  # On success set session data and display logged in page.
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
	$_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
	$_SESSION[ 'email' ] = $data[ 'email' ] ;
	$_SESSION[ 'phone_number' ] = $data[ 'phone_number' ] ;
	$_SESSION['logged_in'] = true;
	$_SESSION[ 'lc' ] = $data[ 'com_code' ] ;
	
	if( isset($data[ 'user_county' ])) $_SESSION[ 'user_county' ] = $data[ 'user_county' ];
		if( isset($data[ 'user_college' ])) $_SESSION[ 'user_college' ] = $data[ 'user_college' ];
		if( isset($data[ 'user_course' ])) $_SESSION[ 'user_course' ] = $data[ 'user_course' ];
	
	
	 load ( 'home.php') ;
	// $pg = $_SESSION['pg'].'.php';
	 //load( $pg);
	    
  }
  # Or on failure set errors.
  else {
	  include ( 'login.php' ) ;
	  
	   //$errors = $data;
	   $errors = 'The information you have entered is incorrect';
	   return $errors;
	} 

  # Close database connection.
  mysqli_close( $dbc ) ; 
}

# Continue to display login page on failure.


?>