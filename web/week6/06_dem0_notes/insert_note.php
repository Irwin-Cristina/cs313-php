<?php
$course_id=htmlspecialchars($_POST['course_id']);
$content = htmlspecialchars($_POST['note_content']);

echo "$course_id\n";
echo $content;

require('dbconnect.php');
$db = get_db();
//SELECT c.code ,c.name, n.content FROM note n JOIN course c ON n.course_id = c.id WHERE c.id = 1;
$query = 'INSERT INTO note(course_id, content) VALUES (:course_id, :content);';
$stmt = $db->prepare($query);
$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

//$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();

$new_page ="course_notes.php?id=$course_id";

header("Location: $new_page");
die();

?>