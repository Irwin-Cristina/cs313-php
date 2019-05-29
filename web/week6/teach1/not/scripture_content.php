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
$query = 'SELECT * FROM scriptures WHERE id =:id';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $book_id, PDO::PARAM_INT);
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);
$scriptures_id = $scriptures[0]['id'];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Scripture detail</title>
</head>
<style>
    span {
            font-weight: bold;
        }
    
</style>
<body>
    <h1>Scripture and verse for <?php echo $scriptures_id?></h1>
    <?php
        foreach($scriptures as $scripture)
        {
            /*$content = $scripture['book'] . $scripture['chapter'] . $scripture['verse'] . $scripture['content'];*/
            
            
            $id = $scripture['id'];
            $book = $scripture['book'];
            $chapter = $scripture['chapter'];
            $verse = $scripture['verse'];
            $content = $scripture['content'];
            
           //echo "<p>$content</p";
           //echo "</br>";  
        echo '<br><strong>' . $book . ' ' . $chapter . ':' . $verse . '</strong> - ' . $content;
        
        }
    ?>
	</body>

</html>
