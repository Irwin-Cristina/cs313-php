<?php
//connection
require_once ('connection.php');
$db = get_dbconnection();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Scriptures and topics</title>
</head>
<!--
<style>
    span {
            font-weight: bold;
        }
    
</style>
-->

<body>
<div>
<h1>Scripture and Topic</h1>
<?php
        
      //call database to get scriptures
try
{
            
            $query = 'SELECT id, book, chapter, verse, content FROM scriptures';
            $stmt = $db->prepare($query);
    
            //$stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures');
            $stmt->execute();
            $scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
           // while ($row = $scriptures)
            foreach($scriptures as $scripture)
            //while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo '<p>';
                echo '<strong>' . $scripture['book'] . ' ' . $scripture['chapter'] . ':';
                echo $scripture['verse'] . '</strong>' . ' - ' . $scripture['content'];
                echo '<strong> Topics: </strong>';
                
                $query = 'SELECT name FROM topic t INNER JOIN scripture_topic st ON st.scripture_id = t.id WHERE st.scripture_id = :scriptureId';
                $stmtTopics = $db->prepare($query);
                
                // get the topics now for this scripture
                
                //$stmtTopics = $db->prepare('SELECT name FROM topic t'
                 //   . ' INNER JOIN scripture_topic st ON st.scripture_id = t.id'
                  //  . ' WHERE st.scripture_id = :scriptureId');
                
                $stmtTopics->bindValue(':scriptureId', $scripture['id']);
                $stmtTopics->execute();
                $topics=$stmtTopics->fetch(PDO::FETCH_ASSOC);
                // Go through each topic in the result
                
                //while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
                foreach($topics as $topic)
                {
                    echo $topic['name'] . ' ';
                }
                echo '</p>';
	}
}
        catch (PDOException $ex)
        {
	       echo "Error with DB. Details: $ex";
	       die();
        }
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
