<?php
session_start();
$product = array("Cover Your Assets", "Exploding Kittens", "Factions", "Game of Phones", "Qwixx", "Tenzi");
$price = array("10.99", "12.99", "9.99", "14.99", "8.99", "16.99");

//create shopping cart and check if array is set (isset). Have you given it a value?

//$_SESSION => ()
if (!isset($_SESSION["product"])) {
    $_SESSION["product"] = array();
}
if (!isset($_SESSION["price"])) {
    $_SESSION["price"] = array();
}
//$_SESSION => (array())

//add products to the cart
if (isset($GET["product"]) && isset($_GET["price"])) {
    $product_name = $_GET["product"];
    $price = $_GET["price"];
    $product = new Product($product_name, $price);
    
    if (!in_array($product, $_SESSION["cart"])) {
        array_push($_SESSION["cart"], $product);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Shopping cart Prove Week 3</title>     
</head>
<body>
   <?php 
        for($i=0; $i < count($product); $i++){
    ?>
    <div id="product">
        <div id="product_img"></div>
        <div id="product_name"><?php echo $product[$i]; ?></div>
        <div id="product_price"><?php echo $price[$i]; ?></div>
        <a href ="index.php?product=<?php echo $product[i]; ?>&price=<?php echo $price[$i]; ?>active=HOME">Add to cart</a>
    
    
    </div><br>
<?php
   }
?>
</body>
</html>