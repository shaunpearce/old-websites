<?php
session_start();
 require ( '../connect_db.php' ) ;
 
 $passkey = $_GET['passkey'];
 
 $q2 = "SELECT * FROM users WHERE com_code='$passkey' ";
 $r2 = mysqli_query ( $dbc, $q2 ) ;

if(mysqli_num_rows($r2) == 1)
{
	$row = mysqli_fetch_array($r2, MYSQLI_ASSOC);


   $sql = "UPDATE users SET com_code='Valid' WHERE com_code='$passkey'";
   $result = @mysqli_query ( $dbc, $sql ) ;
   if($result)
   {
		//Add user details to session varibales that will be used throughout their time logged in to provide a more personal experience
		$_SESSION[ 'user_id' ] = $row['user_id'];
		$_SESSION[ 'first_name' ] = $row[ 'first_name' ];
		$_SESSION[ 'last_name' ] = $row[ 'last_name' ];
		$_SESSION[ 'email' ] = $row[ 'email' ];
		$_SESSION[ 'phone_number' ] = $row[ 'phone_number' ];
		$_SESSION[ 'lc' ] = "Valid" ;
		
		if( isset($row[ 'user_county' ])) $_SESSION[ 'user_county' ] = $row[ 'user_county' ];
		if( isset($row[ 'user_college' ])) $_SESSION[ 'user_college' ] = $row[ 'user_college' ];
		if( isset($row[ 'user_course' ])) $_SESSION[ 'user_course' ] = $row[ 'user_course' ];
		
		
		require ( 'login_tools.php' ) ;
		
		$note = "Your Account is now Validated and you have Lecturer/ Class Rep Status. \n This allows you to create modules and add book lists to them";
		include ( 'home.php' ) ;
		return $note;

   }
   else
   {
	  echo "Some error occur.";
   }
}
?>