<?php
//connection
require_once ('connection.php');
$db = get_dbconnection();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Books and location</title>
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
<h1>Book and Topic</h1>
<?php
        
      //call database to get scriptures
    try
    {
            
            $query = 'SELECT book_id, book_title, book_page_count, book_summary, author FROM booktemp';
            $stmt = $db->prepare($query);
    
            //$stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures');
            $stmt->execute();
            //$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
           //while ($row = $scriptures)
            //foreach($scriptures as $scripture)
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo '<p>';
                echo '<strong>' . $row['book_title'] . ' ' . $row['book_page_count'] . ':';
                echo $row['book_summary'] . '</strong>' . ' - ' . $row['author'];
                echo '<strong> Locations: </strong>';
                
                $query = 'SELECT location_name FROM location l INNER JOIN booktemp_locations bl ON bl.location_id = l.location_id WHERE bl.book_id = :book_id';
                $stmtLocations = $db->prepare($query);
                
                // get the topics now for this scripture
                
                //$stmtTopics = $db->prepare('SELECT name FROM topic t'
                 //   . ' INNER JOIN scripture_topic st ON st.scripture_id = t.id'
                  //  . ' WHERE st.scripture_id = :scripture_id');
                
                $stmtLocations->bindValue(':book_id', $row['book_id']); //id on topics
                $stmtLocations->execute();
                //$topics=$stmtTopics->fetchAll(PDO::FETCH_ASSOC);
                // Go through each topic in the result
                
                while ($locationRow =  $stmtLocations->fetch(PDO::FETCH_ASSOC))
                //foreach($topics as $topic)
                {
                    echo $locationRow['location_name'] . ' ';
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
