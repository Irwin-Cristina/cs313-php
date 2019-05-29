<?php



    if(isset($_POST['submit'])) {
        if(!empty($_POST['chkTopics[]'])){
            foreach($_POST['chkTopics'] as $selected){
                echo $selected."<br>";
            }
 
        }
    }
    

//variables from POST
$book = htmlspecialchars($_POST['txtBook']);
$chapter = htmlspecialchars($_POST['txtChapter']);
$verse = htmlspecialchars($_POST['txtVerse']);
$content = htmlspecialchars($_POST['txtContent']);
$topic_ids = htmlspecialchars($_POST['chkTopics[]']);
//$topic_ids = htmlspecialchars($_POST['chkTopics']);

 
 echo "book=$book\n";
 echo "chapter=$chapter\n";
 echo "verse=$verse\n";
 echo "content=$content\n";
 echo "topic=$topic_ids\n";

//connection
require_once ('connection.php');
$db = get_dbconnection();


    


try {
//query
$query = 'INSERT INTO scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
$stmt = $db->prepare($query);

//bind variables to values
$stmt->bindValue(':book', $book);
$stmt->bindValue(':chapter', $chapter);
$stmt->bindValue(':verse', $verse);
$stmt->bindValue(':content', $content);

$stmt->execute();

$scripture_id = $db->lastInsertId("scriptures_id_seq");
//$topic_ids = $db->lastInsertId("scriptures_id_seq");

//foreach($scripture_ids as $scripture_id) {
foreach($topic_ids as $topic_id) {
    echo "scripture_id: $scripture_id, topic_id: $topic_id";
    //query
    $query = 'INSERT INTO scripture_topic(scripture_id, topic_id) VALUES(:scripture_id, :topic_id)';
    $stmt = $db->prepare($query);
    //bind values
    $stmt->bindValue(':scripture_id,', $scripture_id);
    $stmt->bindValue(':topic_id', $topic_id);
    $stmt->execute();
    
    }
    
}

catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
//header("Location: scripture_topic.php");
//die();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
