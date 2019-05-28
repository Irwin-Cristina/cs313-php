<?php
if (!isset($_GET['id'])) 
{
    die("Error, book id not specified. . .");
}

$book_id=htmlspecialchars($_GET['id']);

//connection
require_once ('connection1.php');
$db = get_dbconnection();

//query


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
