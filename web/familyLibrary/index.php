<?php 
require('dbConnect.php');
$db = get_db();

//foreach ($db->query('SELECT book_title, book_page_count, author_id FROM book') as $row)
//{
// echo 'Book: ' . $row['book_title'];
// echo 'Page Count: ' . $row['book_page_count'];
// echo 'Author: ' . $row['author_id'];
//
// echo '<br/>';
//}

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <div class="wrapper">
        <h1>Family Library</h1>
        
            <div class="search">
                <p id="search"><a href="search.php">Search</a></p>
            </div>
        
            <div class="add">
                <p id="add"><a href="insert_book.php">Add</a></p>
            </div>
        
            <div class="update">
                <p id="update"><a href="update_book.php">Update</a></p>
            </div>
        
            <div class="checkout">
                <p id="checkout"><a href="checkout.php">Check out</a></p>
            </div>
        
            <div class="checkin">
                <p id="checkin"><a href="checkin.php">Check in</a></p>
            </div>
     </div>       
            
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>