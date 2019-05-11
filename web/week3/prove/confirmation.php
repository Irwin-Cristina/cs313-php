<?php
    session_start();

    $games = array();
    $prices = array();

    
    echo "<h1>Transaction Complete</h1><br>";
    
    $purchased = array();
    if(isset($_SESSION["product"])) {
        $purchased = $_SESSION["product"];
        unset($_SESSION["cart"]);
    }

    echo "<h2>Items Purchased</h2>";
    //foreach ($purchased as $item) {
    for ($i=0; $i < count($_SESSION["product"]); $i++) {
    //for($i=0; $i < count($games); $i++){
?>
    <div id="confirmed_items">
        <div id="item"> <?php echo ($_SESSION["product"][$i]);?></div>

        

        <br><br>

    </div><br>
<?php
    }
    
    if (isset($_SESSION["total"])) {
        $total = $_SESSION["total"];
        echo "<div id='total'> Total: $ $total</div><br>";
    }

?>
    <div>Name and Address</div>
    <div id ="address">
        <div id="name">
            <?php
                if (isset($_POST["firstname"]) && isset($_POST["lastname"])) {
                    echo strip_tags ($_POST["firstname"]) . " " .strip_tags ($_POST["lastname"]);
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