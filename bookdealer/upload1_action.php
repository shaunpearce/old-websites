<?php
require ( '../connect_db.php' ) ;
require ( 'upload_tools.php' ) ;
require ( 'login_tools.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	// Create form elements, values and error arrays
	  $formElements = array("title", "author");
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
	
	if(empty($errors))
	  {
		session_start();
		
		$_SESSION['title'] = mysqli_real_escape_string( $dbc, trim( $_POST['title'] ) );
	  	$_SESSION['author'] = mysqli_real_escape_string( $dbc, trim( $_POST['author'] ) );
		
	
		if (isset($_POST['book_edition']))$_SESSION['book_edition'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_edition'] ) );
		if (isset($_POST['book_language']))$_SESSION['book_language'] =mysqli_real_escape_string( $dbc, trim( $_POST['book_language'] ) );
		if (isset($_POST['book_desc']))$_SESSION['book_desc'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_desc'] ) );
		
		load ( 'upload2.php') ;
	  }
	  //Otherwise report errors.
	  else
	  {
		include ( 'upload1.php' ) ;  
		return $errors;	
		
		# Close database connection.
	    mysqli_close( $dbc );
	  }
}

?>