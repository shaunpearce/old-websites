<?php
session_start();
require ( '../connect_db.php' ) ;
$errors = array() ; 

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	  // Create form elements, values and error arrays
	  $formElements = array("modulebook_title", "modulebook_author");
	  $tableValues = array();
	  $errors = array();
	  
	  //Position for table values array
	  $i = 0;
	  
	  foreach ( $formElements as $element)
	  {
			if(isset($_POST[$element])) 
			{
				$tableValues[$i] = mysqli_real_escape_string( $dbc, trim( $_POST[ $element ] ) ) ;
			}
			else
			{
				$errors[] = 'Please fill in'.$element.'';
			}
			$i++;
	  }
	  

	  //If enteries are all valid create variables and insert form enteries. Insert value into the table
	  if(empty($errors))
	  {
		$mt = $tableValues[0];
	  	$ma = $tableValues[1];
		
	   if(isset($_POST['modulebook_edition']))
	   {
		   $me = $_POST['modulebook_edition'];
	   }
	
		$uid = $_SESSION['user_id'];
		//$mid = 3;
		$mid = $_SESSION['m'];	
			
		// Inserting form values into 'users' database table.
	    $q = "INSERT INTO modulebooks (modulebook_title, modulebook_author, modulebook_edition, module_id) VALUES ('$mt', '$ma', '$me','$mid')";
	    $r = @mysqli_query ( $dbc, $q ) ;
		
		$insert_id = mysqli_insert_id($dbc);	
		
		$q3 = "SELECT * FROM modules WHERE module_id = '$mid'";
		$r3 = mysqli_query($dbc, $q3);
		
		if(mysqli_num_rows($r3) == 1)
		{		
			
			$row = mysqli_fetch_array($r3, MYSQLI_ASSOC);
			
			$bnum = 1;
			$bstrnum = strval($bnum);
			$bid2 = 'book_id'.$bstrnum;	
					
			//Get Modules
			while($row[$bid2] != NULL && $bid2 != 'book_id5')
			{
				$bnum++;	
				$bstrnum = strval($bnum);
				$bid2 = 'book_id' . $bstrnum;
			}
			
		if($bid2 == 'book_id5' && $row[$bid2] != NULL)
		{
			$errors[] = 'Sorry you have reached the maximum amount of books allowed in a book list. Please delete some to make space';
			 include ( 'module_settings.php' ) ;
			 
			 return $errors;
		}
		else{
		  	$q2 = "UPDATE modules SET $bid2 = '$insert_id' WHERE  module_id = '$mid'";
		  $r2 = @mysqli_query ( $dbc, $q2 ) ;
		  
		  if ($r && $r2)
		   {  			
			  require ( 'login_tools.php' ) ;
			  load ('module_settings.php') ;
				  
			# Close database connection.
			mysqli_close($dbc); 
			exit();
		  }
		}
	}
 }
	  //Otherwise report errors.
	  else
	  {
		include ( 'add_book.php' ) ;
		
		return $errors;
	    # Close database connection.
	    mysqli_close( $dbc );
	  }
}

?>
