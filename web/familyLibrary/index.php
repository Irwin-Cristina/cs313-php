<?php
//require_once 'connection.php';


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
        <div class="wrapper">
        <h1>Family Library</h1>
        
            <div class="search">
                <p id="search"><a href="search.php">Search</a></p>
            </div>
        
            <div class="add">
                <p id="add"><a href="add.php">Add</a></p>
            </div>
        
            <div class="update">
                <p id="update"><a href="update.php">Update</a></p>
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