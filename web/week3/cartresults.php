<?php
//Start the session
session_start();

if(isset($_POST["game"])) {
    $_SESSION["game"] =$_POST["game"];
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Games for Sale</title>
        <meta charset="utf-8"/>
        <link type="text/css" rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="images/logo.jpg" alt="Games 4 Sale logo">
            </div>
            <nav id="mainnav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Cart</a></li>
                   <li><a href="#">Checkout</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h1>Shopping Cart</h1>
            <h2>Items in your shopping cart:</h2> 
            <p><?php if(!empty($_POST["game"])) {
                foreach($_POST["game"] as $game) {
                echo $game . "<br>";
                    }
                }?>
            </p>
        </main> 
    </body>

</html>