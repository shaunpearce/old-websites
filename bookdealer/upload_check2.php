<?php
	$page_title = 'Upload' ;
	include ( 'header.php' ) ;
	
	require ( 'upload_tools.php' ) ;
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php

	echo'
	
		
	<div class="big_item">
	
	';
?>

<h2 id="formtitle">Upload</h2>
  
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="progress">
  <div class="circle done">
    <span class="label">1</span>
    <span class="title">Book</span>
  </div>
  <span class="bar done"></span>
  <div class="circle done">
    <span class="label">2</span>
    <span class="title">Sale</span>
  </div>
  <span class="bar done"></span>
  <div class="circle done">
    <span class="label">3</span>
    <span class="title">Picture</span>
  </div>
  <span class="bar half"></span>
  <div class="circle active">
    <span class="label">4</span>
    <span class="title">Review</span>
  </div>
  
</div>




<?php


if(!empty($_SESSION['title']) && !empty($_SESSION['author']) && !empty($_SESSION['book_condition']) && !empty($_SESSION['book_price']) && !empty($_SESSION['slct1']) && !empty($_SESSION['book_image']))
{
	?>
    

        
 <?php
 
}
else{
	echo"ERROR, Required Information has not been entered, please enter in all required information";
	echo "<a href='upload1.php'>Sell Book</a>";
	
}

 echo'
		  <div id="top">
		  <h2 id="big_price">Price: €'.$_SESSION['book_price'].'</h2>
		  <img id="location_pic" src="includes/location2.png"><br>
		  Location: '.$_SESSION['slct1'].'<br>';
				  if(!empty($_SESSION['slct2'])){
					  echo'College: '.$_SESSION['slct2'].'<br>';
				  }
			  echo'
		  </div>
		  
			  
			 <h1 id="big_title">'.$_SESSION['title'].'
			 </h1>
			  <img id="big_pic" src= '.$_SESSION['book_image'].'> 
			  
			  
			  
		  
			  <h3 class="info" id="book_info"><img id="author_pic" src="includes/author.png">Author: <span class="itl">'.$_SESSION['author'].'</span><br><br>
													  ';
													  
													  if(!empty($_SESSION['book_edition'])){
														  echo'<img id="edition_pic" src="includes/edition2.png"> &nbspEdition: '.$_SESSION['book_edition'].'<br><br>';
													  }
													  if(!empty($_SESSION['book_language'])){
														  echo'<img id="edition_pic" src="includes/language2.png">  &nbspLanguage: <span class="itl">'.$_SESSION['book_language'].'</span><br><br>';
													  }
													  echo'
													  </span>				
			  </h3>
			  
			  
			  <h3 id="desc"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><img id="big_desc" src="includes/description.png"><br><br>Description:</h3>
			  <p id="desc_text">
				  '.$_SESSION['book_desc'].'
			  </p>
			  
			   
			   
			   <br><h3><img id="comments_pic" src="includes/comment.png"><br><br>
			   Sellers Comments: </h3>
			  <p id="comments_text">
				  '.$_SESSION['user_comments'].'
				  Condition: '.$_SESSION['book_condition'].'<br><br>
				  
				  
			  </p>
			  
			  
			   
				<h3><img id="contact_pic" src="includes/contact2.png"><br>Contact:<br><br>
			  <p id= "contact_details">
				  ';
					  if($_SESSION['contact_email'] == "yes")
					  {		
							 
						 echo'Email: <a href="mailto:'.$_SESSION['contact_email'].'">'.$_SESSION[ 'first_name' ].'</a><br>';
							  
							  
					  }
					  if($_SESSION['contact_phone'] == "yes")
					  {
						   echo'Phone: '.$_SESSION['phone_number'].'';
					  }	
					  
				  echo'
				  
			  </p>
			  
			   </h3>
			';
			
?> 

<div id="payment">

<h2 id="checkmessage">Check if the above information is correct, then Submit it</h2><br>
<iframe src="http://www.paywithatweet.com/dlbuttoncm.php?id=1cebdb13-2721-4145-bbd0-062ab8153175" class="br-right-md" name="paytweet_button" scrolling="no" frameborder="no" height="28px" width="200px"></iframe>
    
    <iframe src="http://www.paywithatweet.com/dlbuttoncm.php?id=8d66d6d4-32da-43f7-8acb-aa5f197548b6" class="br-right-md" name="paytweet_button" scrolling="no" frameborder="no" height="28px" width="270px"></iframe><br><br />
        
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="F62TU6F3X4D8E">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</div>

		
<?php

	echo'</div>';

	include ( 'footer.html' ) ;
?>