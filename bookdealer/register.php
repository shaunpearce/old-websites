<?php

include ( 'header.php' ) ;

?>


 <div id="registerform" class="registerform">
 
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

 
 <form action='register_action.php' method='post'>
         
      <!--<h1>Register</h1><br>   
      <label for="firstname">First & Last Name</label>
      <input id='firstname' type="text" name="first_name" size="30" onBlur="validate('first_name', this.value)" placeholder= "First Name" value="
	  
      <input id='lastname' type="text" name="last_name" size="30" onBlur="validate('last_name', this.value)" placeholder= "Last Name" value=""> 
          <span id='lastname'></span><br>-->
          
          <h1>Register</h1><br>   
      <label for="firstname">First & Last Name</label>
      <input id='firstname' type="text" name="first_name" size="30" placeholder= "First Name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name'];?>"> 
      <input id='lastname' type="text" name="last_name" size="30" placeholder= "Last Name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"> 
         
               
                                                                             
      <label for="email">Email</label>
      <input type="text" name="email" size="50" onBlur="validate('email', this.value)" placeholder="you@email.com" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
      <span id='email'></span><br>
      
     <label for="phone_number">Phone Number</label>
      <input type="text" name="phone_number" size="30" onBlur="validate('phone_number', this.value)" placeholder="087-XXX-XXXX" value="<?php if (isset($_POST['phone_number'])) echo $_POST['phone_number']; ?>"> 
      <br><span id='phone_number'></span>
      <br>
           
      <label for="college">College And Course</label>
      
      <!--<label for="County">County</label>-->
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
      
      <!--<label for="College">College</label>-->
      <select id="slct2" name="slct2" onfocus ="populate('slct1','slct2')">
      	<option value=<?php if( isset($_POST['slct2'])){ echo($_POST['slct2']);}?>>  <?php if( isset($_POST['slct2'])) {echo($_POST['slct2']);}?></option>
      </select>
      <br>
      
       <select id="slct3" name="course" >
       <option value="" disabled selected></option>
      	<option value="B.E.S.S" <?php if( isset($_POST['course'])) { echo($_POST['course']=='B.E.S.S'?'selected="selected"':'');}?>> B.E.S.S</option>
        <option value="Computer Science and Business" <?php if( isset($_POST['course'])) { echo($_POST['course']=='Computer Science and Business'?'selected="selected"':'');}?>> Computer Science and Business</option>
      </select>
      
      <!-- <input type="text" name="course" size="30" placeholder="Computer Science" value="<?php// if (isset($_POST['course'])) echo $_POST['course']; ?>"> -->
       <br><br />
		<br>
	   Opt to be Lecturer or Class Rep User <br>(Email Validation Required)<!-- <input type="checkbox" name="lc" <?php// if(isset($_POST['lc']))echo'checked'; ?>/>-->  
       <br />
       <input type="checkbox" id="checkbox-2-3" class="checkbox big-checkbox" name="lc" <?php if(isset($_POST['lc']))echo'checked'; ?>/>
       <label id="check" for="checkbox-2-3"></label>
       <br />
       
       
       <br>
      
      <label for="password">Password (6+ Length)</label>
      <input type='password' name='pass' placeholder="Password" onBlur="validate('pass', this.value)" >
      <span id='pass'></span><br>
      
      <label for="password">Confirmation Password:</label>
      <input type='password' name='pass2'>
      
      <input type='hidden' name="website" value="true"> 
    
  <input type='submit' value='Submit'>
  <input type='hidden' name='form' value='1'>
  </form>
  
  
  </div>
  
 
 
 <?php

# Display footer section.
include ( 'footer.html' ) ;
?>