<?php
//connection

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
 echo 'user: ' . $row['username'];
 echo ' password: ' . $row['password'];
 echo '<br/>';
}


//require_once 'connection.php';
//$db = get_dbconnection();
//SELECT id, chapter, verse, content from scriptures

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
        var_dump($sriptures);
        foreach($sriptures as $scripture)
        {
            var_dump($sripture);
            
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
