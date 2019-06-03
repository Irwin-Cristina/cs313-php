<?php
//connection
require_once ('connection.php');
$db = get_dbconnection();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teach 07</title>
</head>
<body>
    <main class="login">
        <h1>Login</h1>
        <form id="loginform" method="post" action="accounts.php">
            <fieldset>
                <legend>User Account</legend>
                    <div>
                        <label for="username">Name:</label>
                        <input type="text" name="userpassword" id="username" required>
                        
                        <br>
                        
                        <label for="userpassword">Password:</label>
                        <input type="password" name="userpassword" id="userpassword" required>
                     </div>
                
                        <input type="submit" id="loginbutton" value="Login">
                        <input type="hidden" name="submit" value="Login">
                    
            </fieldset>
        </form>
    
    
    </main>

</body>
</html>
