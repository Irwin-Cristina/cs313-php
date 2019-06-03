<?php
//connecion
require_once ('connection.php');
$db = get_dbconnection();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <main class="registration">
        <h1>Registration</h1>
        <form id="register" method="post" action="add_registration.php">
            <fieldset>
                <legend>User Information</legend>
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Choose a username please" required>
                        
                        <br>
                        
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Choose a password please" required>
                
                    </div>
                        <input type="submit" name="submit" id="regbutton" value="Register">
                        <input type="hidden" name="action" value="register">
            
            
            
            
            </fieldset>
        
        
        
        
        
        
        
        </form>
    
    
    
    
    
    
    
    </main>

</body>
</html>
