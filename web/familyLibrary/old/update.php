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
        <h2>Update</h2>
        <div class= "form">
        <form id="findbookform" action ="findbook.php">
            <div class ="text-input">
                <label for="book_title">Book Title</label>
                <input type="text" name="book_title" id="book_title" value="Please type the book title">
            </div>
            
            <div class ="text-input">
                <label for="author_name">Author</label>
                <input type="text" name="author_name" id="author_name" value="Please type the author's name">
            </div>
            
            
            <div class="submitbtn">
                <input type="submit" value="Submit">
             </div>   
                
        </form>
        </div>
        
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>