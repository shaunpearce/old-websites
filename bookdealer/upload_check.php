<?php 

require ( 'upload_tools.php' ) ;
session_start();

?>

</head>

<body>

<h1>Check if this information is correct</h1>

<h3>Sesh: <?php echo $_SESSION['book_image']?></h3>

<?php echo'<img src= '.$_SESSION['book_image'].'>'?>

<h3>Title: <?php echo $_SESSION['title']?> </h3>
<h3>Author: <?php echo $_SESSION['author']?> </h3>
<h3>Edition: <?php echo $_SESSION['book_edition']?> </h3>
<h3>Language: <?php echo $_SESSION['book_language']?> </h3>
<h3>Description: <?php echo $_SESSION['book_desc']?> </h3>
<h3>Condition: <?php echo $_SESSION['book_condition']?> </h3>
<h3>Comments: <?php echo $_SESSION['user_comments']?> </h3>
<h3>Price: <?php echo $_SESSION['book_price']?> </h3>

<?php if($_SESSION['contact_email'] == 'yes')
{
	echo'<h3>Contact Email:'.$_SESSION['contact_email'].'</h3>';
}
?>

    
<?php if($_SESSION['contact_phone'] == 'yes')
{
	echo'<h3>Contact Phone:'.$_SESSION['contact_phone'].'</h3>';
}
?>

<h3>Country: <?php echo $_SESSION['slct1']?> </h3>
<h3>College: <?php echo $_SESSION['slct2']?> </h3>

<form action="upload_submit.php" method="post">      

<input type='submit' value='Submit'>
</form>

</body>
</html>