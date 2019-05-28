<?php


//if (!isset($_POST['txtBook']) && ($_POST['txtChapter']) && ($_POST['txtVerse']) && ($_POST['txtContent']) && ($_POST['chkTopics'])) 
//{
//    die("Error, missing information");
//}

//variables from POST
$book = htmlspecialchars($_POST['txtBook']);
$chapter = htmlspecialchars($_POST['txtChapter']);
$verse = htmlspecialchars($_POST['txtVerse']);
$content = htmlspecialchars($_POST['txtContent']);
$topicIds = htmlspecialchars($_POST['chkTopics[]']);

 
 echo "book=$book\n";
 echo "chapter=$chapter\n";
 echo "verse=$verse\n";
 echo "content=$content\n";

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

$scriptureId = $db->lastInsertId("scriptures_id_seq");

foreach($topicIds as $topicId) {
    echo "scriptureId: $scriptureId, topicId: $topicId";
    //query
    $query = 'INSERT INTO scripture_topic(scripture_id, topic_id) VALUES(:scriptureId, :topicId)';
    $stmt = $db->prepare($query);
    //bind values
    $stmt->bindValue(':scriptureId', $scriptureId);
    $stmt->bindValue(':topicId', $topicId);
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
header("Location: scripturetopic.php");
die();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
