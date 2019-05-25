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
        <h1>Family Library</h1>
        <h2>Search</h2>
        <div class= "form">
        <form action ="search-results.php" method="POST">
            <div class ="text-input">
                <label>Book Information</label>
                <input type="text" name="search" value= "" placeholder="Please type the book title or author">
            </div>
            
            <!--<div class ="text-input">
                <label>Author</label>
                <input type="text" name="author" value="" placeholder="Please type the author's name">
            </div>-->
           
            <!--<div class ="text-input">
            <label for="genre_name">Genre</label>
            <input type="text" name="genre_name" value="What genre">
            </div>-->
            
<!--            <div class ="dropdown">-->
               <!-- <button class="dropbtn">Dropdown</button>
                <div class="dropdown-content">
                    <a href="#">Checked in</a>
                    <a href="#">Checked out</a>
                    <a href="#">Missing</a>
                </div>-->
                
             <!--<div class="dropdown">
                <label for="status">Status</label>
                <select name="status">
				    <option value="" disabled selected>Select status</option>
				    <option value="Checked in">Checked in</option>
				    <option value="Checked out">Checked out</option>
				    <option value="Missing">Missing</option>
			     </select>
                </div>
            </div> -->
            
            <div class="submitbtn">
                <input type="submit" value="search" name="submit-search">
             </div>   
                
        </form>
        </div>
        
        <div class="searchcontainer">
        <h4>Books</h4>
        <h5>All books returned from Search</h5>
            
            <?php
                $sql ="SELECT book_title, book_page_count, author_id FROM book INNER JOIN author USING(author_id";
                $db->$sql=$result;
                //$result = ($db->query('SELECT book_title, book_page_count, author_id FROM book INNER JOIN author USING(author_id)'));
                $queryResults = pg_num_rows($result);
            
                if($queryResults > 0) {
                    while ($row = pg_fetch_assoc($result)) {
                        echo "<div class='box'>
                        <p> ".$row['book_title']." </p>
                        <p> ".$row['author_id']." </p>
                        <p> ".$row['book_page_count']." </p>
                        </div";
                        
                    }
                }
                    
                    
                    
                    
            ?>        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </div>
        
        
        
        
        
        
        
        
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html