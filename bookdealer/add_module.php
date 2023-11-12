<?php

include ( 'header.php' ) ;
//require ('../connect_db.php'); 
?>


<div class="modules">


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

	<form action='module_action.php' method='post'>

      <h1>Add Module</h1><br>   
      <label for="moduletitle">Name</label>
      <input id='modulename' type="text" name="module_name" size="30" placeholder= "Moduel Title" value="<?php if (isset($_POST['module_name'])) echo $_POST['module_name'];?>"> 
     
     <label for="code">Module Code</label>
      <input id='modulecode' type="text" name="module_code" size="30" placeholder= "Module Code" value="<?php if (isset($_POST['module_code'])) echo $_POST['module_code']; ?>"> 
      <br>
      <label for="College">College</label>
      <select id="module_college" name="module_college" onchange="">
          <option value="*Required" disabled selected>*Required</option>
          <option value="Trinity College Dublin" <?php if( isset($_POST['module_college'])) { echo($_POST['module_college']=='Trinity College Dublin'?'selected="selected"':'');}?> >Trinity College Dublin</option>
          <option value="University College Dublin"<?php if( isset($_POST['module_college'])) { echo($_POST['module_college']=='University College Dublin'?'selected="selected"':'');}?>>University College Dublin</option>
          <option value="NUI Galway"<?php if( isset($_POST['module_college'])) { echo($_POST['module_college']=='NUI Galway'?'selected="selected"':'');}?>>NUI Galway</option>
      </select>

      <label for="year">Year</label>
      <input id='moduleyear' type="text" name="module_year" size="30" placeholder= "Moduel Year" value="<?php if (isset($_POST['module_year'])) echo $_POST['module_year'];?>"> 
               
                                                          
      
      <input type='hidden' name="website" value="true"> 
    
  <input type='submit' value='Submit'>
  <input type='hidden' name='form' value='1'>
  </form>
  
  
  </div>



</div>



 <?php

# Display footer section.
include ( 'footer.html' ) ;
?>