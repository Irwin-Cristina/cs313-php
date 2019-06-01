<?php
//connection
require('dbConnect.php');
$db = get_db();

$output ='';

//collect

if(isset($_POST['search'])) {
    $searchq=$_POST['search'];
    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    
    $query="SELECT book_title, book_page_count, book_summary, author FROM booktemp WHERE book_title LIKE '%$searchq%' OR author LIKE '%$searchq%'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if ($count==0) {
        $output = 'There are no search results!';
    }else{
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $book= $row['book_title'];
           $author=$row['author'];
           $count=$row['book_page_count'];
           
           $output.='<div>'.$book.' ' .$author.' ' .$count.'</div>';
       }
    }
    
}



?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="search4.php" method="post">
    <input type="text" name="search" placeholder="Search for books" />
    <input type="submit" value=">>"/>
    
    
</form>
<?php print("$output");?>
    
</body>
</html>
