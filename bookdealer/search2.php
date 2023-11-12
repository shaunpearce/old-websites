<?php
	$page_title = 'Books' ;
	include ( 'header.php' ) ;
?>


<?php

  require ('../connect_db.php'); 
  
echo'<div class="contentresults"><h1 id="searchtitle">Search Results:</h1>';


	if (!empty($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * 8; 
	
	//$sql = "SELECT * FROM books ORDER BY name ASC LIMIT $start_from, 20"; 
	//$rs_result = mysqli_query ($dbc, $sql); 
	
	if(isset($_GET['search'])) $s = $_GET['search'];
	if (!empty($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="book_title"; };
	
	$p= 1;
	 echo'
			<form name="sort" action="search2.php?submit=true&search='.$s.'&page='.$p.'" method="post">
			<input id="submitsearch" type="submit" value="Sort" />
			<select id="sortsearch" name="order">
			   <option value="" disabled selected>Sort By</option>
			   <option value="book_title">Title</option>
			   <option value="book_author">Author</option>
			   <option value="book_price">Price</option>
			   
			</select>
			
			</form>
			';
		
		
		if(!empty($_POST['order'])) $sort = @$_POST['order']; 
	
	//if(empty($_POST['order']) && empty($sort)) $sort = 'book_title';
	
	
	
	$q = "SELECT * FROM books WHERE (book_title LIKE '%$s%' OR book_author LIKE '%$s%') ORDER BY $sort ASC LIMIT $start_from, 8";
	$r = mysqli_query($dbc, $q);
	
	?> 
	
	<?php
	//$r = mysqli_query($dbc, $q);
	
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
		{
			echo'
			
		<a class ="view_button" href="view.php?id='.$row['book_id'].'">	
		<div class="item">  
		   
			<img id="pic" src= '.$row['book_img'].'> 
			<h6 id="top">'.$row['post_time'].'</h6>
			<h1 id="tle">'.$row['book_title'].'</h1>
			
		
			<h3 class="info" id="left"><br>Author: '.$row['book_author'].'<br>
													';
													if(!empty($row['book_edition'])){
														echo'Edition: '.$row['book_edition'].'<br>';
													}
													echo'
			<h3>
			
			<h3 class="info" id="right">
							<br>Price: '.$row['book_price'].'<br><br>
							Condition: '.$row['book_condition'].'<br><br>
							Location:'.$row['user_location'].'<br>
							';
							if(!empty($row['user_college'])){
								echo'College: '.$row['user_college'].'<br>';
							}
							echo'
							<br>
			</h3>	   
	  </div>
	  </a> 
	  ';
		}; 
	?> 
	
	
	<?php 
	
	$sql = "SELECT COUNT(book_title) FROM books WHERE (book_title LIKE '%$s%' OR book_author LIKE '%$s%')"; 
	$rs_result = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_row($rs_result); 
	$total_records = $row[0];
	echo'<div id="pages">Total: '. $total_records.'';
	
	$total_pages = ceil($total_records / 8);
	
	echo'<br><br>
	';
	
	for ($i=1; $i<=$total_pages; $i++) { 
		echo "<a href='search2.php?submit=true&search=".$s."&page=".$i."&sort=".$sort."'>".$i."</a> "; 
	};
	
	
	
	echo'</div></div>';
	  
?>

  
<?php
	include ( 'footer.html' ) ;
?>