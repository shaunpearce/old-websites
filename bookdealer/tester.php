<?php
session_start();





?>
<!DOCTYPE html>


<html>
  <head>
    <title>Todo App</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/accountsettingsstyle.css"> 
    <script src="js/settings_script.js"></script>
     
     
  </head>
  <body>
  
  <?php
  
  require ('../connect_db.php'); 
  
  $id = $_SESSION['user_id'];
  $q = "SELECT * FROM users WHERE user_id = $id";
  $r = mysqli_query($dbc, $q);
  
  $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
  //echo $row['first_name'];
  ?>
    
  
    <div class="container">
   
        <!--<label for="first_name">Name</label>
        <input name="first_name" type="text" value="<?//php echo $row['first_name'] ?>" onBlur="save('first_name', this.value)">     
        <span id='first_name'></span><br>
       
          
   
     <p>
        <label for="new-task">Names</label>
        
        <label for="first_name">First Name: </label>
        <input name="first_name" type="text" value="<?php// echo $row['first_name'] ?>" onBlur="save('first_name', this.value)"> <button>Save</button>    
        <span id='first_name'></span><br>
        
      </p>
       -->
      
       <p>
        <!--<label for="new-task">Names</label>
        
        <label for="first_name">First Name:</label>
        <input id="fn" name="first_name" type="text" value="<?php echo $row['first_name'] ?>" onkeydown="myFunction('first_name')"> <button onclick="send('fn')" id='first_name'>Save</button>  
        
        -->
        
        <label for="new-task">Names</label>
        
        <label for="first_name">First Name:</label>
        <input id="first_name" name="first_name" type="text" value="<?php echo $row['first_name'] ?>" onkeydown="myFunction('first_name_button')"> <button onclick="send('first_name', 'first_name_button')" id='first_name_button'>Save</button>  
        
       	<br><br>
        <label for="last_name">Last Name:</label>
        <input id="last_name" name="last_name" type="text" value="<?php echo $row['last_name'] ?>" onkeydown="myFunction('last_name_button')"> <button onclick="send('last_name', 'last_name_button')" id='last_name_button'>Save</button>  
        
         <label for="new-task">Contact Infomation</label>
        
        <label for="email">email:</label>
        <input id="email" name="email" type="text" value="<?php echo $row['email'] ?>" onkeydown="myFunction('email_button')"> <button onclick="send('email', 'email_button')" id='email_button'>Save</button>  
        
       	<br><br>
        <label for="phone_number">Phone Number:</label>
        <input id="phone_number" name="phone_number" type="text" value="<?php echo $row['phone_number'] ?>" onkeydown="myFunction('phone_number_button')"> <button onclick="send('phone_number', 'phone_number_button')" id='phone_number_button'>Save</button>
        
         <label for="new-task">Password</label>
        
        <label for="old_pass">Old Password:</label>
        <input id="old_pass" name="old_pass" type="password" onkeydown="myFunction('password_button')">  
       	<br><br>
        <label for="new_pass1">New Password:</label>
        <input id="new_pass1" name="new_pass1" type="password" onkeydown="myFunction('password_button')"> 
        <br><br>
        <label for="new_pass2">Confirm New Password:</label>
        <input id="new_pass2" name="new_pass2" type="password" onkeydown="myFunction('password_button')"> <br><button onclick="sendpass('password_button')" id='password_button'>Save</button>
            
        
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
        
        
        
      </p>
     
    
     
    </div>




  </body>
</html>
