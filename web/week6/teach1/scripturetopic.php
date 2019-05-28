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
    <div>
    <h1>Scripture and Topic</h1>
        <?php
        
      //call database to get scriptures
        try
        {
            
            $query = 'SELECT id, book, chapter, verse, content FROM scriptures';
            $stmt = $db->prepare($query);
            $stmt->execute();
            //$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            //while ($row = $scriptures)
            //foreach($scriptures as $scripture)
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                
                echo '<p>';
                echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
                echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
                echo 'Topics: ';
		      // get the topics now for this scripture    
                $stmtTopics = $db->prepare('SELECT name FROM topic t'
			    . ' INNER JOIN scripture_topic st ON st.scripture_id = t.id'
                . '  WHERE st.scripture_id = :scriptureId');
                $stmtTopics->bindValue(':scriptureId', $row['id']);
                $stmtTopics->execute();
                // Go through each topic in the result
                
                    while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
                    {
                        echo $topicRow['name'] . ' ';
                        
                    echo '</p>';
               //assigns to variable
//                $id = $scripture['id'];
//                $book = $scripture['book'];
//                $chapter = $scripture['chapter'];
//                $verse = $scripture['verse'];
//                $content = $scripture['content'];

//                echo '<p>';
//                echo '<span>' . $book . ' ' . $chapter . ':';
//                echo $verse . '</span>' . '--' . $content;
//                echo '<br>';
//                echo 'Topics: ';
                //echo "<li><p><a href='scripture_content.php?id=$id'>$book-$chapter-$verse</a></p></li>";
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
    </div>
    
    <!--<form method="post" action="insert_scripture.php">
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
    </form>-->
</body>
</html>
