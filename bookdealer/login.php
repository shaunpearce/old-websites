<?php

include ( 'header.php' ) ;

?>

<div id="registerform" class="registerform">
<?php
	 echo'
		
		<div id="errors" class="errors">	';  
		
		if(isset($errors))
		{
		  echo '<p id="err_msg">Oops! There was a problem:<br>' ;
		  //foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
   
		  echo 'Please try again or <a href="register.php">Register</a></p>' ;
		  
		}
		  echo'</div>';
		
?>

  <form action="login_action.php" method="post">
  
    <input style="display:none" type="text" name="fakeusernameremembered"/>
    <input style="display:none" type="password" name="fakepasswordremembered"/>
    
    <h1>Login</h1><br>   
    <label for="email">Email</label>
    <p><input type="email" name="email" size= "50" placeholder="you@email.com"> </p>
    <label for="password">Password</label>
    <p><input type="password" name="pass" placeholder="password">
    <input id="login" type="submit" value="Login" ></p>
  </form>
</div>
 
 
 <?php

# Display footer section.
include ( 'footer.html' ) ;
?>