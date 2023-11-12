<?php

require ( '../connect_db.php' ) ;
require ( 'register_tools.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' )
{
	$query = $_GET['query']; // holds the input data
	$field= $_GET['field']; // holds the name of field
	
	if($field != 'email') $query = urlencode ($query);
	
	$msg = validation($query, $field);
	
   if($field != 'pass')
   {
    	if( $msg == 'Valid')
		{
			echo'<img src="includes/valid.png" style="width:15px;height:15px"><font color=green> VALID</font>';
		}
		else
		{
			echo "<font color=red>".$msg."</font>";
		}
   	}
	
	if($field == 'pass')
	{
			$strength = 0;
			if(validation($query, $field) != 'Valid' ) 
			{
					$strength = -1;
			}
			else{
				
			  if (preg_match_all('$\S*(?=\S{6,})\S*$', $query)) $strength++;
			  if (preg_match_all('$\S*(?=\S*[a-z])\S*$', $query)) $strength++;
			  if (preg_match_all('$\S*(?=\S*[A-Z])\S*$', $query)) $strength++;
			  if (preg_match_all('$\S*(?=\S*[\d])\S*$', $query)) $strength++;
			  if (preg_match_all('$\S*(?=\S*[\W])\S*$', $query)) $strength++;
			  if((strlen($query) >= 8))  $strength++;
			}
			
			switch ($strength) {
    		case "1";
        	echo "<font color=red>Weak</font>";
        	break;
    		case "2":
			case "3":
        	echo'<font color=orange>Weak</font>';
        	break;
    		case "4":
        	echo'<font color=green>Strong</font>';
			break;
			case "5":
			echo'<font color=green>Very Strong</font>';
        	break;
			case "-1":
			echo'<font color=red>Too Short</font>';
        	break;
   			 default:
        	echo "<font color=red>Invalid</font>";
			}
	}
	
	
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	  // Create form elements, values and error arrays
	  $formElements = array("first_name", "last_name", "phone_number", "email", "pass");
	  $tableValues = array();
	  $errors = array();
	  
	  //Position for table values array
	  $i = 0;
	  
	  foreach ( $formElements as $element)
	  {
		  	$msg = validation($_POST[$element], $element);
			if($msg == 'Valid')
			{
				$tableValues[$i] = mysqli_real_escape_string( $dbc, trim( $_POST[ $element ] ) ) ;
			}
			else
			{
				$errors[] = $msg;	
			}
			$i++;
	  }
	  
	  
	  //Check Passwords Match
	  if($_POST['pass'] != $_POST['pass2'])
	  {
		 $errors[] = 'Passwords do not match';
	  }
	  
	  //If enteries are all valid create variables and insert form enteries. Insert value into the table
	  if(empty($errors))
	  {
		$fn = $tableValues[0];
	  	$ln = $tableValues[1];
	  	$pnum = $tableValues[2];
	  	$e = $tableValues[3];
	  	$p = $tableValues[4];
		
		insert($dbc, $fn, $ln, $pnum, $e, $p);
		
	  }
	  //Otherwise report errors.
	  else
	  {
		
	
		include ( 'register.php' ) ;
			
			
		
		
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
		
		$e = 'Shannn';
		return $errors;
	    # Close database connection.
	    mysqli_close( $dbc );
	  }
}
?>