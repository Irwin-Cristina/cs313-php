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
            <h1>Shop for a Game</h1>
            <form method ="post" action="cartresults.php">
                <div class="wrapper">
                    <div class="game">
                        <h2>Cover Your Assets</h2>
                        <img src="images/cover_your_assets.jpg" alt="cover your assets">
                        <p>Family-friendly game enjoyed by kids, teans and adults. Simple to learn and play. Guarenteed family fun and fun for all ages.</p>
                        <input type="submit" name="game[]" value="Add to cart">
                    </div>

                    <div class="game">
                        <h2>Exploding Kittens</h2>
                        <img src="images/exploding_kittens.jpg" alt="expoding kittens">
                        <h2>Cover Your Assets</h2>
                        <p>Exploding Kittens is a card game for people who are into kittens and explosions. Family-friendly, party game for 2-5 players.</p>
                         <input type="submit" name="game[]" value="Add to cart">
                    </div>

                    <div class="game">
                        <h2>Factions</h2>
                        <img src="images/factions.jpg" alt="factions">
                        <p>Prepare to surprise and be surprised about even those you think you know will. Fact-ion is a story-telling game where each player writes one or two sentences about a true life experience.</p>
                        <input type="submit" name="game[]" value="Add to cart">
                    </div>

                    <div class="game">
                        <h2>Game of Phones</h2>
                        <img src="images/game_of_phones.jpg" alt="game of phones">
                        <p>Perfect for those who can't escape their phones! The only requirement is that each player has a smartphone. Teens love this game.</p>
                        <input type="submit" name="game[]" value="Add to cart">
                    </div>

                     <div class="game">
                         <h2>Qwixx</h2>
                        <img src="images/qwixx.jpg" alt="qwixx">
                         <p>Qwixx is a quick-playing dice game in which everyone participates, no matter whose turn it is. </p>
                        <input type="submit" name="game[]" value="Add to cart">
                    </div>

                    <div class="game">
                        <h2>Tenzi</h2>
                        <img src="images/tenzi.jpg" alt="tenzi">
                        <p>Fast and fun Dice game. Fun and educational. Fun for all ages.</p>
                        <input type="submit" name="game[]" value="Add to cart">
                    </div>
                </div>
<!--            <input type="submit" name="submit" id="submitbtn"value="Add to cart">-->
        </form>
            
        </main>
        <footer>
        </footer>
    
    
    
    
    </body>





</html>