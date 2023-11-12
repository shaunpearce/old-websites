<?php
session_start();
require ( '../connect_db.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	  // Create form elements, values and error arrays
	  $formElements = array("module_name", "module_code", "module_college", "module_year");
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
	  	$mc = $tableValues[1];
	  	$mu = $tableValues[2];
	  	$my = $tableValues[3];
		$uid = $_SESSION['user_id'];
		
		// Inserting form values into 'users' database table.
	    $q = "INSERT INTO modules (module_name, module_code, module_college, module_year, user_id) VALUES ('$mt', '$mc', '$mu', '$my','$uid')";
	    $r = @mysqli_query ( $dbc, $q ) ;
	    if ($r)
		 {  			
			require ( 'login_tools.php' ) ;
			
		
				load ('modules.php') ;
				
		  # Close database connection.
		  mysqli_close($dbc); 
		  exit();
		}
	  }
	  //Otherwise report errors.
	  else
	  {
		include ( 'add_module.php' ) ;
		//include ( 'header.php' ) ;
		/*echo'
		
		<div id="errors" class="errors">	';  
			echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
			foreach ( $errors as $error )
			{ 
				echo " - $error<br>" ; 
			}
			echo 'Please try again.</p>';
		echo'</div>';
	    //include ( 'footer.html' ) ;
		*/
		
		//$e = 'Shannn';
		return $errors;
	    # Close database connection.
	    mysqli_close( $dbc );
	  }
}

?>
