<?php 
$username=$_POST['username'];
$password=$_POST['password'];
//$username=filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//$password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//$checkpassword = checkPassword($checkpassword);

//if(empty($username)|| empty($password)) {
    //$message = "<p> Please provide information for all empty fields.</p>";
//}

//$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

//connecion
require_once ('connection.php');
$db = get_dbconnection();

try{
$query='INSERT INTO users(username, password) VALUES (:username, :password)';
//Create the prepared statement using connection
$stmt=$db->prepare($query);
 //bind variables to values
//$stmt->bindValue(':username', $username, PDO::PARAM_STR);
//$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);

$stmt->execute();
    
$user_id =$db->lastInsertId("users_id_seq");
    
}
catch (Exception $ex)
    
{
    echo "Error with DB. Details: $ex";
    die();
    
}
header("Location: registration_confirmation.php");
die();