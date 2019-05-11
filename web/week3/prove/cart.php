<?php
    $games = array();
    $prices = array();

    //create shopping cart and check if array is set (isset). Have you given it a value?
    session_start();

    $active = "";
    if (isset($_GET["active"])) {
        $active = $_GET["active"];
    }


    //$_SESSION => ()
    if (isset($_SESSION["product"])) {
        $games= $_SESSION["product"]; 
    }
    if (isset($_SESSION["price"])) {
        $prices= $_SESSION["price"]; 
    }

    if (isset($_GET["delete"])) {
        //$product_name=$_GET["delete"];
        $games=$_GET["delete"];
        
       if (isset($_SESSION["product"])) {
         //if (isset($_SESSION["product"]) && isset($_SESSION["price"])) {
           
            foreach ($_SESSION["product"] as $item) {
              for ($i=0; $i < count($_SESSION["product"]); $i++) {
                
               //if ($item->name === $product_name) {
                    //if(($item = array_search($item, $_SESSION["product"])) !==false) {
                   
                    if(($_SESSION["product"]) !==false) {
                        //unset($_SESSION["product"][$item]);
                        unset($_SESSION["product"]);
                        break;
                    }
                }
            }
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
<?php
    if (isset($_SESSION["product"])) {
    for ($i=0; $i < count($_SESSION["product"]); $i++) {
    //foreach ($_SESSION["product"] as $item) {
       // if(isset($item->name)) {
?>
        <div id="cart_display">
            <div id="name"> <?php echo $games[$i]; ?></div>
            <div id="price"> <?php echo $prices[$i]; ?></div>
            <a href="cart.php?delete=<?php echo $games[$i]; ?>&active=CART">Delete Item</a>
        </div>
        <br>
<?php
        }
    }
?>
    </body>
</html>