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
        $id = $book['b.book_id'];
        $title = $book['b.book_title'];
        $count = $book['b.book_page_count'];
        $author = $book['a.author_name'];
        
        echo "<li><p> title: $title - author $author</p></li>";
        
    }    
        ?>
    
    </ul>

</body>
</html>

