<?php
	$page_title = 'Books' ;
	include ( 'header.php' ) ;
?>


<?php

require ('../connect_db.php'); 

if(isset($_GET['id'])) $id = $_GET['id'];


$q = "SELECT * FROM books WHERE book_id = $id";
$r = mysqli_query($dbc, $q);

if(mysqli_num_rows($r) == 1)
{
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	
	echo'
	
		
	<div class="big_item">
			
		  <div id="top"><h6>'.$row['post_time'].'<h6>
		  <h2 id="big_price">Price: €'.$row['book_price'].'</h2>
		  <img id="location_pic" src="includes/location2.png"><br>
		  Location: '.$row['user_location'].'<br>';
				  if(!empty($row['user_college'])){
					  echo'College: '.$row['user_college'].'<br>';
				  }
			  echo'
		  </div>
		  
			  
			 <h1 id="big_title">'.$row['book_title'].'
			 </h1>
			  <img id="big_pic" src= '.$row['book_img'].'> 
			  
			  
			  
		  
			  <h3 class="info" id="book_info"><img id="author_pic" src="includes/author.png">Author: <span class="itl">'.$row['book_author'].'</span><br><br>
													  ';
													  
													  if(!empty($row['book_edition'])){
														  echo'<img id="edition_pic" src="includes/edition2.png"> &nbspEdition: '.$row['book_edition'].'<br><br>';
													  }
													  if(!empty($row['book_language'])){
														  echo'<img id="edition_pic" src="includes/language2.png">  &nbspLanguage: <span class="itl">'.$row['book_language'].'</span><br><br>';
													  }
													  echo'
													  </span>	
													 			
			  </h3>
			  
			  
			  <h3 id="desc"><br><br><br><br><br><br><br><br><br><br><img id="big_desc" src="includes/description.png"><br><br>Description:</h3>
			  <p id="desc_text">
				  '.$row['book_desc'].'
			  </p>
			  
			  <h3><img id="big_desc" src="includes/description.png"><br><br>Condition:</h3>'.$row['book_condition'].'
			  
			   
			   
			   <br><h3><img id="comments_pic" src="includes/comment.png"><br><br>
			   Sellers Comments: </h3>
			  <p id="comments_text">
				  '.$row['user_comments'].'
				  <br><br>
				  
				  
			  </p>
			  
			  
			   
				<h3><img id="contact_pic" src="includes/contact2.png"><br>Contact:<br>
			  <p id= "contact_details">
				  ';
				  
				  if(isset($_SESSION['first_name'])){
					  
					  if(!empty($row['user_email']))
					  {		
							  $q2 = "SELECT first_name FROM users WHERE user_id = ".$row['user_id'] ."";
							  $r2 = mysqli_query($dbc, $q2);
							  if(mysqli_num_rows($r2) == 1)
							  {
								  $row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC);
								  echo'Email: <a href="mailto:'.$row['user_email'].'">'.$row2['first_name'].'</a><br>';
							  }
							  
					  }
					  if(!empty($row['user_tel']))
					  {
						   echo'Phone: '.$row['user_tel'].'';
					  }	
				  }
				  else
				  {
					 echo'Please <a href="register.php"> Register </a> or <a href="login.php">Login</a> to view contact information'; 
					 
				  }
				  echo'
				  
			  </p>
			  
			   </h3>
			 
			 <h3 id="flag"><img id="contact_pic" src="includes/flagicn.png"> <a href="mailto:support@bookdealer.ie?subject=Report Ad&body=I have spotted this ad with the id:  '.$row['book_id'] .' and I would like to report it for the following reasons">Flag/Report Ad</a></h3>
	  </div>	
		
	';
}
?>

<?php
	include ( 'footer.html' ) ;
?>