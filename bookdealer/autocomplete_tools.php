<?php

//Connection vars here for example only. Consider a more secure method. 
$dbhost = 'localhost';
$dbuser = 'b560821_shaun';
$dbpass = 'nuahs1992B';
$dbname = 'b560821_bookdealer';


/*
$dbhost = 'localhost';
$dbuser = 'Shaun';
$dbpass = 'shan';
$dbname = 'bookdealer';
*/
 
try {
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
 
$return_arr = array();
 
if ($conn)
{
    $ac_term = "%".$_GET['term']."%";
    $query = "SELECT * FROM books where (book_title LIKE :term OR book_author LIKE :term)";
	
	//book_title like :term";
	
	
    $result = $conn->prepare($query);
    $result->bindValue(":term",$ac_term);
    $result->execute();
     
    /* Retrieve and store in array the results of the query.*/
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $row_array['id'] = $row['book_id'];
        $row_array['value'] = $row['book_title'];
        $row_array['abbrev'] = $row['book_author'];
		$row_array['img'] = $row['book_img'];
         
        array_push($return_arr,$row_array);
    }
 
     
}
/* Free connection resources. */
$conn = null; 
/* Toss back results as json encoded array. */
echo json_encode($return_arr);

?>