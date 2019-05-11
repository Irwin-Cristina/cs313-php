<?php
    $products = array();
    $prices = array();

    session_start();
    
    echo "<h1>Transaction Complete</h1><br>";
    
    $purchased = array();
    if(isset($_SESSION["product"])) {
        $purchased = $_SESSION["product"];
        unset($_SESSION["cart"]);
    }

    echo "<h2>Items Purchased</h2>";
    //foreach ($purchased as $item) {
    for ($i=0; $i < count($_SESSION["product"]); $i++) {
?>
    <div id="confirmed_items">
        <div id="item"><?php echo $products[$i] ." ". $prices[$i];?></div>
        <br><br>

    </div><br>
<?php
    }
    
    if (isset($_SESSION["total"])) {
        $total = $_SESSION["total"];
        echo "<div id='total'> Total: $ $total</div><br>";
    }

?>
    <div>Address</div>
    <div id ="address">
        <div id="name">
            <?php
                if (isset($_POST["first-name"]) && isset($_POST["last_name"])) {
                    echo strip_tags ($_POST["first_name"]) . " " .strip_tags ($_POST["last_name"]);
                }
            ?>
        </div>
        <div id="street">
            <?php
                if (isset($_POST["street"])) {
                    echo strip_tags ($_POST["street"]);
                }
            ?>
        
        </div>
        <div id="city_state">
            <?php
                if (isset($_POST["city"]) && isset($_POST["state"])) {
                    echo strip_tags ($_POST["city"]) . " " .strip_tags ($_POST["state"]);
                }
            ?>
        
        </div>
</div>