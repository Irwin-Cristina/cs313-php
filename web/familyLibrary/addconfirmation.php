<?php

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
            
            <p>Thank you for adding the book to your library.</p>
        </div>
        <div class="searchcontainer">
            <?php
            //call database to get books
            try 
            {
            $query = 'SELECT book_id, book_title, book_page_count, book_summary, author FROM booktemp';
            $stmt = $db->prepare($query);
            $stmt->execute();
            
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<p>';
                    echo '<strong>' . $row['book_title'] . ' ' . $row['book_page_count'] . ':';
                    echo $row['author'] . '</strong>' . ' - ' . $row['book_summary'];

                    //Location
                    echo '<strong> Location: </strong>';

                    $query = 'SELECT location_name FROM location l INNER JOIN booktemp_locations bl ON bl.location_id = l.location_id WHERE bl.book_id = :book_id';
                    $stmtTopics = $db->prepare($query);

                    $stmtLocations->bindValue(':book_id', $row['location_id']);
                    $stmtLocations->execute();

                    while ($locationRow = $stmtLocations->fetch(PDO::FETCH_ASSOC)) 
                    {
                        echo $locationRow['location_name'] . ' ';
                    }
                    
                    //Genre
                    echo '<strong> Genre: </strong>';
                    $query = 'SELECT genre_name FROM genre g INNER JOIN booktemp_genres gl ON gl.genre_id = g.genre_id WHERE gl.book_id = :book_id';
                    $stmtGenres = $db->prepare($query);
                    
                    $stmtGenres->bindValue(':book_id', $row['genre_id']);
                    $stmtGenres->execute();
                    
                    while ($genreRow = $stmtGenres->fetch(PDO::FETCH_ASSOC)) 
                    {
                        echo $genreRow['genre_name'] . ' ';
                    }
                    
                    
                    echo'</p>';
                    
                    
                    
                }
            
            }
            
            catch (PDOException $ex)
            {
                echo "Error with DB. Details: $ex";
	           die();
            }
            
            
            ?>
            
        </div>
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>