<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include './action/DB_Conn.php';
if (isset($_SESSION["Buyer_is_Login"])) {
    if ($_SESSION["Buyer_is_Login"] != true) {
        header("Location: buyer_Login.php?msgLoginFirst=Login Frist");
        die();
    }
} else {
    header("Location: buyer_Login.php?msgLoginFirst=Login Frist");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Payment</title>
        <link rel="stylesheet" type="text/css" href="css/buyer_Payment_MethodsStyle4.css"/>
        <?php
        $productId = "";
        if (isset($_GET["pid"])) {
            $productId = $_GET["pid"];
        } else {
            header("Location: search_Main.php");
        }
        ?>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="buyerPayment-area">

            <a href="viewProduct.php?pid=<?php echo $productId; ?>">
                <img src="img/Close_Cross_Icon.png" class="buyerPayment-area-close-Icon"/>
            </a>


            <p class="buyerPayment-area-title">Payment Details</p>
            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
                <input type="hidden" name="merchant_id" value="1216544">    <!-- Replace your Merchant ID -->
                <input type="hidden" name="return_url" value="http://localhost/ImagesCave/action/return.php">
                <input type="hidden" name="cancel_url" value="http://localhost/ImagesCave/index.php">
                <input type="hidden" name="notify_url" value="http://sample.com/notify">  
                <?php
                $query = "SELECT * FROM `product` WHERE `product_id` = '" . $productId . "'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>
                    <br>
                    <p class="buyerPayment-area-subTitle">Item Details</p>
                    <input type="text" name="order_id" class="buyerPayment-area-input" value="<?php echo $row["product_id"]; ?>">
                    <input type="text" name="items" class="buyerPayment-area-input" value="<?php echo $row["product_name"]; ?>"><br>
                    <input type="text" name="currency" class="buyerPayment-area-input" value="LKR">
                    <input type="text" name="amount" class="buyerPayment-area-input" value="<?php echo $row["product_sell_price"]; ?>">  
                <?php } ?>

                <?php
                if (isset($_SESSION["activeBuyerId"])) {
                    $activeBuyerId = $_SESSION["activeBuyerId"];
                    $query = "SELECT * FROM `buyer` WHERE `buyer_id` = '" . $activeBuyerId . "'";
                    $result = $connection->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <br><br>
                        <p class="buyerPayment-area-subTitle">Customer Details<span>*</span></p>
                        <input type="text" name="first_name" class="buyerPayment-area-input" value="<?php echo $row["buyer_name"]; ?>">
                        <input type="text" name="last_name" class="buyerPayment-area-input" value="Perera"><br>
                        <input type="text" name="email" class="buyerPayment-area-input" value="<?php echo $row["buyer_email"]; ?>">
                        <input type="text" name="phone" class="buyerPayment-area-input" value="0771234567"><br>
                        <input type="text" name="address" class="buyerPayment-area-input" value="No.1, Galle Road">
                        <input type="text" name="city" class="buyerPayment-area-input" value="Colombo">
                        <input type="hidden" name="country" class="buyerPayment-area-input" value="Sri Lanka"><br><br> 
                        <input type="submit" value="Buy Now" class="buyerPayment-area-button">   
                    </form> 
<!--                    <a href="buyer_Invoice.php?pid=<?php //echo $productId; ?>"><button class="buyerPayment-area-invoice-button">Invoice</button></a>-->

                <?php }
            } ?>

            <div class="buyerPayment-area-verticale-line"></div>
        </div>
    </body>
</html>
