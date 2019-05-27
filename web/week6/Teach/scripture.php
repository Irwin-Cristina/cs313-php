<?php
//connection
require_once 'connection.php';
$db = get_dbconnection();
//SELECT id, chapter, verse, content from scriptures

$query='SELECT id, book, chapter, verse, content FROM scriptures;';
$stmt =  $db->prepare($query);
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html>
<head>
    <title>Scriptures</title>
</head>
<style>
    span {
            font-weight: bold;
        }
    
</style>

<body>
    <h1>Scriptues</h1>
    <ul>
        <?php
        foreach($sriptures as $scripture)
        {
            $id = scripture['id'];
            $book = scripture['book'];
            $chapter = scripture['chapter'];
            $verse = scripture['verse'];
            $content = scripture['content'];

            echo "<li><p><a href=scripture_notes.php?scripture_id=$id'><span>$book</span>-$chapter-$verse</p></li>";
        }


        ?>
    </ul>
</body>
</html>
