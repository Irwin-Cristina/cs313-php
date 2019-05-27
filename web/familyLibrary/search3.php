<?php

if (!isset($_GET['author_id'])) 
{
    die("Error, course id not specified...");
}
$author_id = htmlspecialchars($_GET['author_id']);

require('dbConnect.php');
$db = get_db();

$query = 'SELECT a.author_name, a.author_id FROM author a JOIN book b ON a.author_id = b.author_id WHERE a.author_id=:id;
';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $author_id, PDO::PARAM_INT);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
    <h1>Books</h1>
    <ul>
<?php
    //var_dump($books);
        
    foreach($books as $book){
        //var_dump($book);
        
        $id = $book['book_id'];
        $title = $book['book_title'];
        $count = $book['book_page_count'];
        $author = $book['author_id'];
        
        echo "<li><p>$title - $author</p></li>";
        
    }    
        ?>
    
    </ul>

</body>
</html>

