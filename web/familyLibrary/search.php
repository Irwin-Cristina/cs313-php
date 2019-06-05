<?php
//connection
require('dbConnect.php');
$db = get_db();

$output='';

//$id = "";
//$title = "";
//$author = "";

//collect datat
if(isset($_POST['search'])) { //name from button
    $searchq = $_POST['search'];
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
           
           $output.='<div>'.$book. ' Author: ' .$author.' page count: ' .$count.'</div>';
       }
   // }
    
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
        <form action ="search.php" method="POST">
            <div class ="text-input">
                <label>Book Information</label>
                <input type="text" name="search" placeholder="Please type the book's title"/>
            </div>
            
             
            
            <div class="submitbtn">
                <input type="submit" value="search"/>
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
            
            
        
<!--        </div>-->
      
    </main>
  
    <?php include('templates/footer.php');?>
    

</html  