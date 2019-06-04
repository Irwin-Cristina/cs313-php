<?php
//require("password.php");
session_start();
unset($_SESSION['username']);

header("Location:sign_in.php");
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
