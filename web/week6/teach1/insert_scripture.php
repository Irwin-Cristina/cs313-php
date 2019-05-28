<?php
//connection
require_once 'connection.php';
$db = get_dbconnection();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
    <h1>Enter New Scripture and topics</h1>
    
    <form method="POST" action="insert_topic.php" id="scriptureForm">
<!--        <input type="hidden" name="book_id" value="">-->
        
        <label>Book</label>
        <input type="text" name="book" id="book" value="book">
        <br>
        <label>Chapter</label>
        <input type="text" name="chapter" id="chapter" value="chapter">
        <br>
        <label>Verse</label>
        <input type="text" name="verse" value="verse" id="verse">
        <br>
        <label>Content</label>
        <textarea name="content" id="content" rows="4" cols="30"></textarea>
        <br><br>
        <label>Topics</label><br>
        
        <?php
        //generate checkboxes
        try {
        $query = 'SELECT id, name FROM topic'; 
        $stmt = $db->($query); 
        $stmt->execute();
        $topics = $stmt->fetch(PDO::FETCH_ASSOC);    
        
            foreach($topics as $topic)  {
                $id = $topic['id'];
                $name = $topic['name'];

                echo "<input type='checkbox' name='checkTopics[]' id='checkTopics$id' value='$id'>";

                echo "<label='checkTopics$id'>$name</label><br>";
                echo"<div></div>"
                }  
        }
        catch (PDOException $ex) {
            echo "Error connecting to DataBase. Details $ex";
            die();
            
        }
        
        ?>
        
        <br>

        <input type="submit" value="Insert scripture">
    </form>

</body>
</html>
