<?php
$products = array("Cover Your Assets", "Exploding Kittens", "Factions", "Game of Phones", "Qwixx", "Tenzi");
$prices = array("10.99", "12.99", "9.99", "14.99", "8.99", "16.99");

//create shopping cart and check if array is set (isset). Have you given it a value?
session_start();

//$_SESSION => ()
if (isset($_GET["delete"])) {
    $product_name=$_GET["delete"];
    if (isset($_SESSION["product"])) {
        
        foreach ($_SESSION["product"] as $item) {
            if ($item->name === $product_name) {
                if(($item = array_search($item, $_SESSION["product"])) !==false) {
                    unset($_SESSION["product"][$item]);
                    break;
                }
            }
        }
    }

}

if (isset($_SESSION["product"])) {
    for ($i=0, $i < count($_SESSION["product"]), $i++) {
    //foreach ($_SESSION["product"] as $item) {
       // if(isset($item->name)) {
            
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
        text-decoration: none;
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
       
        <div id="cart_display">
            <div id="name"> <?php echo $products[i]; ?></div>
            <div id="price"> <?php echo $prices[i]; ?></div>
            <a href="cart.php?remove=<?php echo $products[i]; ?>&active=CART">Delete Item</a>
        </div>
<?php
        }
    }
?>
    </body>
</html>