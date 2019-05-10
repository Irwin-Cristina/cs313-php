<?php
session_start();
$products = array("Cover Your Assets", "Exploding Kittens", "Factions", "Game of Phones", "Qwixx", "Tenzi");
$prices = array("10.99", "12.99", "9.99", "14.99", "8.99", "16.99");

//create shopping cart and check if array is set (isset). Have you given it a value?

//$_SESSION => ()
if (!isset($_SESSION["product"])) {
    $_SESSION["product"] = array();
}
//$_SESSION => (array())

//$_SESSION => ()
if (!isset($_SESSION["price"])) {
    $_SESSION["price"] = array();
}
//$_SESSION => (array())

//add products to the cart
if (isset($GET["product"]) && isset($_GET["price"])) {
    $product_name = $_GET["product"]; //$product_name ="Cover your Assets"
    $price = $_GET["price"]; //$price = "10.99"
    $product = new Product($product_name, $price); 
    
    if (!in_array($product, $_SESSION["product"])) { 
        array_push($_SESSION["product"], $product); //$_SESSION =>(array(cover your assets))
    }
     if (!in_array($product, $_SESSION["price"])) { 
        array_push($_SESSION["price"], $product); //$_SESSION =>(array(10.99))   
    }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Shopping cart Prove Week 3</title>     
</head>
<style>
    #active_link {
        color:chartreuse;
        text-decoration: none;
    }
    #non_active_link {
        color: coral;
    }
    
</style>
<body>
    <header>
        <?php
        $active = "";
        if (isset($_GET["active"])) {
            $active = $_GET["active"];
        }
        ?>
        <div id='nav'>
            <a href='index.php?active=HOME' id="<?php echo ($active==="HOME" ? "active_link" : "non_active_link") ?>">HOME</a>
            <a href='cart.php?active=CART' id="<?php echo ($active==="CART" ? "active_link" : "non_active_link") ?>">CART</a>
            <a href='index.php?active=CHECKOUT' id="<?php echo ($active==="CHECKOUT" ? "active_link" : "non_active_link") ?>">CHECKOUT</a>
        </div>
    </header>
   <?php 
        for($i=0; $i < count($products); $i++){
    ?>
    <div id="product">
        <div id="product_img"></div>
        <div id="product_name"><?php echo $products[$i]; ?></div>
        <div id="product_price"><?php echo $prices[$i]; ?></div>
        <a href ="index.php?product=<?php echo $products[$i]; ?>&price=<?php echo $prices[$i]; ?>&active=HOME">Add to cart</a>
    
    
    </div><br>
<?php
   }
?>
</body>
</html>