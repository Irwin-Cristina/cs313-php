<?php
require_once 'connection.php';


/*try
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
}*/

?>

<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Scriptures-Teach week 5</title>
        <meta name="author" content="Cristina Irwin">
    </head>
    <style>
        span {
            font-weight: bold;
        }
    
    </style>
    <body>
        <h1>Scripture Resources</h1>
        
        <?php
        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
        $statement->execute();
        
        foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
            {
            echo '<p><span>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</span>' . ' '  . $row['content'] . '</p>';
            echo '<br/>';
            }
        ?>
    
    
    
    </body>

</html>
