<?php

require('dbConnect.php');
$db = get_db();

$query = 'SELECT * FROM author a JOIN book b ON a.author_id = b.author_id;';
$stmt = $db->prepare($query);
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
    
        
    foreach($books as $book){
        
        $id = $book['book']['book_id'];
        $title = $book['book.book_title'];
        $count = $book['book.book_page_count'];
        $author = $book['author.author_id'];
        
        echo "<li><p>$title - $author</p></li>";
        echo "<p> $id </p>";
        
    }    
        ?>
    
    </ul>

</body>
</html>

