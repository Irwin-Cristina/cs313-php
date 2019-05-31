<?php
//connection
require('dbConnect.php');
$db = get_db();



//form check
//    $title = $author = $count = $location = $genre = $summary = '';
//    $errors=array('book_title'=>'', 'author'=>'', 'book_page_count'=>'', 'location'=>'','genre_name'=>'', 'book_summary'=>'');
//
//    if(isset($_GET['submit'])) {
//        //check title
//        if(empty($_GET['book_title'])) {
//            $errors['book_title'] = 'A book title is required <br/>';
//        } else {
//            $title=$_GET['book_title'];
//            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
//            $errors['book_title'] = 'Title must be letters and spaces only';
//        }
//            //echo htmlspecialchars($_GET['title']);  
//        }
//        
//        //check author
//        if(empty($_GET['author'])) {
//            $errors['author'] = 'An author is required <br/>';
//        } else {
//            $author=$_GET['author'];
//        if(!preg_match('/^[a-zA-Z\s]+$/', $author)) {
//            $errors['author'] = 'Author must be letters and spaces only';
//        }
//          //echo htmlspecialchars($_GET['author_namer']);  
//        }
//        
//        //check page count
//        if(empty($_GET['book_page_count'])) {
//            $errors['book_page_count'] = 'Please enter in page count <br/>';
//        } else {
//            $count =$_GET['book_page_count'];
//            if(!filter_var($count, FILTER_VALIDATE_INT)){
//            $errors['book_page_count'] = 'Page count must be a number';  
//        }
//          //echo htmlspecialchars($_GET['book_page_count']);  
//        }
//        
//        //check location
//        if(empty($_GET['location'])) {
//            $errors['location'] = 'Where is the book located? <br/>';
//        } else {
//          $location = ($_GET['location']);  
//        }
//        
//        //check genre
//        if(empty($_GET['genre_name'])) {
//            $errors['genre_name'] = 'Please choose a genre for the book <br/>';
//        } else {
//          $genre = ($_GET['genre_name']);  
//        }
//        
//        //check book summary
//        if(empty($_GET['book_summary'])) {
//            $errors['book_summary'] = 'Please write a summary <br/>';
//        } else {
//          $summary = htmlspecialchars($_GET['book_summary']);  
//        }
//    }

//end of GET check

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Library</h1>
        <h2>Add</h2>
        <div class= "form">
            
        <form id="addbookform" action ="add_book.php" method="POST">
            <input type="text" name="txtTitle" id="txtTitle">
            <label for="txtTitle">Title</label>
            <br>

            <input type="text" id="txtAuthor" name="txtAuthor"><label for="txtAuthor">Author</label>
            <br>
            
            <input type="text" id="txtCount" name="txtCount">
            <label for="txtCount">Page Count:</label>
            <br>
                
            <label for="txtContent">Summary:</label><br>
                <textarea id="txtContent" name="txtContent" rows="4" cols="50"></textarea>
                <br>
            
               

            <div class="checkbox">
            <label>Genres:</label>
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
                  $id = $row['genre_id']; //id
                  $name = $row['genre_name'];//name
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
                 
                 
                 
            
            <div class="checkbox">
                <label>Location:</label>
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
                  $id = $row['location_id']; //id
                  $name = $row['location_name'];//name
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
            <div class="submitbtn">
                <input type="submit" name="submit" value="Submit Book">
             </div>   
                
        </form>
        </div>
        
        
    
    </main>
  
    <?php include('templates/footer.php');
    
    
//        echo htmlspecialchars($_GET['title']);
//        echo htmlspecialchars($_GET['author_name']);
//        echo htmlspecialchars($_GET['book_page_count']);
//        echo htmlspecialchars($_GET['location']);
//        echo htmlspecialchars($_GET['genre_name']);
//        echo htmlspecialchars($_GET['book_summary']);
        
        ?>
    


</html>