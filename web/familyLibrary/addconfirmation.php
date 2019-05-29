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
            <p>Thank you for adding in new book to your library.</p>
        </div>
        
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>