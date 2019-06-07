<?php
session_start();


//variables from POST
$book = htmlspecialchars($_POST['txtTitle']);
$count = htmlspecialchars($_POST['txtCount']);
$summary = htmlspecialchars($_POST['txtSummary']);
$author = htmlspecialchars($_POST['txtAuthor']);
$location_ids = $_POST['chkLocations'];
$genre_ids = $_POST['chkGenres'];
//$topic_ids = htmlspecialchars($_POST['chkTopics']);

 
 //echo "book=$book\n";
 //echo "chapter=$chapter\n";
 //echo "verse=$verse\n";
 //echo "content=$content\n";
 //echo "topic=$topic_ids\n";

//connection
require('dbConnect.php');
$db = get_db();

    

//location
try {
//query
$query = 'UPDATE booktemp SET book_page_count =:book_page_count, book_summary=:book_summary, author=:author WHERE book_title=:book_title';
$stmt = $db->prepare($query);

//bind variables to values
$stmt->bindValue(':book_title', $book);
$stmt->bindValue(':book_page_count', $count);
$stmt->bindValue(':book_summary', $summary);
$stmt->bindValue(':author', $author);

$stmt->execute();

//$book_id = $db->lastInsertId("booktemp_book_id_seq");
//$topic_ids = $db->lastInsertId("scriptures_id_seq");

//foreach($location_ids as $location_id) {
//    echo "book_id: $book_id, location_id: $location_id";
//    //query
//    $query = 'UPDATE booktemp_locations(book_id, location_id) VALUES(:book_id, :location_id)';
//    //prepare first statement
//    $stmt = $db->prepare($query);
//    //bind values
//    $stmt->bindValue(':book_id', $book_id);
//    $stmt->bindValue(':location_id', $location_id);
//    $stmt->execute();
//    
//    }
    

//foreach($genre_ids as $genre_id) {
//    echo "book_id: $book_id, genre_id: $genre_id";
//    //query
//    $query = 'UPDATE booktemp_genres(book_id, genre_id) VALUES(:book_id, :genre_id)';
//    //prepare first statement
//    $stmt = $db->prepare($query);
//    //bind values
//    $stmt->bindValue(':book_id', $book_id);
//    $stmt->bindValue(':genre_id', $genre_id);
//    $stmt->execute();
//    
//    }
    
}





catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: update_confirmation.php");
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
