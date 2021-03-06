<?php
//connection
require_once ('connection.php');
$db = get_dbconnection();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
    <h1>Enter New Scripture and topics</h1>
    
    <form id="mainForm" method="POST" action="insert_topic.php">
        
        
        <input type="text" name="txtBook" id="txtBook">
        <label for="txtBook">Book</label>
        <br>
        <input type="text" id="txtChapter" name="txtChapter"><label for="txtChapter">Chapter</label>
        <br>
        <input type="text" id="txtVerse" name="txtVerse">
        <label for="txtVerse">Verse</label>
        <br>
        <label for="txtContent">Content:</label><br>
        <textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
        <br>

	   <label>Topics:</label><br />
        
        <?php
        //generate checkboxes
        try {
            $query = 'SELECT id, name FROM topic';
            $stmt = $db->prepare($query);
            //$stmt = $db->prepare('SELECT id, name FROM topic');
            $stmt->execute();
            //$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            //foreach($topics as $topic)
	       {
		      $id = $row['id'];
		      $name = $row['name'];
		      // Notice that we want the value of the checkbox to be the id of the label
		      echo "<input type='checkbox' name='chkTopics[]' id='chkTopics$id' value='$id'>";
		      // Also, so they can click on the label, and have it select the checkbox,
		      // we need to use a label tag, and have it point to the id of the input element.
		      // The trick here is that we need a unique id for each one. In this case,
		      // we use "chkTopics" followed by the id, so that it becomes something like
		      // "chkTopics1" and "chkTopics2", etc.
		      echo "<label for='chkTopics$id'>$name</label><br />";
		      // put a newline out there just to make our "view source" experience better
		      echo "\n";
            
                }  
        }
        catch (PDOException $ex)
        {
	       // Please be aware that you don't want to output the Exception message in
	       // a production environment
	   echo "Error connecting to DB. Details: $ex";
	   die();
}
?>
        
        <br>

        <input type="submit" value="Insert scripture">
    </form>
    

</body>
</html>
