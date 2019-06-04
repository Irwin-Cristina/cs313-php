<?php
session();

if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
}
else {
    header("Location:sign_in.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <div>
        <h1>Welcome to the site Homepage!</h1>
        Your username is: <?php  $username; ?> <br>
        <a href="sign_out.php">Sign Out</a>
                                                
    
    </div>

</body>
</html>
