<?php
session_start(); //No header for redirect back to listedbooks
require ('../connect_db.php'); 


//For Security
foreach($_GET as $loc=>$item)$_GET[$loc] = urldecode(base64_decode($item));

/*echo $_GET['bookid'];
echo'<br>';
echo $_GET['uid'];

$num = 18;
$test = urlencode(base64_encode('10'));
echo'<br>';
echo $test;*/



/*if (count($_GET)) {
    foreach ($_GET as $key => $value) {
        $_SESSION[$key] = $value;
    }
	
    header("Location: " . $_SERVER["PHP_SELF"]);
	
}*/

//Get user id of book id that has been passed, for security

$bookuid = $_GET[ 'bookid' ];
$q1 = "SELECT user_id FROM books WHERE book_id = $bookuid";
$r = mysqli_query($dbc, $q1);

$row = mysqli_fetch_array($r);
//echo'This is the searched user id for the book id that has been passed(Trying to delete): ';

$useridbooktodelete = $row['user_id'];

/*echo $useridbooktodelete;
echo'<br> This is the Sesh: ';

echo $_SESSION['user_id'];
*/



if($useridbooktodelete == $_SESSION[ 'user_id' ] )
{   
  //echo"Lads";
	if (isset($_GET["bookid"]))
		{
			$bid  = $_GET["bookid"];
			$q = "DELETE FROM books WHERE book_id = $bid";
			$r = mysqli_query($dbc, $q);
			include('listedbooks.php');
	  }
}
else{
	
	$error = "You cannot Delete a book you did not upload";
	return $error;
}

//var_dump($_SESSION);


?>
