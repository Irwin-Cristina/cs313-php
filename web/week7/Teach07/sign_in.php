<?php
session_start();

$badLogin = false;

//Check to see if there are any POST variables, if not, continue.

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    //submitted a username and password for us to check
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    //connection
    require_once ('connection.php');
    $db = get_dbconnection();
    
    $query='SELECT username FROM users WHERE username =:username';
    $stmt = $db->prepare($query);
    //$stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username);
    
    $result = $stmt->execute();
    
    if ($result){
        
        $row = $stmt->fetch();
        $hashedpasswordDB = $row['password'];
        
        //now check to see if the hashed password matches
        if(password_verify($password, $hashedpasswordDB )) {
            //password correct, put the user on the session and redirect to homepage.
            $_SESSION['username'] = $username;
            header("Location:homepage.php");
            die();
        }
        else 
        {
        $badLogin = true;
        } 
    }
    else {
        $badLogin =true;
    }
}
    
    

?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
</head>
<body>
    <?php
    if($badLogin) {
        echo "Incorrect username or password!<br><br>\n";
    }
    
    ?>
    
    <h1>Please Log in below:</h1>
    <form id="login" method="POST" action="sign_in.php">
        <fieldset>
            <legend>Sign In</legend>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
                        
                <br>
                        
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
                
            </div>
                <input type="submit" name="submit" id="regbutton" value="Log In">
        
        </fieldset>

    </form>
    
    Or <a href="registration.php">Register</a> for a new account.


</body>
</html>
