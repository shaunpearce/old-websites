<?php
require ( '../connect_db.php' ) ;
require ( 'upload_tools.php' ) ;
require ( 'login_tools.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
	if(empty($errors))
	  {
		$picmsg = pic($_SESSION['title']);
		/*if($picmsg != 'Uploaded')
		{
			$errors[] = $picmsg;	
		}*/
		
		if($picmsg != 'Valid')
		{
			$errors[] = $picmsg;	
		}
	  }
	
	if(empty($errors))
	  {
		load ( 'upload_check2.php') ;
		
	  }
	  //Otherwise report errors.
	  else
	  {
		include ( 'upload3.php' ) ; 
		return $errors;	
	
	    # Close database connection.
	    mysqli_close( $dbc );
	  }
}
