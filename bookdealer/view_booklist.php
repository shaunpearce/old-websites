<?php

include ( 'header.php' ) ;
require ('../connect_db.php'); 
?>


<div class="listedbooks">
<script src="expand.js"></script>

<?php
	
	if(isset($_SESSION[ 'user_id' ]))
	{
		//Find books user has uploaded 
		$uid = $_SESSION[ 'user_id' ];
		
		//User Search for modules
?>        
        <div id="search_modules">
             <input type="text" id="search7" placeholder="Search for Modules here..."/>
              <select id="module_college" name="module_college" onchange="">
                  <option value="Trinity College Dublin" <?php if( isset($_SESSION['user_college'])) { echo($_SESSION['user_college']=='Trinity College Dublin'?'selected="selected"':'');}?> >Trinity College Dublin</option>
                  <option value="University College Dublin"<?php if( isset($_SESSION['user_college'])) { echo($_SESSION['user_college']=='University College Dublin'?'selected="selected"':'');}?>>University College Dublin</option>
             	  <option value="NUI Galway"<?php if( isset($_SESSION['user_college'])) { echo($_SESSION['user_college']=='NUI Galway'?'selected="selected"':'');}?>>NUI Galway</option>
          	  </select>
             <input type="button" id="button" value="Search" />
             <ul id="result7"></ul>
        </div>
        
        
        
        <script type="text/javascript">
            $(document).ready(function(){
                 
                 function search(){
 
                      var title=$("#search7").val();
					  var col=$("#module_college").val();
 
                      if(title!=""){
                        $("#result7").html("<img src='ajax-loader.gif'/>");
                         $.ajax({
                            type:"post",
                            url:"search_module.php",
                            data:"title="+title+"&college="+col,
                            success:function(data){
                                $("#result7").html(data);
                                $("#search7").val("");
                             }
                          });
                      }
                 }
                  $("#button").click(function(){
                  	 search();
                  });
 
                  $('#search7').keyup(function(e) {
                     if(e.keyCode == 13) {
                        search();
                      }
                  });
            });
        </script>   
        
        <div id='suggested'>
        
            <button>Show Module Suggestions</button>
        	<?php
				$arr = array();
				$q4 = "SELECT user_module_id1, user_module_id2, user_module_id3  FROM users WHERE user_course = 'business'";
				$r4 = mysqli_query($dbc, $q4);

				while($row4 = mysqli_fetch_array($r4, MYSQLI_ASSOC))
				{	
					foreach ($row4 as $v) 
					{
						//echo $v;
    					//echo "Lads<br>";
						if($v != 0 && ! in_array($v, $arr))
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
			<h1>Module List</h1>
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
					  <span>Code & Year</span>
    				</a>
					<div class="detail">
				 		<div>
				
				';
				
				
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
        
<?php
	}
	
	else{
			echo" Please login to see your personal book list";		
	}
?>

</div>


<?php

# Display footer section.
include ( 'footer.html' ) ;
?>