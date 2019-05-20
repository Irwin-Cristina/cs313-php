<?php

require_once 'connection.php';
//first option
foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}
//second option
$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}
//third option
//$statement = $db->query('SELECT username, password FROM note_user');
//$results = $statement->fetchAll(PDO::FETCH_ASSOC);

?>