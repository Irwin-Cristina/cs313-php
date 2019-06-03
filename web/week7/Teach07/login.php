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
                        <input type="text" name="userpassword" id="username" required pattern="">
                        
                        <label for="userpassword">Password:</label>
                        <input type="password" name="userpassword" id="userpassword" required pattern="">
                        
                        <input type="submit" id="loginbutton" value="Login">
                        <input type="hidden" name="action" value="Login">
                    </div>
            </fieldset>
        </form>
    
    
    </main>

</body>
</html>
