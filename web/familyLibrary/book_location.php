<?php
session_start();


//variables from POST
$book = $_POST['txtTitle'];
$count = $_POST['txtCount'];
$summary = $_POST['txtSummary'];
$author = $_POST['txtAuthor'];
$location_ids = $_POST['chkLocations'];
$genre_ids = $_POST['chkGenres'];

//connection
require('dbConnect.php');
$db = get_db();
?>
<!DOCTYPE html>
<html>
<!--
<head>
    <title>Books and location</title>
</head>

<body>
-->
<?php include('templates/header.php');?>
<main>
    <h1>Family Library</h1>
    <h2>Confirmation</h2>

    <div class= "results">
        <?php
        //$query = 'SELECT book_id, book_title, book_page_count, book_summary, author FROM booktemp';
        //$stmt = $db->prepare($query);
        //$stmt->execute();
        ?>
         <p>Thank you for adding your book<?php //echo $book; ?> to your library.</p>
     </div>
    
    <div class="searchcontainer">
        <h4>Books</h4>
        <h5>All books currently in your library:</h5>

    <?php
        
      //call database to get scriptures
        try
        {

                $query = 'SELECT book_id, book_title, book_page_count, book_summary, author FROM booktemp';
                $stmt = $db->prepare($query);

                //$stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures');
                $stmt->execute();
                //$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

               //while ($row = $scriptures)
                //foreach($scriptures as $scripture)
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {   
                    //results
                    echo '<div class= "results">';
                    echo '<p>';
                    echo '<strong>' . $row['book_title'] . ' ' . $row['book_page_count'] . ':';
                    echo $row['book_summary'] . '</strong>' . ' - ' . $row['author'];

                    //location
                    echo '<strong> Location: </strong>';

                    $query = 'SELECT location_name FROM location l INNER JOIN booktemp_locations bl ON bl.location_id = l.location_id WHERE bl.book_id = :book_id';
                    $stmtLocations = $db->prepare($query);

                    // get the topics now for this scripture

                    //$stmtTopics = $db->prepare('SELECT name FROM topic t'
                     //   . ' INNER JOIN scripture_topic st ON st.scripture_id = t.id'
                      //  . ' WHERE st.scripture_id = :scripture_id');

                    $stmtLocations->bindValue(':book_id', $row['book_id']); //id on topics
                    $stmtLocations->execute();
                    //$topics=$stmtTopics->fetchAll(PDO::FETCH_ASSOC);
                    // Go through each topic in the result

                    while ($locationRow =  $stmtLocations->fetch(PDO::FETCH_ASSOC))
                    //foreach($topics as $topic)
                    {
                        echo $locationRow['location_name'] . ' ';
                    }





                    //gnere
                    echo '<strong> Genres: </strong>';

                    $query = 'SELECT genre_name FROM genre g INNER JOIN booktemp_genres bg ON bg.genre_id = g.genre_id WHERE bg.book_id = :book_id';
                    $stmtGenres = $db->prepare($query);

                    // get the topics now for this scripture

                    //$stmtTopics = $db->prepare('SELECT name FROM topic t'
                     //   . ' INNER JOIN scripture_topic st ON st.scripture_id = t.id'
                      //  . ' WHERE st.scripture_id = :scripture_id');

                    $stmtGenres->bindValue(':book_id', $row['book_id']); //id on topics
                    $stmtGenres->execute();
                    //$topics=$stmtTopics->fetchAll(PDO::FETCH_ASSOC);
                    // Go through each topic in the result

                    while ($genreRow =  $stmtGenres->fetch(PDO::FETCH_ASSOC))
                    //foreach($topics as $topic)
                    {
                        echo $genreRow['genre_name'] . ' ';
                    }


                    echo '</p>';
                    echo '</div>';
               }
        }
            catch (PDOException $ex)
            {
               echo "Error with DB. Details: $ex";
               die();
            }
    ?>
   </div>
    
    

    </main>
     <?php include('templates/footer.php');?>
</html>
