<?php
	session_start();
	$page_title = 'Modules' ;
	//$_SESSION['pg'] = $page_title;
	require ('../connect_db.php'); 
	
	
if( $_SESSION['lc'] =="Valid")
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

 <div id="errors" class="errors"> 
		
			<?php
			if(isset($errors))
			{
			echo'<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';	
			  foreach ( $errors as $error )
			  { 
				  echo " - $error<br>" ; 
			  }
			   echo 'Please try again.</p>';
			}
			
			?>
    	
  </div>

        <div id="create_modules">
             
             
             
          <form action='module_action.php' method='post'>

      <h1>Create Module</h1><br>   
      <label for="moduletitle">Name</label>
      <input id='modulename' type="text" name="module_name" size="30" placeholder= "Moduel Title" value="<?php if (isset($_POST['module_name'])) echo $_POST['module_name'];?>"> 
     <br><br />
     <label for="code">Module Code</label>
      <input id='modulecode' type="text" name="module_code" size="30" placeholder= "Module Code" value="<?php if (isset($_POST['module_code'])) echo $_POST['module_code']; ?>"> 
      <br><br />
      <label for="College">College</label>
      <select id="module_college" name="module_college" onchange="">
          <option value="*Required" disabled selected>*Required</option>
          <option value="Trinity College Dublin" <?php if( isset($_POST['module_college'])) { echo($_POST['module_college']=='Trinity College Dublin'?'selected="selected"':'');}?> >Trinity College Dublin</option>
          <option value="University College Dublin"<?php if( isset($_POST['module_college'])) { echo($_POST['module_college']=='University College Dublin'?'selected="selected"':'');}?>>University College Dublin</option>
          <option value="NUI Galway"<?php if( isset($_POST['module_college'])) { echo($_POST['module_college']=='NUI Galway'?'selected="selected"':'');}?>>NUI Galway</option>
      </select>
	<br><br />
      <label for="year">Start Year</label>
      <input id='moduleyear' type="text" name="module_year" size="30" placeholder= "Moduel Year" value="<?php if (isset($_POST['module_year'])) echo $_POST['module_year'];?>"> 
               
                                                          
      
      <input type='hidden' name="website" value="true"> 
    
  <input id="modulecreate" type='submit' value='Create Module'>
  <input type='hidden' name='form' value='1'>
  </form>
             
             
             
        </div>
        
        
<?php
	
	
	$q = "SELECT * FROM modules WHERE user_id = $uid";
	$r = mysqli_query($dbc, $q);
		
	if(mysqli_num_rows($r) >= 1)
	{		
	
		echo'
		<div id="integration-list">
		<h1>Modules You ve Added</h1>
		<ul>';
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
		{		
			echo'
				<li>
    				<a class="expand">
					  <div class="right-arrow">+</div>
					  <h2>'.$row['module_name'].'</h2>
					  <span>Code: '.$row['module_code'].' Year: '.$row['module_year'].'</span>';
					  
					  $url = 'add_book.php?module_id='.$row['module_id'];
					
					 echo'
					 
					 
    				</a>
					
					<div class="detail">
				 	<div>';		
					
				
					  $booknum = 1;		
					  $strbooknum = strval($booknum);
					  $bid = 'book_id' . $strbooknum;	
							  
					  while($row[$bid] != NULL)
					  {
						  $q2 = "SELECT * FROM modulebooks WHERE modulebook_id = $row[$bid]";
						  $r2 = mysqli_query($dbc, $q2);
						  $row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC);
						  
						  
						  echo '<span>'.$row2['modulebook_title'].' By: '.$row2['modulebook_author'].'<span><br>';
						  
						  $booknum++;	
						  $strbooknum = strval($booknum);
						  $bid = 'book_id' . $strbooknum;
					  }
					  echo'	
					  
					  </div>
					   <a href='.$url.'>Add Book</a>
				
			</div>	
				</li>';
			}
		echo' </ul></div>';
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