<?php
session_start();
require ('../connect_db.php');
require ( 'login_tools.php' ) ;

if(isset($_SESSION[ 'user_id' ]))
	{
		$uid = $_SESSION[ 'user_id' ];
	
		$q = "SELECT user_module_id1, user_module_id2, user_module_id3, user_module_id4, user_module_id5, user_module_id6, user_module_id7, user_module_id8, user_module_id9, user_module_id10, user_module_id11, user_module_id12, user_module_id13, user_module_id14, user_module_id15, user_module_id16, user_module_id17, user_module_id18,user_module_id19, user_module_id20  FROM users WHERE user_id = $uid";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_num_rows($r) == 1)
		{		
		//if not in table already, add
		
		 //Query user row
		 //While 
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			$num = 1;
			$strnum = strval($num);
			$mid = 'user_module_id' . $strnum;
			$m = $_GET['module_id'];
		
			while ($row[$mid] != NULL)
			{
			//Use this while loop for when change so that users can delete modules.	
			//while($m != "user_module_id20");	
			//{	
				if(	$row[$mid] == $m)
				{
					$added = true;	
				}
				$num++;	
				$strnum = strval($num);
			    $mid = 'user_module_id' . $strnum;
			}
					
			if($added != true)
			{		
				$q2 = "UPDATE users SET $mid = '$m' WHERE  user_id = '$uid'";
				$r2 = @mysqli_query ( $dbc, $q2 ) ;
				if ($r2)
				{
					//load ('view_booklist.php') ;			
				  header( "refresh:2; url=modules.php" );
				}
			}
			else{
				
			 	 load ('modules.php') ;
				//header( "url=view_booklist.php" );	
				
			}
		
	}
}

?>

