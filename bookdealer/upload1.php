<?php
	$page_title = 'Upload' ;
	session_start();
	if( isset($_SESSION['first_name']))
{
	include ( 'header.php' ) ;
?>

<?php



?>

 <div id="uploadform" class="uploadform">
 
 
  <h2 id="formtitle">Upload</h2>
  
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="progress">
  <div class="circle active">
    <span class="label">1</span>
    <span class="title">Book</span>
  </div>
  <span class="bar"></span>
  <div class="circle">
    <span class="label">2</span>
    <span class="title">Sale</span>
  </div>
  <span class="bar"></span>
  <div class="circle">
    <span class="label">3</span>
    <span class="title">Picture</span>
  </div>
  <span class="bar"></span>
  <div class="circle">
    <span class="label">4</span>
    <span class="title">Review</span>
  </div>
  
</div>
 
 <div id="uploaderrors" class="uploaderrors"> 
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
 
 	<form action="upload1_action.php" method="post" enctype="multipart/form-data" >

	

    <h3 id="uploadtitle">Book Info:</h3>
     
 	<label for="Title">Title</label>   
    <input type="text" name="title" size="30" id="titl" onkeyup="autoupload()" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" placeholder="*Required">
     
       <br>
     
      <label for="Author">Author</label>
      <input type="text" id= "author" name="author" size="30" value="<?php if (isset($_POST['author'])) echo $_POST['author']; ?>" placeholder="*Required"><br>
      
      <label for="Edition">Edition</label> 
      <input type="text" name="book_edition" size="30" value="<?php if (isset($_POST['book_edition'])) echo $_POST['book_edition']; ?>"><br>
      
      <label for="Language">Language</label>
      <input type="text" name="book_language" size="30" value="<?php if (isset($_POST['book_language'])) echo $_POST['book_language']; ?>"><br>
      
      <label for="Description">Description</label>
      <br> <textarea rows = "5" cols="70" type="text" name="book_desc" size="30" value="<?php if (isset($_POST['book_desc'])) echo $_POST['book_desc']; ?>"></textarea><br>
       
      
      
<br><br>
<input type='submit' value='Next'>
</form>


   
 </div>

<?php

?>

<?php
	include ( 'footer.html' ) ;
 }
		
	else{
		include('login.php');	
		}
?>



