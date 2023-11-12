<?php
	session_start();
	$page_title = 'Modules' ;
	//$_SESSION['pg'] = $page_title;
	require ('../connect_db.php'); 
	
if( isset($_SESSION['first_name']))
{
	include ( 'header.php' ) ;
?>

<script src="expand.js"></script>

<?php
		//Find books user has uploaded 
		$uid = $_SESSION[ 'user_id' ];
		
		//User Search for modules
?>        

	
<div class="listedbooks">
        
        
      <div id="finds">
        <div id="search_modules">
         <h1>Find & Add Modules</h1><br>  
             <input type="text" id="msearch" placeholder="Search for Modules..."/>
              
              <select id="module_college" name="module_college" onchange="">
                  <option value="Trinity College Dublin" <?php if( isset($_SESSION['user_college'])) { echo($_SESSION['user_college']=='Trinity College Dublin'?'selected="selected"':'');}?> >Trinity College Dublin</option>
                  <option value="University College Dublin"<?php if( isset($_SESSION['user_college'])) { echo($_SESSION['user_college']=='University College Dublin'?'selected="selected"':'');}?>>University College Dublin</option>
             	  <option value="NUI Galway"<?php if( isset($_SESSION['user_college'])) { echo($_SESSION['user_college']=='NUI Galway'?'selected="selected"':'');}?>>NUI Galway</option>
          	  </select>
             
             <input type="button" id="button" value="Search" />
             <ul id="mresult"></ul>
        </div>
        
        <script src="js/module_script.js"></script>
        
        <div id='suggested'>
        <h1>Module Suggestions</h1>
            <button id="suggestbutton">Show Suggestions</button>
        	<?php
				$arr = array();
				$course = $_SESSION['user_course'];
				$q4 = "SELECT user_module_id1, user_module_id2, user_module_id3, user_module_id4, user_module_id5, user_module_id6, user_module_id7, user_module_id8, user_module_id9, user_module_id10, user_module_id11, user_module_id12, user_module_id13, user_module_id14, user_module_id15, user_module_id16, user_module_id17, user_module_id18,user_module_id19, user_module_id20  FROM users WHERE user_course = '$course'";
				$r4 = mysqli_query($dbc, $q4);

				while($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC))
				{	
					foreach ($row4 as $v) 
					{
						if($v != 0 && !in_array($v, $arr))
						{
							array_push($arr, $v);
						}
					}
				}
			
			echo" <br><br><div id='modules' style='display: none'>";	
			foreach ($arr as $m) 
			{
				$q5 = "SELECT * FROM modules WHERE module_id = $m";
				$r5 = mysqli_query($dbc, $q5);
				if(mysqli_num_rows($r5) == 1)
				{
					$row7 = mysqli_fetch_array($r5, MYSQLI_ASSOC);
					$mi7 = 'add_module_profile.php?module_id='.$row7['module_id'];
					
					echo $row7['module_name'].'('.$row7['module_code'].')';
					echo "  <a href=$mi7>Add</a><br><br>";	
				}
				
			}	
			echo"</div>";	
			?>
          
		<script>
        $( "button" ).click(function() {
          $( "#modules" ).toggle();
          
        });
        </script>
        </div>   
        
        </div>       
<?php
	
	$q = "SELECT * FROM users WHERE user_id = $uid";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_num_rows($r) == 1)
		{		
			
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			$num = 1;
			$strnum = strval($num);
			$mid = 'user_module_id' . $strnum;	
			
			
			echo'<br><br><br><br><div id="integration-list">
			<h1>My Modules</h1>
					<ul>';
					
			//Get Modules
			while($row[$mid] != 0)
			{
						
				$q2 = "SELECT * FROM modules WHERE module_id = $row[$mid]";
				$r2 = mysqli_query($dbc, $q2);
				$row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC);
			
				//echo $row2['module_name'];
				echo '<br>';
				
				//While bookid's arent 0.
					//Find book in module books
						//display title]
				
				$booknum = 1;		
				$strbooknum = strval($booknum);
				$bid = 'book_id' . $strbooknum;		
				
				//Ajax and do function on click
				echo'
				
				<li>
    				<a class="expand">
					  <div class="right-arrow">+</div>
					  <h2>'.$row2['module_name'].'</h2>
					  <span>Code: '.$row2['module_code'].' Year: '.$row2['module_year'].'</span>
    				</a>
					<div class="detail">
				 		<div>';
				
				//Get books from selected module
				while($row2[$bid] != 0)
				{
					$q3 = "SELECT * FROM modulebooks WHERE modulebook_id = $row2[$bid]";
					$r3 = mysqli_query($dbc, $q3);
					$row3 = mysqli_fetch_array($r3, MYSQLI_ASSOC);
					
					echo '<span>'.$row3['modulebook_title'].' By: '.$row3['modulebook_author'].'<span>';
					$t = $row3['modulebook_title'];
					
					echo"
					
					<form action='search2.php'>
						<button value=$t name='search'>Search</button><br>
					</form><br>";
					
					$booknum++;	
					$strbooknum = strval($booknum);
					$bid = 'book_id' . $strbooknum;
					
				}
				//Travese through
				$num++;	
				$strnum = strval($num);
				$mid = 'user_module_id' . $strnum;
				
				echo'
				
				</div>
				<br/>
			</div>
			    </li>	
				';
			}
			echo' </ul>
			  </div>';
		}
		else
		{
			echo" You have not added any modules to your book list";	
		}	
?>   

</div>

<?php

?>

<?php
	include ( 'footer.html' ) ;
 }
		
	else{
		include('login.php');	
		}
?>