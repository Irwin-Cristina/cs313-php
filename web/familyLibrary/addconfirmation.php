<?php

$title=$_POST['book_title'];
$count=$_POST['book_page_count'];
$summary=$_POST['book_summary'];
$author=$_POST['author_name'];
$location=$_POST['location']; //$location=$_POST['genre_name[]'];
$genre=$_POST['genre'];


//connection
require('dbConnect.php');
$db = get_db();
?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Library</h1>
        <h2>Confirmation</h2>
        <div class= "results">
            
            <p>Thank you for adding <?php echo $title; ?> to your library.</p>
        </div>
        <div class="searchcontainer">
            <h4>Books</h4>
            <h5>All books currently in database:</h5>
            <?php
            //call database to get books
            $query ='SELECT book_title, book_page_count, author, location, genre FROM booktemp';
            $stmt = $db->prepare($query);
            $stmt->execute();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
            {
            echo echo "<div class='box'>
                            <p> ".$row['book_title']." </p>
                            <p> ".$row['author']." </p>
                            <p> ".$row['book_page_count']." </p>
                        </div>";
            
            
            }
            
            ?>
        </div>
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>