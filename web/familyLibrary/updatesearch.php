<?php
session_start();
//connection
require('dbConnect.php');
$db = get_db();

$output='';

//$id = "";
//$title = "";
//$author = "";

//collect datat
if(isset($_POST['txtTitle'])) { //name from form input
    $searchq = $_POST['txtTitle'];
    //$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    
    
    
    //$query="SELECT * FROM booktemp WHERE book_title LIKE '%$searchq%' OR author LIKE '%$searchq%' OR book_summary LIKE '%$searchq%'";
    $query="SELECT * FROM booktemp WHERE book_title LIKE '%$searchq%'";

    $stmt = $db->prepare($query) or die("could not search");
    $stmt->execute();
    //$results=$stmt->fetch(PDO::FETCH_ASSOC);
    
    $num_rows = $stmt->fetchColumn();
    if ($num_rows==0) {
        $output = 'There are no search results!';
    }else{
        foreach ($db->query("SELECT * FROM booktemp WHERE book_title LIKE '%$searchq%'") as $row)
        //foreach ($results as $result)
       // while ($row = $stmt->fetch($query)) {
      // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $book= $row['book_title'];
           $author=$row['author'];
           $count=$row['book_page_count'];
           
           $output.='<div>'.$book. ' Author: ' .$author.' page count: ' .$count. '<a href="update_book.php"> Update</a' . '</div>';
       }
   // }
    
}
    
    
    
    

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Library</h1>
        <p class="extratitle">Search for book to</p>
        <h2 class="spacingfix">Update</h2>
        <div class= "form fix">
        <form action ="updatesearch.php" method="POST">
            <div class ="text-input">
                
                <input type="text" name="txtTitle" placeholder="Please type the book's title"/>
                <label for="txtTitle">Book Title</label>

            </div>
            
             
            
            <div class="submitbtn">
                <input type="submit" value="search"/>
<!--                <input type="submit" value="display" name="submit-display">-->
             </div>   
                
        </form>
        <?php print("$output");?>
        <?php echo $output;?>

        </div>
        
<!--
        <div class="searchcontainer">
        <h4>Books</h4>
        <h5>All books in database</h5>
-->
            
            
        
<!--        </div>-->
      
    </main>
  
    <?php include('templates/footer.php');?>
    

</html  