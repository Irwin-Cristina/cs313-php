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
        foreach ($db->query('SELECT username, password FROM note_user') as $row)
            {
            echo 'user: ' . $row['username'];
            echo ' password: ' . $row['password'];
            echo '<br/>';
            }
        //foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row)
            //{
            //echo '<p><span>' . $row['book'] . $row['chapter'] . $row['verse'] . '</span>'  .$row['content'] . '</p>';
           // echo '<br/>';
            //}
        ?>
    
    
    
    </body>

</html>
