<?php

require('dbConnect.php');
$db = get_db();

$query = 'SELECT book_id, book_title, book_page_count FROM book';
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
    var_dump($books);
    foreach($books as $book){
        
        var_dump($book);
        $id = $book['book_id'];
        $title = $book['book_title'];
        $count = $book['book_page_count'];
        
        echo "<li><p><a href='search3.php?author_id=$id'>$title-$count</p></li>";
        
    }    
        ?>
    
    </ul>

</body>
</html>

