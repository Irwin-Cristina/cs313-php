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
        <h2>Confirmation</h2>
        <div class= "results">
            <p>Your checkout was successful.</p>
        </div>
        
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>