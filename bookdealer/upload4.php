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


	<table><tr><td valign=top>
	<h1>JPEGCam Test Page 2</h1>
	<h3>Demonstrates a two-step implementation: capture, then upload.</h3>
	
	<!-- First, include the JPEGCam JavaScript Library -->
	<script type="text/javascript" src="js/webcam.js"></script>
	
	<!-- Configure a few settings -->
	<script language="JavaScript">
		webcam.set_api_url( 'test.php' );
		webcam.set_quality( 90 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound
	</script>
	
	<!-- Next, write the movie to the page at 320x240 -->
	<script language="JavaScript">
		document.write( webcam.get_html(320, 240) );
	</script>
	
	<!-- Some buttons for controlling things -->
	<br/><form>
		<input type=button value="Configure..." onClick="webcam.configure()">
		&nbsp;&nbsp;
		<input type=button value="Capture" onClick="webcam.freeze()">
		&nbsp;&nbsp;
		<input type=button value="Upload" onClick="do_upload()">
		&nbsp;&nbsp;
		<input type=button value="Reset" onClick="webcam.reset()">
	</form>
	
	<!-- Code to handle the server response (see test.php) -->
	<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );
		
		function do_upload() {
			// upload to server
			document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
			webcam.upload();
		}
		
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML = 
					'<h1>Upload Successful!</h1>' + 
					'<h3>JPEG URL: ' + image_url + '</h3>' + 
					'<img src="' + image_url + '">';
				
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>
	
	</td><td width=50>&nbsp;</td><td valign=top>
		<div id="upload_results" style="background-color:#eee;"></div>
	</td></tr></table>



<?php

?>

<?php
	include ( 'footer.html' ) ;
 }
		
	else{
		include('login.php');	
		}
?>