<?php

include ( 'header.php' ) ;
require ('../connect_db.php'); 
?>




<div class="listedbooks">


<?php
		
	if(isset($error))
	{
		echo $error;	
	}	
		
	if(isset($_SESSION[ 'user_id' ]))
	{
		//Find books user has uploaded 
		$uid = $_SESSION[ 'user_id' ];
		$q = "SELECT * FROM books WHERE user_id = $uid";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_num_rows($r) >= 1)
		{		
			while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{	
				echo '
					<a class ="view_button" href="view.php?id='.$row['book_id'].'">	
					  <div class="item">  
						 
						  <img id="pic" src= '.$row['book_img'].'> 
						  <h6 id="top">'.$row['post_time'].'</h6>
						  <h1 id="tle">'.$row['book_title'].'</h1>
						  
					  
						  <h3 class="info" id="left"><br>Author: '.$row['book_author'].'<br>
																  ';
																  if(!empty($row['book_edition'])){
																	  echo'Edition: '.$row['book_edition'].'<br>';
																  }
																  echo'
						  <h3>
						  
						  <h3 class="info" id="right">
										  <br>Price: '.$row['book_price'].'<br><br>
										  ';
										  if(!empty($row['user_college'])){
											  echo'College: '.$row['user_college'].'<br>';
										  }
										  echo'
										  <br>
						  </h3>	   
					</div>	
				
				';
				
				
				//For Security
				$link = "deletebook.php?&bookid=".urlencode(base64_encode($row['book_id']))."&uid=".urlencode(base64_encode($row['user_id']));
				echo '<a href="'.$link.'" id="options">Delete</a>';
				//echo '<a href="deletebook.php?&bookid='.$row['book_id'].'&uid='.$row['user_id'].'" id="options">Delete</a>';

				echo'<br><br>';
				
				
			}
		}
		else
		{
			echo" You have not uploaded any Books";	
		}
			
	}
	else{
			
			echo" Please login to see the books you have uploaded";	
		
	}
	
	
	


?>





</div>




 <?php

# Display footer section.
include ( 'footer.html' ) ;
?>