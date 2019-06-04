<?php 
$username=$_POST['username'];
$password=$_POST['password'];

if (!isset($username) || $username == ""
	|| !isset($password) || $password == "")
{
	header("Location: registration.php");
	die(); // we always include a die after redirects.
}


$username = htmlspecialchars($username);
//$username=filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//$password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//$checkpassword = checkPassword($checkpassword);

//if(empty($username)|| empty($password)) {
    //$message = "<p> Please provide information for all empty fields.</p>";
//}

$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

//connecion
require_once ('connection.php');
$db = get_dbconnection();


$query='INSERT INTO users(username, password) VALUES (:username, :password)';
//Create the prepared statement using connection
$stmt=$db->prepare($query);
 //bind variables to values
//$stmt->bindValue(':username', $username, PDO::PARAM_STR);
//$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $hashedpassword);

$stmt->execute();
    
//$user_id =$db->lastInsertId("users_id_seq");
    

header("Location: sign_in.php");
die();
?>