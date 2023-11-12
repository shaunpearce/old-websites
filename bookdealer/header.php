<?php
	session_start();
	require ( '../connect_db.php' ) ;	
	//Security?
	//session_start(); if (!isset($_SESSION['keyword'])) { session_regenerate_id(); $_SESSION['keyword'] = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php echo''.$page_title.'';?></title>
  <link rel="icon" type="image/ico" href="http://www.bookdealer.ie/favicon.ico"/>
  
  <!-- Header Style and scroll script  -->
  <link rel="stylesheet" type="text/css" href="css/headerstyle2.css">
  <script src="js/headerscript.js"></script>
  
  <!-- jQuery  -->
  <script src="jquery-1.11.2.min.js"></script>
  <script src="http://assets.codepen.io/assets/libs/fullpage/jquery-c152c51c4dda93382a3ae51e8a5ea45d.js"></script>
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  
  <!-- Footer Style -->
  <link rel="stylesheet" type="text/css" href="css/footerstyle.css">
  
  <!-- Register and Login form ajax script and style -->
  <script src="register_script.js"></script>
  <link rel="stylesheet" type="text/css" href="css/registerstyle2.css">
  
   <!-- autocomplete script -->
   <script src="js/autocomplete_action.js"></script>
   
   <!-- Search Suggestion style -->
    <!--<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css">-->
 
 	<!--<link rel="stylesheet" type="text/css" href="css/searchstyle.css">-->
    
   <!--Search Bar & Autocomplete-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script src="js/autocomplete_action2.js"></script>
  <link rel="stylesheet" type="text/css" href="css/autocompletestyle.css">
  
  <link rel="stylesheet" type="text/css" href="css/searchstyle.css">
  
  <!--Upload Form -->
  <link rel="stylesheet" type="text/css" href="css/uploadstyle.css">
  <script src="js/collegesScript.js"></script>
  <script src="js/autocompleteupload_action.js"></script>
  
    <!--Settings  -->
  <link rel="stylesheet" type="text/css" href="css/settingsstyle.css">
  
  <!-- Account Settings
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="accountsettingsstyle.css"> -->
    <script src="js/settings_script.js"></script>
    <link rel="stylesheet" href="css/accountsettingsstyle2.css">
    
    <!-- Module Upload Style-->
     <link rel="stylesheet" href="css/modulestyle.css">
     
    
      <!-- Style of book lists -->
     <link rel="stylesheet" type="text/css" href="expand.css">
    
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <header class='header'>
    <div class='container'>
      <div class='logo'>
      	<!--<h1><img src="includes/newlogo.png" id="logo" style="width:140px;height:70px"><h1>-->
        <a href="home.php"><img src="includes/title2.png" id="logo2"></a>
      </div>
     <!-- <div class = "searchbar">
          <form class="search-container" action="search.php" id="search_box">
          <input type="text" id="search" value=""  name="search" placeholder="Search for Books...">
          <!--<a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>-->
         <!--  </form> 
          <script type="text/javascript">auto();</script>
      </div>-->
      
      <div class = "searchbar">
          <form class="search-container" action="search2.php" id="search_box">
          	<input type="text" id="search-bar" placeholder="Search For Books..." size="50px" name="search">
    		<script type="text/javascript">auto2();</script>
    		
            <!--<button id="searchbutton" type="submit"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></button>-->
            <a ><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
         	 <!--<a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>-->
          </form> 
          
          
      </div>
      
      <script type="text/javascript" src="js/headerscript2.js"></script>
      
      </div>
      <nav>
      <div class="navicon">&#9776;</div>
        <ul>
        	<!--<li class ="searchbox">
            	<form class="" action="search.php" id="">
          		<input type="text" id="search" value=""  name="search" placeholder="Search for Books...">
          		<!--<a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>-->
          	<!--	</form>-->
            
            </li>
         
          <li><a href='upload1.php'>Sell</a></li>
           <li><a href='modules.php'>Booklist</a></li>
         
         
         <?php
		 /*
		 
         if( $_SESSION['lc'] == 'Valid')
			{
				
				echo'<li><a href="modulesettings.php">Module</a>&nbsp;</li>';	
			}
            */
            ?>
          
          	<?php 
		
			if( isset($_SESSION['first_name']))
			{
				
				echo'<li><a href="settings2.php">Settings</a>&nbsp;</li>';
				
				
			}
			
			
			
			?>
          
         
          <li>
          	<?php 
		
			if( isset($_SESSION['first_name']))
			{
				echo'<a href="logout.php">Log Out</a>&nbsp;';
				
			}
			else
			{
				 echo'<a id="user" href="register.php">Register</a>/<a id ="user" href="login.php">Login</a> '; 
			}
	
			?>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  
  
<script src="js/headerscript.js"></script>




<div class="wrapper-parallax">
  <div class="content">
       

<!--

</body>
</html>

-->


