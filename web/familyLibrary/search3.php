<?php

if (!isset($_GET['book_id'])) 
{
    die("Error, course id not specified...");
}
$author_id = htmlspecialchars($_GET['book_id']);

require('dbConnect.php');
$db = get_db();

$query = 'SELECT * FROM author a JOIN book b ON a.author_id = b.author_id WHERE a.author_id=:id;
';

//$query = 'SELECT a.author_name, a.author_id FROM author a JOIN book b ON a.author_id = b.author_id WHERE a.author_id=:id;
//';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $author_id, PDO::PARAM_INT);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Deatails</title>
</head>
<body>
    <h1>Book Details</h1>
    <ul>
<?php
    //var_dump($books);
        
    foreach($books as $book){
        //var_dump($book);
        
        $id = $book['book_id'];
        $title = $book['book_title'];
        $count = $book['book_page_count'];
        $authorid = $book['author_id'];
        $author = $book['author_name'];
        
        echo "<li><p>book id: $id</p></li>";
        echo "<li><p>book title: $title</p></li>";
        echo "<li><p>book page count: $count</p></li>";
        echo "<li><p>author_id: $authorid</p></li>";
        echo "<li><p>author: $author</p></li>";
        

        
    }    
        ?>
    
    </ul>

</body>
</html>

