<?php
$name =htmlspecialchars($_POST['name']);
$email =htmlspecialchars($_POST['email']);
$major =htmlspecialchars($_POST['major']);
$comment =htmlspecialchars($_POST['comment']);


/*
$continent =htmlspecialchars($_POST['continent']);
*/
?>

<!DOCType html>
<html>
<head>
    <title>Team Assignent 3 results</title>
    
</head>
<body>
    <h1>Welcome user: <?php echo $name;?> </h1>
    <p>Email address: <?php echo $email;?></p>
    <p>Major: <?php echo $major;?></p>
    <p>Comments: <?php echo $comment;?></p>
    
<!--    Part 3-->
     <h2>Visited Continents:</h2> 
    <p><?php if(!empty($_POST["continent"])) {
    foreach($_POST["continent"] as $continent) {
        echo $continent . "<br>";
    }
}?></p>
    
</body>

</html>