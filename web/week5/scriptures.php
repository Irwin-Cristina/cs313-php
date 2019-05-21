<?php

require_once 'connection.php';

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
        
        foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row)
            {
            echo '<p><span>' . $row['book'] . $row['chapter'] . $row['verse'] . '</span>'  .$row['content'] . '</p>';
            echo '<br/>';
            }
        ?>
    
    
    
    </body>

</html>
