<?php
require ( '../connect_db.php' ) ;
require ( 'upload_tools.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	// Create form elements, values and error arrays
	  $formElements = array("title", "author", "book_condition","book_price", "slct1");
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
		$picmsg = pic($_POST['title']);
		/*if($picmsg != 'Uploaded')
		{
			$errors[] = $picmsg;	
		}*/
		
		if($picmsg == 'Sorry, there was an error uploading your file.')
		{
			$errors[] = $picmsg;	
		}
		else{
			$imagepath = $picmsg; 	
		}
	  }
	
	if(empty($errors))
	  {
		session_start();
		
		$_SESSION['book_image'] = $imagepath;
		
		$_SESSION['title'] = mysqli_real_escape_string( $dbc, trim( $_POST['title'] ) );
	  	$_SESSION['author'] = mysqli_real_escape_string( $dbc, trim( $_POST['author'] ) );
		$_SESSION['book_condition'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_condition'] ) );
		$_SESSION['book_price'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_price'] ) );
		$_SESSION['slct1'] = $_POST['slct1'];
	
		if (isset($_POST['book_edition']))$_SESSION['book_edition'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_edition'] ) );
		if (isset($_POST['book_language']))$_SESSION['book_language'] =mysqli_real_escape_string( $dbc, trim( $_POST['book_language'] ) );
		if (isset($_POST['book_desc']))$_SESSION['book_desc'] = mysqli_real_escape_string( $dbc, trim( $_POST['book_desc'] ) );
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
	
	    require ( 'login_tools.php' ) ;
		load ( 'upload_check2.php') ;
		
	  }
	  //Otherwise report errors.
	  else
	  {
		include ( 'upload.php' ) ; 
		return $errors;	
	
	    # Close database connection.
	    mysqli_close( $dbc );
	  }
}

?>