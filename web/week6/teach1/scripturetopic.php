<?php
//connection
//connection
require_once ('connection.php');
$db = get_dbconnection();



?>
<!DOCTYPE html>
<html>
<head>
    <title>Scriptures and topics</title>
</head>
<style>
    span {
            font-weight: bold;
        }
    
</style>

<body>
    <h1>Scripture and Topic</h1>
    <ul>
        <?php
        
      //call database to get scriptures
        try
        {
            
            $query = 'SELECT id, book, chapter, verse, content FROM scriptures';
            $stmt = $db->prepare($query);
            $stmt->execute();
            $scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            
            foreach($scriptures as $scripture)
                {
               //assigns to variable
                $id = $scripture['id'];
                $book = $scripture['book'];
                $chapter = $scripture['chapter'];
                $verse = $scripture['verse'];
                $content = $scripture['content'];

                echo '<p>';
                echo '<span>' . $book . ' ' . $chapter . ':';
                echo $verse . '</span>' . '--' . $content;
                echo '<br>';
                echo 'Topics: ';
       
                }
            
            
        }
        
        
//        foreach($scriptures as $scripture)
//        {
//            
//            $id = $scripture['id'];
//            $book = $scripture['book'];
//            $chapter = $scripture['chapter'];
//            $verse = $scripture['verse'];
//            $content = $scripture['content'];
//
//            echo "<li><p><a href='scripture_content.php?id=$id'>$book-$chapter-$verse</a></p></li>";
//        
//        }
        ?>
    </ul>
    
    <form method="post" action="insert_scripture.php">
        <input type="hidden" name="book_id" value="">
        
        <label>Book</label>
        <input type="text" name="book" value="">
        <br>
        <label>Chapter</label>
        <input type="text" name="chapter" value="">
        <br>
        <label>Verse</label>
        <input type="text" name="verse" value="">
        <br>
        <label>Content</label>
        <textarea name="content"></textarea>
        <br>
        <input type="submit" value="Insert scripture">
    </form>
</body>
</html>