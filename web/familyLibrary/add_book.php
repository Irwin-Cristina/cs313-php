<?php
$title=$_POST['txtTitle'];
$count=$_POST['txtCount'];
$summary=$_POST['txtContent'];
$author=$_POST['txtAuthor'];
$location_ids=$_POST['chkLocations'];
//$genre_ids=$_POST['chkGenres'];


echo "book=$title\n";
echo "pgecount=$count\n";
echo "summary=$summary\n";
echo "author=$author\n";
//echo "topic=$topic_ids\n";



//connection
require('dbConnect.php');
$db = get_db();


try {
    
$query = 'INSERT INTO booktemp(book_title, book_page_count, book_summary, author) VALUES(:book_title, :book_page_count, :book_summary, :author)';
$stmt = $db->prepare($query);


//bind variables to values
$stmt->bindValue(':book_title', $title);
$stmt->bindValue(':book_page_count', $count);
$stmt->bindValue(':book_summary', $summary);
$stmt->bindValue(':author', $author);

$stmt->execute();

$book_id = $db->lastInsertId("booktemp_book_id_seq");
    
//location
    
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

    //genres
    
    //foreach($genre_ids as $genre_id) {
    //echo "book_id: $book_id, genre_id: $genre_id";
    //query
    //$query = 'INSERT INTO booktemp_genres(book_id, genre_id) VALUES(:book_id, :genre_id)';
    //prepare first statement
    //$stmt = $db->prepare($query);
    //bind values
    //$stmt->bindValue(':book_id', $book_id);
    //$stmt->bindValue(':genre_id', $genre_id);
    //$stmt->execute();
    
    //}  
}

catch (Exception $ex)
    
{
    echo "Error with DB. Details: $ex";
    die();
    
}


//header("Location: addconfirmation.php");
//die();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
