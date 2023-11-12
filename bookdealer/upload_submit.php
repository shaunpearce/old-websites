<?php
require ( '../connect_db.php' ) ;

session_start();

$t = $_SESSION['title'];
$a = $_SESSION['author'];
$c = $_SESSION['book_condition'];
$p = $_SESSION['book_price'];
$loc = $_SESSION['slct1'];
$img = $_SESSION['book_image'];

if (isset($_SESSION['book_edition']))$e = $_SESSION['book_edition'];
if (isset($_SESSION['book_language']))$l = $_SESSION['book_language'];
if (isset($_SESSION['book_desc']))$d = $_SESSION['book_desc'];
if (isset($_SESSION['user_comments'])) $sc = $_SESSION['user_comments'];
if ($_SESSION['contact_email'] =="yes")$em = $_SESSION['email'] ;
if (($_SESSION['contact_phone'] == "yes"))$pnum = $_SESSION['phone_number'];
if (isset($_SESSION['slct2'])) $col = $_SESSION['slct2'] ;

$uid = $_SESSION['user_id'];

if(!empty($t) && !empty($a) && !empty($c) && !empty($p) && !empty($loc) && !empty($img))
{
   $q = "INSERT INTO books(user_id, book_title, book_author, book_edition, book_language, book_desc, book_condition, user_comments, book_price,user_email, user_tel, user_location, user_college, post_time, book_img) VALUES ('$uid','$t', '$a', '$e', '$l','$d', '$c','$sc', '$p','$em','$pnum','$loc', '$col', NOW(), '$img')";
   
		  $r = @mysqli_query ( $dbc, $q ) ;
		  if ($r)
		   {  
		   
		   	 unset($_SESSION['title']);
			 unset($_SESSION['author']);
			 unset($_SESSION['book_condition']);
			 unset($_SESSION['book_price']);
			 unset($_SESSION['slct1']);
			 
			 unset($_SESSION['book_image']);
			 unset($_SESSION['book_edition']);
			 unset($_SESSION['book_language']);
			 unset($_SESSION['book_desc']);
			 unset($_SESSION['user_comments']);
			 unset($_SESSION['phone_number']);
			  unset($_SESSION['slct2']);
			 
			 
			 unset($_SESSION['contact_email']);
			 unset($_SESSION['contact_phone']);
			 
			  $note ="Thank you for your payment. Your transaction has been completed";
			  include ( 'home.php' ) ;
			 return $note;
			  
			# Close database connection.
			
			
			
			mysqli_close($dbc); 
			exit();
		  }
}
else{
	include ( 'header.php' ) ;
	
		echo"ERROR, Required Information has not been entered, please enter in all required information";
		?> 
        
        <a href='upload1.php'>Sell Book</a>;
		
		<?php
 	include ( 'footer.html' ) ;
	}
?>