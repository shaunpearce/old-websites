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
  <div class="circle done">
    <span class="label">1</span>
    <span class="title">Book</span>
  </div>
  <span class="bar done"></span>
  <div class="circle done">
    <span class="label">2</span>
    <span class="title">Sale</span>
  </div>
  <span class="bar half"></span>
  <div class="circle active">
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
 
 	<form action="upload3_action.php" method="post" enctype="multipart/form-data" >

	

    <h1>Image:</h1><br><br>    
        <label for="Upload">Selelect Files to Upload</label>
    	<input type="file" name="fileToUpload" id="fileToUpload">
  
      
<br><br>
<input type='submit' value='Next'>
</form>


<br><br><br>

<h3>Test out upload via webcam early functionality <br>(Work In Progress)</h3>
<a href="testcam.php"> Test</a>



<?php

?>

<?php
	include ( 'footer.html' ) ;
 }
		
	else{
		include('login.php');	
		}
?>