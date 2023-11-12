<?php
session_start();
require ( '../connect_db.php' ) ;
require ( 'register_tools.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' )
{
	
	$query = $_GET['query']; // holds the input data
	$field= $_GET['field']; // holds the name of field

	
	if($field != pass)
	{
		$msg = validation($query, $field);
		if($msg == 'Valid')
		{
				$uid = $_SESSION[ 'user_id' ];
			
				$new = mysqli_real_escape_string( $dbc, trim( $query ) );
				
				$q = "UPDATE users SET $field = '$new' WHERE  user_id = '$uid'";
				$r = @mysqli_query ( $dbc, $q ) ;
				if ($r)
				{  		  $_SESSION[ $query ] = $query;
						 echo'<font color=#0FC57C>Saved!</font>';
				}
		}
		else
		{
				 echo'<font color=red>'.$msg.'</font>';
		}
	}
	
	else{
		
		//echo sha1('$query');
		//echo sha1($query);
		
		$uid = $_SESSION['user_id'];
		$q = "SELECT pass FROM users WHERE user_id = $uid";
		$r = mysqli_query($dbc, $q);

		$row = mysqli_fetch_array($r);
		//echo'This is the searched user id for the book id that has been passed(Trying to delete): ';

		$p = $row['pass'];
		
		//if match old pass	
		if( sha1($query) == $p)
		{
			//if 2 passwords match
			$new1 =  $_GET['new1'];
			$new2 =  $_GET['new2'];			
			
			if($new1 == $new2)
			{
				//if passwords are valid
				$msg = validation($new1, 'pass');
				if( $msg == 'Valid')
				{  
				  $newpass = sha1($new1);
				  $q = "UPDATE users SET pass = '$newpass' WHERE  user_id = '$uid'";
				  $r = @mysqli_query ( $dbc, $q ) ;
				  if ($r)
				  {  		
						echo'<font color=#0FC57C>Saved!</font>';
				  }	
				}
				else{
					echo'<font color=red>'.$msg.'</font>';
				}
			}
			else{
					echo'<font color=red>Passwords Dont match</font>';
				}
		}	
		else{
				echo'<font color=red>Incorrect old password</font>';
		}	
	}
}

?>