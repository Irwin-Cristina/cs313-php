<?php
//connection
require_once ('connection.php');
$db = get_dbconnection();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
</head>
<body>
    <h1>Registration Confirmation</h1>
    <?php
        try {
            $query='SELECT username FROM users WHERE username =:username';
            $stmt = $db->prepare($query);
                        
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            
            $stmt->exeute();
            
            echo '<p> Thank you for your registration,';
            echo '<strong>' . $username . ' .';
            
        }
        
        catch (PDOException $ex){
           echo "Error. Details: $ex";
	       die();
            
        }
    
    
    ?>


</body>
</html>
