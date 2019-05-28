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
    
    <form id="mainForm" method="POST" action="insertTopic.php">
        
        <label for="txtBooK">Book</label>
        <input type="text" name="book" id="book">
        <br>
        <input type="text" id="txtChapter" name="txtChapter">
	   <label for="txtChapter">Chapter</label>
	   <br /><br />

	   <input type="text" id="txtVerse" name="txtVerse">
	   <label for="txtVerse">Verse</label>
	   <br /><br />

	   <label for="txtContent">Content:</label><br />
	   <textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
	   <br /><br />

	   <label>Topics:</label><br />
        
        <?php
        //generate checkboxes
        try {
            $query = 'SELECT id, name FROM topic';
            $statement = $db->prepare($query);
            //$statement = $db->prepare('SELECT id, name FROM topic');
            $statement->execute();
            $topics = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            foreach($topics as $row)
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
            
            
        //$query = 'SELECT id, name FROM topic'; 
        //$stmt = $db->($query); 
        //$stmt->execute();
        //$topics = $stmt->fetch(PDO::FETCH_ASSOC);    
        
            //foreach($topics as $topic)  {
                //$id = $topic['id'];
                //$name = $topic['name'];

                //echo "<input type='checkbox' name='checkTopics[]' id='checkTopics$id' value='$id'>";

                //echo "<label='checkTopics$id'>$name</label><br>";
                //echo"<div></div>"
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
