<?php
	$page_title = 'Settings' ;
    include ( 'header.php' ) ;
?>

<div class="options">
	
    
  
   
   <div style="cursor: pointer;" id="viewbooks" class="viewbooks" onclick="window.location='listedbooks.php';">
         <a id="bookicon">
         	<img class="image_on" src="includes/books3.png" alt="logo" />
        	<img class="image_off" src="includes/books4.png" alt="logo" />
        </a>
        
        <h1>View Listed Books</h1>
        <h3>Mark as Sold or Delete Books you have placed</h3>
   </div>
   
  
   
    
    
</div>
<br><br>
<div class="options">

 <div style="cursor: pointer;" id="viewbooks" class="viewbooks" onclick="window.location='account_settings.php';">
         <a id="bookicon">
         	<img class="image_on" src="includes/settings3.png" alt="logo" />
        	<img class="image_off" src="includes/settings4.png" alt="logo" />
        </a>
        
        <h1>View Account Settings</h1>
        <h3>Edit all your Account Details</h3><br>
   </div>
  </div> 
  
  <br><br>
  
  <?php
  
  if($_SESSION[ 'lc' ] == 'Valid')
  {
  ?>
  <div class="options">

 <div style="cursor: pointer;" id="viewbooks" class="viewbooks" onclick="window.location='module_settings.php';">
         <a id="bookicon">
         	<img class="image_on" src="includes/settings3.png" alt="logo" />
        	<img class="image_off" src="includes/settings4.png" alt="logo" />
        </a>
        
        <h1>View Module Settings</h1>
        <h3>Add Modules and Book Lists</h3><br>
   </div>
  </div> 
 
 
 <?php
  }
# Display footer section.
include ( 'footer.html' ) ;
?>