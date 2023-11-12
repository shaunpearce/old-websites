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
 
 	<form action="upload_action.php" method="post" enctype="multipart/form-data" >

	

    <h1>Book Info:</h1><br><br>
     
 	<label for="Title">Title</label>   
    <input type="text" name="title" size="30" id="b_id" onkeyup="autocomplet()" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" placeholder="*Required">
     
       <br>
     
      <label for="Author">Author</label>
      <input type="text" id= "author" name="author" size="30" value="<?php if (isset($_POST['author'])) echo $_POST['author']; ?>" placeholder="*Required"><br>
      
      <label for="Edition">Edition</label> 
      <input type="text" name="book_edition" size="30" value="<?php if (isset($_POST['book_edition'])) echo $_POST['book_edition']; ?>"><br>
      
      <label for="Language">Language</label>
      <input type="text" name="book_language" size="30" value="<?php if (isset($_POST['book_language'])) echo $_POST['book_language']; ?>"><br>
      
      <label for="Description">Description</label>
      <br> <textarea rows = "5" cols="70" type="text" name="book_desc" size="30" value="<?php if (isset($_POST['book_desc'])) echo $_POST['book_desc']; ?>"></textarea><br>
      
      <br>
         
        <label for="Upload">Selelect Files to Upload</label>
    	<input type="file" name="fileToUpload" id="fileToUpload">
      <br><br><br><br>
    
    <h1>Sale Info: </h1><br>
	<label for="Condition">Condition</label>
    <select name="book_condition"> 
     	<option value="*Required" disabled selected>*Required</option>
        <option value="Brand New" <?php if( isset($_POST['book_condition'])) { echo($_POST['book_condition']=='Brand New'?'selected="selected"':'');}?>> Brand New</option>
        <option VALUE="Used w/o Markings" <?php if( isset($_POST['book_condition'])) { echo($_POST['book_condition']=='Used w/o Markings'?'selected="selected"':'');}?>> Used w/o Markings</option> 
        <option VALUE="Used w/ Markings"<?php if( isset($_POST['book_condition'])) { echo($_POST['book_condition']=='Used w/ Markings'?'selected="selected"':'');}?>> Used w/ Markings</option> 
    </select>
                          
	<br>
	<label for="Comments">Sellers Comments</label>
     <br> <textarea rows = "5" cols="70" type="text" name="user_comments" size="30" value="<?php if (isset($_POST['user_comments'])) echo $_POST['user_comments']; ?>"></textarea><br><br>
    
  <label for="Price">Price</label> 
  <input type="number" name="book_price" size="30" value="<?php if (isset($_POST['book_price'])) echo $_POST['book_price']; ?>" placeholder="*Required"> <br>
    
     <label for="Contact">Contact Info</label>
     
    <div id="contact" class="checkboxes">  
      Email <input type="checkbox" name="contact_email" <?php if(isset($_POST['contact_email']))echo'checked'; ?>/>
      Phone <input type="checkbox" name="contact_phone" <?php if(isset($_POST['contact_phone']))echo'checked'; ?>/>
    </div>
    
    <br><br>
    
    <label for="County">County</label>
      <select id="slct1" name="slct1" onchange="populate(this.id,'slct2')">
          <option value="*Required" disabled selected>*Required</option>
          <option value="Antrim" <?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Antrim'?'selected="selected"':'');}?> >Antrim</option>
          <option value="Armagh"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Armagh'?'selected="selected"':'');}?>>Armagh</option>
          <option value="Carlow"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Carlow'?'selected="selected"':'');}?>>Carlow</option>
          <option value="Cavan"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Cavan'?'selected="selected"':'');}?>>Cavan</option>
          <option value="Clare"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Clare'?'selected="selected"':'');}?>>Clare</option>
          <option value="Cork"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Cork'?'selected="selected"':'');}?>>Cork</option>
          <option value="Derry"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Derry'?'selected="selected"':'');}?>>Derry </option>
          <option value="Donegal"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Donegal'?'selected="selected"':'');}?>>Donegal</option>
          <option value="Down"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Down'?'selected="selected"':'');}?>>Down</option>
          <option value="Dublin"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Dublin'?'selected="selected"':'');}?>>Dublin</option>
          <option value="Fermanagh"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Fermanagh'?'selected="selected"':'');}?>>Fermanagh</option>
          <option value="Galway"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Galway'?'selected="selected"':'');}?>>Galway</option>
          <option value="Kerry"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Kerry'?'selected="selected"':'');}?>>Kerry</option>
          <option value="Kildare"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Kildare'?'selected="selected"':'');}?>>Kildare</option>
          <option value="Kilkenny"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Kilkenny'?'selected="selected"':'');}?>>Kilkenny</option>
          <option value="Laois"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Laois'?'selected="selected"':'');}?>>Laois</option>
          <option value="Leitrim"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Leitrim'?'selected="selected"':'');}?>>Leitrim</option>
          <option value="Limerick"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Limerick'?'selected="selected"':'');}?>>Limerick</option>
          <option value="Longford"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Longford'?'selected="selected"':'');}?>>Longford</option>
          <option value="Louth"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Louth'?'selected="selected"':'');}?>>Louth</option>
          <option value="Mayo"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Mayo'?'selected="selected"':'');}?>>Mayo</option>
          <option value="Meath"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Meath'?'selected="selected"':'');}?>>Meath</option>
          <option value="Monaghan"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Monaghan'?'selected="selected"':'');}?>>Monaghan</option>
          <option value="Offaly"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Offaly'?'selected="selected"':'');}?>>Offaly</option>
          <option value="Roscommon"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Roscommon'?'selected="selected"':'');}?>>Roscommon</option>
          <option value="Sligo"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Sligo'?'selected="selected"':'');}?>>Sligo</option>
          <option value="Tipperary"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Tipperary'?'selected="selected"':'');}?>>Tipperary</option>
          <option value="Tyrone"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Tyrone'?'selected="selected"':'');}?>>Tyrone</option>
          <option value="Waterford"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Waterford'?'selected="selected"':'');}?>>Waterford</option>
          <option value="Westmeath"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Westmeath'?'selected="selected"':'');}?>>Westmeath</option>
          <option value="Wexford"<?php if( isset($_POST['slct1'])) { echo($_POST['slct1']=='Wexford'?'selected="selected"':'');}?>>Wexford</option>
      </select>
      
      <label for="College">College</label>
      <select id="slct2" name="slct2" onfocus ="populate('slct1','slct2')"></select>
      
<br><br>
<input type='submit' value='Submit'>
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