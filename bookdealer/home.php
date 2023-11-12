<?php
	session_start();
	$page_title = 'Home' ;
    include ( 'header.php' ) ;
	require ('../connect_db.php'); 
    //echo'Welcome '. $_SESSION['first_name'];
?>
 

<div id="home">
	<div class="openingmessage">
    
    	<h2><b>Welcome to <span id="bd">BookDealer <span></b> - </h2>
        
        <h3>A service for College Students to Buy and Sell their Books</h3><br />
        
        
        
        <h4 id="feed">This is a project designed for students by students therefore any feedback on current features or functions would be much apprecaited or suggestions for future iterations </h4>
         <div id = "feedbackbutton">
        	<!--<div id="homeregister" class="homeregister"> <input id="feedback" type="submit" value="Feedback"></div>-->
             <a href="mailto: feedback@bookdealer.ie"><img id="atsign" src="includes/at.png" /></a>
            </div>
     
        
        
    
    </div>
    
   
    
     
    <div class="features">
    	
     
          <div id="homeregister" class="homeregister">
          
          <?php   echo $note;?>
          
              <?php
	  	if( !isset($_SESSION['first_name']) && !isset($note))
{
	  ?>
              <h2>Register to use all the features</h2>
              
              
              <form action="register.php">
                  <input type="submit" value="Register">
              </form>
              <h6>*However if you dont want to register you can still search for books to find sellers</h6>
               <?php
		  
		}

		?>
        
         
          </div>
          
         
        
       <div id="beside"> 
    	
          <div id="homeoptions" style="cursor: pointer;"  class="homeoptions" onclick="window.location='upload1.php';">	
              <h1>Place an Ad</h1><br>
              <!--<img id="addpic" src= 'includes/add.png'> -->
              
        
           <a id="addicon">
              <img class="home_image_on" src="includes/add3.png" alt="logo" />
              <img class="home_image_off" src="includes/add7.png" alt="logo" />
          </a>
          <br>
              
              <!--<a href="upload1.php">Sell</a>-->
              
              <h5>Make money by selling old books
              <br>Place an ad for a college book you want to sell</h5>
              
          </div>
        
        
          <div id="homeoptions" style="cursor: pointer;"  class="homeoptions" onclick="window.location='modules.php';">	
            
                <h1>Personal Book Lists</h1>
                 <a id="addicon">
                <img class="home_image_on" src="includes/list1.png" alt="logo" />
                <img class="home_image_off" src="includes/list2.png" alt="logo" />
            </a>
                
                <h5>View Book lists for each of your modules and find students selling specified books</h5>
              <!--  <h6> Find and Add your Modules to your profile</h6>-->
                
            </div>
        </div>
       
    </div>
    
    <div class="recent">
    
    	
    
    </div>
   
    <div class="activity">
      <div id="act">
         <div id="recentcontainer">
            <img id="newpic" src="includes/new2.gif" />
            <h2 id="recent">Recently Added</h2><br><br> 
          </div><br /><br />
      
      
              <div class="ads">
              
              
              
                  <?php
                  $q = "SELECT *FROM books ORDER BY book_id DESC LIMIT 2";
                  $r = mysqli_query($dbc, $q);
              
                  if(mysqli_num_rows($r) > 0)
                  {  
                    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                      {
                         echo'
						 <a class ="home_view_button" href="view.php?id='.$row['book_id'].'">	
                          <div class="homeitem">
                            
                              
                              <img id="homepic2" src= '.$row['book_img'].'> 
                              <h6 id="homepost">'.$row['post_time'].'</h6><br>
                              <h1 id="hometitle">'.$row['book_title'].'</h1>
                              
                              
                              
                              
                                <h3 class="info" id="homeleft2">
                                
                                	Author: '.$row['book_author'].'<br>';
                                      if(!empty($row['book_edition'])){
                                            echo'Edition: '.$row['book_edition'];
                                        }
        						
								
								echo'
                                </h3>
                                
                                 <h3 class="info" id="homeright2">
                                    Price: '.$row['book_price'].'<br><br>
                                    Condition: '.$row['book_condition'].'<br><br>
                                    Location:'.$row['user_location'].'<br>';
                                    if(!empty($row['user_college'])){
                                           echo'College: '.$row['user_college'].'<br>';
                                     }
                       			
								echo'     
                                </h3>	   
                           
                        
                            
                           </div></a><br>
                          ';
                      }
                      
                  mysqli_close($dbc);
                }
                else{
                    echo'<p>There are currently no Books listed.</p>';
              }	
                  ?>
              
              </div>
    
            <div id="twitterfeed">
           			<a class="twitter-timeline" href="https://twitter.com/search?q=%40BookDealer_ie%20OR%20%23BookDealer%20OR%20%23bookDealer%20OR%20%23bookdealer" data-widget-id="425699240463966208">Tweets about @BookDealer_ie OR #BookDealer OR #bookDealer OR #bookdealer</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    
    	</div>
    
    </div>
     <!--
    
    </div>
    
     <div id="feedback">
        	
        	
        
        </div>-->
    
</div>

 
 
 <?php

# Display footer section.
include ( 'footer.html' ) ;
?>