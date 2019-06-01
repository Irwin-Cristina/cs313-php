<?php


//variables from POST
$book = $_POST['txtTitle'];
$count = $_POST['txtCount'];
$summary = $_POST['txtSummary'];
$author = $_POST['txtAuthor'];
$location_ids = $_POST['chkLocations'];
//$topic_ids = htmlspecialchars($_POST['chkTopics']);

 
 //echo "book=$book\n";
 //echo "chapter=$chapter\n";
 //echo "verse=$verse\n";
 //echo "content=$content\n";
 //echo "topic=$topic_ids\n";

//connection
require_once ('connection.php');
$db = get_dbconnection();


    


try {
//query
$query = 'INSERT INTO booktemp(book_title, book_page_count, book_summary, author) VALUES(:book_title, :book_page_count, :book_summary, :author)';
$stmt = $db->prepare($query);

//bind variables to values
$stmt->bindValue(':book_title', $book);
$stmt->bindValue(':book_page_count', $count);
$stmt->bindValue(':book_summary', $summary);
$stmt->bindValue(':author', $author);

$stmt->execute();

$book_id = $db->lastInsertId("booktemp_book_id_seq");
//$topic_ids = $db->lastInsertId("scriptures_id_seq");

//foreach($scripture_ids as $scripture_id) {
foreach($location_ids as $location_id) {
    echo "book_id: $book_id, location_id: $location_id";
    //query
    $query = 'INSERT INTO booktemp_locations(book_id, location_id) VALUES(:book_id, :location_id)';
    //prepare first statement
    $stmt = $db->prepare($query);
    //bind values
    $stmt->bindValue(':book_id', $book_id);
    $stmt->bindValue(':location_id', $location_id);
    $stmt->execute();
    
    }
    
}

catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: book_location.php");
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
