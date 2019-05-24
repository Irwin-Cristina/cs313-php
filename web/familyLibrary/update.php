<?php
//connection
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
 echo 'user: ' . $row['username'];
 echo ' password: ' . $row['password'];
 echo '<br/>';
}

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Library</h1>
        <h2>Update</h2>
        <div class= "form">
        <form action ="something.php">
            <div class ="text-input">
                <label for="book_title">Book Title</label>
                <input type="text" name="title" value="Please type the book title">
            </div>
            
            <div class ="text-input">
                <label for="author_name">Author</label>
                <input type="text" name="author_name" value="Please type the author's name">
            </div>
            
            
            <div class="submitbtn">
                <input type="submit" value="Submit">
             </div>   
                
        </form>
        </div>
        
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>