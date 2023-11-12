<?php
require ( '../connect_db.php' ) ;
require ( 'upload_tools.php' ) ;
require ( 'login_tools.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	// Create form elements, values and error arrays
	  $formElements = array("book_condition","book_price", "slct1");
	  $tableValues = array();
	  $errors = array();
	  
	  //Position for table values array
	  $i = 0;
	 
	  foreach ( $formElements as $element)
	  {
		  	$msg = validateBook($_POST[$element], $element);
			if($msg != 'Valid')
			{
				//$tableValues[$i] = mysqli_real_escape_string( $dbc, trim( $_POST[ $element ] ) ) ;
				$errors[] = $msg;
			}
			$i++;
	  } 
	  
	  if(empty($_POST['contact_email']) && empty($_POST['contact_phone']))
	{
	  	$errors[] = 'Please Select one way to Contact you.' ;
	 }

	
	if(empty($errors))
	  {
		session_start();
		
		$_SESSION['book_condition'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_condition'] ) );
		$_SESSION['book_price'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_price'] ) );
		$_SESSION['slct1'] = $_POST['slct1'];
		
	
		if (isset($_POST['user_comments']))$_SESSION['user_comments'] = mysqli_real_escape_string( $dbc, trim( $_POST['user_comments'] ) );
		
		if (isset($_POST['contact_email']))
		{ 
			$_SESSION['contact_email'] = "yes";
		}
		else 
		{
			$_SESSION['contact_email'] = "no";
		}
		if (isset($_POST['contact_phone']))
		{
			$_SESSION['contact_phone'] = "yes";
		}
		else 
		{
			$_SESSION['contact_phone'] = "no";
		}
		
		if (isset($_POST['slct2'])) $_SESSION['slct2'] = $_POST['slct2'];
	
		load ( 'upload3.php') ;
	  }
	  //Otherwise report errors.
	  else
	  {
		include ( 'upload2.php' ) ; 
		return $errors;	
	    # Close database connection.
	    mysqli_close( $dbc );
	  }
}

?>