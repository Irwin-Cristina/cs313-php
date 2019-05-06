<?php
$name =htmlspecialchars($_POST['name']);
$email =htmlspecialchars($_POST['email']);
$major =htmlspecialchars($_POST['major']);

?>

<!DOCType html>
<html>
<head>
    <title></title>
    
</head>
<body>
    <h1>Welcome user:<?php echo $name;?> </h1>
    <h2>email: <?php echo $email;?></h2>
    <p>major is <?php echo $major;?></p>
</body>

</html>