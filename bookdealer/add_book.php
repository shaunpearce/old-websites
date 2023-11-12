<?php
session_start();

include ( 'header.php' ) ;
$_SESSION['m'] = $_GET['module_id'];

//require ('../connect_db.php'); 
?>





<div class="modulebooks">


<div id="errors" class="errors"> 
		
			<?php
			if(isset($errors))
			{
			echo'<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';	
			  foreach ( $errors as $error )
			  { 
				  echo " - $error<br>" ; 
			  }
			   echo 'Please try again.</p>';
			}
			
			?>
    	
  </div>
  


	<form action="modulebook_action.php" method='post'>

<div id="addbooks">

      <h1>Add Book</h1><br>   
      <label for="bookname">Book Title</label>
      <input id='booktitle' type="text" name="modulebook_title" size="30" placeholder= "Book Title" value="<?php if (isset($_POST['modulebook_title'])) echo $_POST['modulebook_title'];?>"> 
     <br><br />
     <label for="author">Book Author</label>
      <input id='bookauthor' type="text" name="modulebook_author" size="30" placeholder= "Book Author" value="<?php if (isset($_POST['modulebook_author'])) echo $_POST['modulebook_author']; ?>"> 
	<br><br />
      <label for="edition">Edition</label>
      <input id='bookedition' type="text" name="modulebook_adition" size="30" placeholder= "Book Edition" value="<?php if (isset($_POST['modulebook_edition'])) echo $_POST['modulebook_edition'];?>"> 
    
  <input id="addbooksbutton" type='submit' value='Add Book'>
  <input type='hidden' name='form' value='1'>
  </form>
  
  </div>
  </div>



</div>


<?php

# Display footer section.
include ( 'footer.html' ) ;
?>