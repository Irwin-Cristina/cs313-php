<?php

session_start();

//connection
require('dbConnect.php');
$db = get_db();
?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
  <main>
    <h1>Family Library</h1>
    <h2>Add</h2>
    <div class="form">
      
    <form id="mainForm" method="POST" action="insert_location.php">
        
        
        <input type="text" name="txtTitle" id="txtTitle">
        <label for="txtTitle">Title</label>
        <br>
        <input type="text" id="txtCount" name="txtCount"><label for="txtCount">Count</label>
        <br>
        
        <input type="text" id="txtAuthor" name="txtAuthor">
        <label for="txtAuthor">Author</label>
        <br>
        <br>
        <label for="txtSummary">Summary:</label><br>
        <textarea id="txtSummary" name="txtSummary" rows="4" cols="50"></textarea>
        <br>
        
        <div class="checkbox">
        <label>Location:</label><br />
        
        <?php
        //generate checkboxes
        try {
            $query = 'SELECT location_id, location_name FROM location';
            $stmt = $db->prepare($query);
            //$stmt = $db->prepare('SELECT id, name FROM topic');
            $stmt->execute();
            //$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            //foreach($topics as $topic)
	       {
		      $id = $row['location_id'];
		      $name = $row['location_name'];
		      // Notice that we want the value of the checkbox to be the id of the label
		      echo "<input type='checkbox' name='chkLocations[]' id='chkLocations$id' value='$id'>";
		      // Also, so they can click on the label, and have it select the checkbox,
		      // we need to use a label tag, and have it point to the id of the input element.
		      // The trick here is that we need a unique id for each one. In this case,
		      // we use "chkTopics" followed by the id, so that it becomes something like
		      // "chkTopics1" and "chkTopics2", etc.
		      echo "<label for='chkLocations$id'>$name</label><br />";
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
        
        </div>
        
        <div class="checkbox">
        <label class="heading">Genres:</label><br />
        
        <?php
        //generate checkboxes
            try {
                $query = 'SELECT genre_id, genre_name FROM genre';
                $stmt = $db->prepare($query);
                //$stmt = $db->prepare('SELECT id, name FROM topic');
                $stmt->execute();
                //$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                //foreach($topics as $topic)
               {
                  $id = $row['genre_id'];
                  $name = $row['genre_name'];
                  // Notice that we want the value of the checkbox to be the id of the label
                  echo "<input type='checkbox' name='chkGenres[]' id='chkGenres$id' value='$id'>";
                  // Also, so they can click on the label, and have it select the checkbox,
                  // we need to use a label tag, and have it point to the id of the input element.
                  // The trick here is that we need a unique id for each one. In this case,
                  // we use "chkTopics" followed by the id, so that it becomes something like
                  // "chkTopics1" and "chkTopics2", etc.
                  echo "<label for='chkGenres$id'>$name</label><br />";
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
        
        
        </div>

        <input type="submit" value="Insert Book">
    </form>
    </div>
</main>  

<?php include('templates/footer.php');?>
    
</html>

