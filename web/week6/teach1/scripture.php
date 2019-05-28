<?php
//connection
//connection
require_once ('connection.php');
$db = get_dbconnection();

//try
//{
//  $dbUrl = getenv('DATABASE_URL');
//
//  $dbOpts = parse_url($dbUrl);
//
//  $dbHost = $dbOpts["host"];
//  $dbPort = $dbOpts["port"];
//  $dbUser = $dbOpts["user"];
//  $dbPassword = $dbOpts["pass"];
//  $dbName = ltrim($dbOpts["path"],'/');
//
//  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
//
//  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//}
//catch (PDOException $ex)
//{
//  echo 'Error!: ' . $ex->getMessage();
//  die();
//}
//
//foreach ($db->query('SELECT username, password FROM note_user') as $row)
//{
// echo 'user: ' . $row['username'];
// echo ' password: ' . $row['password'];
// echo '<br/>';
//}


//require_once 'connection.php';
//$db = get_dbconnection();
//SELECT id, chapter, verse, content from scriptures

//$query='SELECT * FROM scriptures WHERE id =:id';
//$stmt->bindValue(':id', $book_id, PDO::PARAM_INT);
$query='SELECT id, book, chapter, verse, content FROM scriptures';
$stmt = $db->prepare($query);
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
    <h1>Scriptures</h1>
    <ul>
        <?php
        //var_dump($scriptures);
        foreach($scriptures as $scripture)
        {
            //var_dump($scripture);
            
            $id = $scripture['id'];
            $book = $scripture['book'];
            $chapter = $scripture['chapter'];
            $verse = $scripture['verse'];
            $content = $scripture['content'];

            echo "<li><p><a href='scripture_content.php?id=$id'><span>$book</span>-$chapter-$verse</p></li>";
        }
        ?>
    </ul>
    
    <form method="post" action="insert_scripture.php">
        <input type="hidden" name="book_id" value="">
        
        <label>Book</label>
        <input type="text" name="book" value="">
        <label>Chapter</label>
        <input type="text" name="chapter" value="">
        <label>Verse</label>
        <input type="text" name="verse" value="">
        <label>Content</label>
        <textarea name="content"></textarea>
        <input type="submit" value="Insert scripture">
    </form>
</body>
</html>
