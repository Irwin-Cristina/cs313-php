<?php
$title=$_POST['book_title'];
$count=$_POST['book_page_count'];
$summary=$_POST['book_summary'];
$author=$_POST['author_name'];
$location=$_POST['location']; //$location=$_POST['genre_name[]'];
$genre=$_POST['genre'];





//connection
require_once ('connection.php');
$db = get_dbconnection();



try {
    
$query = 'INSERT INTO booktemp( book_title, book_page_count, book_summary,
author, location, genre) VALUES(:book_title, :book_page_count, :book_summary, :author, :location, :genre)';
$stmt = $db->prepare($query);


//bind variables to values
$stmt->bindValue(':book_title', $title);
$stmt->bindValue(':book_page_count', $count);
$stmt->bindValue(':book_summary', $summary);
$stmt->bindValue(':author', $author);
$stmt->bindValue(':location', $location);
$stmt->bindValue(':genre', $genre);
    
$stmt->execute();

$book_id = $db->lastInsertId("booktemp_book_id_seq");
    
}
catch (Exception $ex)
    
{
    echo "Error with DB. Details: $ex";
    die();
    
}
header("Location addconfirmation.php");
die();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
