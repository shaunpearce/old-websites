<?php

require ('../connect_db.php'); 
 


 $t = $_POST['title'];
 $c = $_POST['college'];
 
 $q = "SELECT * FROM modules WHERE module_name LIKE '%$t%' AND module_college = '$c'"; 
 $r = mysqli_query($dbc, $q);
		
if(mysqli_num_rows($r) >= 1)
{
 	while($row=mysqli_fetch_array($r))
	{
		$mi = 'add_module_profile.php?module_id='.$row['module_id'];
		
 		echo "
			<li>
			  $row[module_name]<br>
			  $row[module_code]<br>
			  <a href=$mi>Add</a> 
			</li>
		";
    }   
 }else{
 	echo "<h3>No Module Found<h3>";
	
	
	//<a href='add_module.php'>Add Module</a>";
 }



 ?>  
      
