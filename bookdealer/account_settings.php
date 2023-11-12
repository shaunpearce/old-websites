<?php
	require ('../connect_db.php'); 
	$page_title = 'Account Settings' ;
    include ( 'header.php' ) ;
?>

<div id="accountsettings" class="accountsettings">
	
    <?php
	
		$id = $_SESSION['user_id'];
		$q = "SELECT * FROM users WHERE user_id = $id";
		$r = mysqli_query($dbc, $q);
		
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			  
	?>
    
    
     <label for="section">Name</label>
        
        <label for="first_name">First Name:</label>
        <input id="first_name" name="first_name" type="text" value="<?php echo $row['first_name'] ?>" onkeydown="myFunction('first_name_button')"> <button onclick="send('first_name', 'first_name_button')" id='first_name_button'>Save</button>  
        
       	<br><br>
        <label for="last_name">Last Name:</label>
        <input id="last_name" name="last_name" type="text" value="<?php echo $row['last_name'] ?>" onkeydown="myFunction('last_name_button')"> <button onclick="send('last_name', 'last_name_button')" id='last_name_button'>Save</button>  
        <br> <br>
         <label for="section">Contact Infomation</label>
        
        <label for="email">Email:</label>
        <input id="email" name="email" type="text" value="<?php echo $row['email'] ?>" onkeydown="myFunction('email_button')"> <button onclick="send('email', 'email_button')" id='email_button'>Save</button>  
        
       	<br><br>
        <label for="phone_number">Phone:</label>
        <input id="phone_number" name="phone_number" type="text" value="<?php echo $row['phone_number'] ?>" onkeydown="myFunction('phone_number_button')"> <button onclick="send('phone_number', 'phone_number_button')" id='phone_number_button'>Save</button>
         <br> <br>
         <label for="section">Password</label>
        
        <label for="old_pass">Old Password:</label>
        <input id="old_pass" name="old_pass" type="password" onkeydown="myFunction('password_button')">  
       	<br><br>
        <label for="new_pass1">New Password:</label>
        <input id="new_pass1" name="new_pass1" type="password" onkeydown="myFunction('password_button')"> 
        <br><br>
        <label for="new_pass2">Confirm New Password:</label>
        <input id="new_pass2" name="new_pass2" type="password" onkeydown="myFunction('password_button')"> 
        <button onclick="sendpass('password_button')" id='password_button'>Save</button>
            
        
       <script>
		function send(field, c) {
			var f = field;
			var val = document.getElementById(f).value;
   		 	save(field,val,c);
			}
		</script>
        
         <script>
		function sendpass(c) {
			//var f = field;
			var old = document.getElementById('old_pass').value;
			var new1 = document.getElementById('new_pass1').value;
			var new2 = document.getElementById('new_pass2').value;
			
   		 	savepass(old,new1,new2,c);
			}
		</script>
        
        <script>
		function myFunction(field) {
   			 document.getElementById(field).innerHTML = "Save";
			}
		</script>
    
    
</div>

 
 
 <?php

# Display footer section.
include ( 'footer.html' ) ;
?>