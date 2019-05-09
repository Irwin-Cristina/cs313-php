<?php
/*$name =htmlspecialchars($_POST['name']);
$email =htmlspecialchars($_POST['email']);
$major =htmlspecialchars($_POST['major']);
$comment =htmlspecialchars($_POST['comment']);



$continent =htmlspecialchars($_POST['continent']);
*/
?>

<!DOCType html>
<html>
<head>
    <title>Shopping Cart</title>
    
</head>
<body>
    
     <h2>Items in your shopping cart:</h2> 
    <p><?php if(!empty($_POST["game"])) {
    foreach($_POST["game"] as $game) {
        echo $game . "<br>";
    }
}?></p>
    
</body>

</html>