<?php
if (!isset($_GET['id'])) 
{
    die("Error, book id not specified. . .");
}

$book_id=htmlspecialchars($_GET['id']);

//connection
require_once ('connection.php');
$db = get_dbconnection();

//query
$query = 'SELECT id, book, chapter, verse, content FROM scriptures';
$stmt = $db->prepare($query);
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Scripture detail</title>
</head>
<body>
    <h1>Scripture and verse</h1>
    <?php
        foreach($scriptures as $scripture)
        {
            $id = $scripture['id'];
            $book = $scripture['book'];
            $chapter = $scripture['chapter'];
            $verse = $scripture['verse'];
            $content = $scripture['content'];
            
            
        echo '<br><strong>' . $book . ' ' . $chapter 
			  . ':' . $verse . '</strong> - ' . $content;
        
        }
    ?>
	</body>

</html>
