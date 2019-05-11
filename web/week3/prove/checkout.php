<?php
    //$games = array("Cover Your Assets", "Exploding Kittens", "Factions", "Game of Phones", "Qwixx", "Tenzi");
    //$prices = array("10.99", "12.99", "9.99", "14.99", "8.99", "16.99");
    $games = array();
    $prices = array();

    session_start();

    $active = "";
    if (isset($_GET["active"])) {
        $active = $_GET["active"];
    }
    

    $total=0.0;
    if (isset($_SESSION["product"])) {
        for ($i=0; $i <count($_SESSION["product"]); $i++) {
            
            $prices = floatval($prices[$i]);
            $total = $prices;
        }
    }

    echo "<p>Total: " . $total . "</p";
    $_SESSION["total"] = $total;
?>

<!DOCTYPE html>
<html>
<head>
   <title>Checkout</title>     
</head>
<style>
    #active_link {
        font-size: 2em;
        color:green;
        text-decoration: none;
    }
    #non_active_link {
        font-size: 2em;
        color: orangered;
        text-decoration: none;
    }
    
</style>
<body>
    <header>
        
        <div id='nav'>
            <a href='index.php?active=HOME' id="<?php echo ($active==="HOME" ? "active_link" : "non_active_link") ?>">HOME</a>
            <a href='cart.php?active=CART' id="<?php echo ($active==="CART" ? "active_link" : "non_active_link") ?>">CART</a>
             <a href='checkout.php?active=CHECKOUT' id="<?php echo ($active==="CHECKOUT" ? "active_link" : "non_active_link") ?>">CHECKOUT</a>
        </div>
    </header>     
       
    <form method="post" action="confirmation.php" name="checkout">
            First Name: <input type="text" name="firstname"><br>
            Last Name: <input type="text" name="lastname"><br>
            Street Name: <input type="text" name="street"><br>
            City: <input type="text" name="city"><br>
            State: <input type="text" name="state"><br>
            <button>Submit Transaction</button>
        </form>
    </body>
</html>
    