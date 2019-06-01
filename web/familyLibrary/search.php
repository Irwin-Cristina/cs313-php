<?php
//connection
require('dbConnect.php');
$db = get_db();

$output='';

//$id = "";
//$title = "";
//$author = "";

//
if(isset($_GET['search'])) { //name from button
    $searchq=$_GET['search'];
    //$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    
    $query="SELECT * FROM booktemp WHERE book_title LIKE '%$searchq%' OR author LIKE '%$searchq%' OR book_summary LIKE '%$searchq%'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $num_rows = $stmt->fetchColumn();
    if ($num_rows==0) {
        $output = 'There are no search results!';
    }else{
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $book= $row['book_title'];
           $author=$row['author'];
           $count=$row['book_page_count'];
           
           $output='<div>'.$book.' ' .$author.' ' .$count.'</div>';
       }
    }
    
}
    
    
    
    //$id=$_GET['id'];   //id from from input
    
    //$query="SELECT * FROM book WHERE book_title =:title";
    //$stmt = $db->prepare($query);
    //$stmt->execute();
    
    //$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($results);
    
    
//    if($stmt) {
//        if($stmt->rowcount()>0) {
//            foreach($results as $row) {
//                $id = $row->id;
//                $title = $row->title;
//                $author = $row->author;
//            }
//        } else {
//            
//        } echo '<script> alert("No Data Found")</script';
//    }
        
//    $pdoQuery = "SELECT * FROM book WHERE book_title =:title";
//    $pdoQuery_run = $db->prepare($pdoQuery);
//    $pdoQuery_exec = $pdoQuery_run->execute(array(":title=>$title"));
    
//    if($pdoQuery_exec) {
//        if($pdoQuery_run->rowcount()>0) {
//            foreach($pdoQuery_run as $row) {
//                $id = $row->id;
//                $title = $row->title;
//                $author = $row->author;
//            }
//        } else {
//            
//        } echo '<script> alert("No Data Found")</script';
//    }
        



//display

//if(isset($_GET['submit-display'])) {
//        $pdoQuery = "SELECT * FROM book";
//        $pdoQuery_run = $db->query($pdoQuery);
//        
//        if($pdoQuery_run) {
//            
//            echo '<table width="50%" border="1" cellpadding="5" cellspacing="5">
//                <tr style ="color:blue;">
//                    <td> ID </td>
//                    <td> Book Title </td>
//                    <td> Author Id </td>
//
//                </tr>
//            
//            
//            ';
//            while($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)){
//            //foreach($pdoQuery_run as $row)   
//                
//            echo ' <tr>
//                        <th> ' .$row->book_id. '</th>
//                        <th> ' .$row->book_title. '</th>
//                        <th> ' .$row->author_id. '</th>
//                    </tr>
//                    
//            ';
//            
//            }
//            echo '</table>';
//            
//            
//        }else{
//            echo'<script> alert("No record/data found")</script>';
//        }
//    }
    

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Library</h1>
        <h2>Search</h2>
        <div class= "form">
        <form action ="search.php" method="GET">
            <div class ="text-input">
                <label>Book Information</label>
                <input type="text" name="search" placeholder="Please type the book's title or author's name">
            </div>
            
             <!--<div class ="text-input">
                <label>Book Title</label>
                <input type="text" name="title" value= "" placeholder="Please type the book title or author">
            </div>-->
            
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
                <input type="submit" value="search">
<!--                <input type="submit" value="display" name="submit-display">-->
             </div>   
                
        </form>
        <?php print("$output");?>
        </div>
        
<!--
        <div class="searchcontainer">
        <h4>Books</h4>
        <h5>All books in database</h5>
-->
            
            <?php
            
//                $query = 'SELECT book_title, book_page_count, b.author_id FROM book b INNER JOIN author a ON a.author_id =b.author_id WHERE b.author_id = :author_id';
//                $stmt = $db->prepare($query); 
//                //Do I need to bind?
//                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            
//                foreach ($results as $row){
//                       echo '<div class="box">';
//                        echo '<p> Book: ' . $row['book_title'] . '</p>';
//                        echo '<p> Page Count: ' . $row['book_page_count'] . '</p>';
//                        echo '<p> Author: ' . $row['a.author_id'] . '</p>';
//
//                        echo '</div>';
//                }
//            
//            
//            
//            
//                $sql ="SELECT * FROM book";
//                $result = pg_query($db, $sql);
//                $queryResults = pg_num_rows($result);
//            
//                if ($queryResults > 0) {
//                    while ($row = pg_fetch_assoc($result)) {
//                        echo "<div class='box'> 
//                            <p> ".$row['book_title']." </p>
//                            <p> ".$row['author_id']." </p>
//                            <p> ".$row['book_page_count']." </p>
//                        </div>";
//                    }
//                }
                
            ?>      
        
<!--        </div>-->
      
    </main>
  
    <?php include('templates/footer.php');?>
    

</html  