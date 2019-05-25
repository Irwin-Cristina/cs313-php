<?php
//connection
function get_dbconnection() {
    $db=NULL;

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
    return $db;

}


/*try
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
}*/
$db = get_dbconnection();
foreach ($db->query('SELECT book_title, book_page_count, author_id FROM book INNER JOIN author USING(author_id)') as $row)
    {
        echo 'Book: ' . $row['book_title'];
        echo 'Page Count: ' . $row['book_page_count'];
        echo 'Author: ' . $row['author_id'];

        echo '<br/>';
    }

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Libray</h1>
        <h2>Search Results</h2>
        
        <div class ="searchcontainer">
        <?php
            if(isset($_POST['submit-search'])) {
                
                //$db = new //PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", //$dbUser, $dbPassword);
                $db = get_dbconnection();
                $search = pg_escape_string($db, $_GET['search']);
                $sql="SELECT * FROM book WHERE book_title LIKE '%$search%' OR author_id LIKE '%$search%'";
                $result = pg_query($db, $sql);
                $queryResult = pg_num_rows($result);
                
                if($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='box'>
                            <p> ".$row['book_title'] ." </p>
                            <p> ".$row['author_id'] ." </p>
                            <p> ".$row['book_page_count'] ." </p>
                        </div>";
                    }
                }else {
                    echo "There are no results matching your search!";
                }
            }
            
            
        ?>
        </div>
            
        
        
        
        
<!--        to show connection only-->
        
        <div>
            <?php foreach($db->query('SELECT book_title, book_page_count, author_id FROM book INNER JOIN author USING(author_id)') as $row){ ?>
                <h6><?php echo 'Book Title:' .  htmlspecialchars($row['book_title']); ?></h6>
                <div><?php echo 'Author:' . htmlspecialchars($row['author_id']); ?></div>
                <div><?php echo  'Page Count:' . htmlspecialchars($row['book_page_count']); ?></div>
            <div>
                <a href="#">book detail</a>
            </div>
            
            <?php } ?>
        </div>
        
            
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>