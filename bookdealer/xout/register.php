<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Register</title>

<script src="register_script.js"></script>
<link rel="stylesheet" type="text/css" href="css/registerstyle2.css">

</head>

<body>

<div id="registerform" class= "registerform">
 <form action='register_action.php' method='post'>
         
      <h1>Register</h1><br>   
      <label for="firstname">First & Last Name</label>
      <input id='firstname' type="text" name="first_name" size="30" onBlur="validate('first_name', this.value)" placeholder= "First Name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name'];?>"> 
      <input id='lastname' type="text" name="last_name" size="30" onBlur="validate('last_name', this.value)" placeholder= "Last Name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"> 
      <span id='last_name'></span><br>      
               
                                                                             
      <label for="email">Email</label>
      <input type="text" name="email" size="50" onBlur="validate('email', this.value)" placeholder="you@email.com" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
      <span id='email'></span><br>
      
     <label for="phone_number">Phone Number</label>
      <input type="text" name="phone_number" size="30" onBlur="validate('phone_number', this.value)" placeholder="087-XXX-XXXX" value="<?php if (isset($_POST['phone_number'])) echo $_POST['phone_number']; ?>"> 
      <span id='phone_number'></span>
      <br>
      
      <label for="password">Password (6+ Length)</label>
      <input type='password' name='pass' placeholder="Password" onkeyup="validate('pass', this.value)" >
      <span id='pass'></span><br>
      
      <label for="password">Confirmation Password:</label>
      <input type='password' name='pass2'>
    
  <input type='submit' value='Submit'>
  <input type='hidden' name='form' value='1'>
  </form>
  
  </div>
</body>
