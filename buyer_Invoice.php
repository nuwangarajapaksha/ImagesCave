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
        header("Location: buyer_Login.php");
        die();
    }
} else {
    header("Location: buyer_Login.php");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Buyer Invoice</title>
        <link rel="stylesheet" type="text/css" href="css/buyer_InvoiceStyle.css"/>
        <?php
        $productId = "";
        if (isset($_GET["pid"])) {
            $productId = $_GET["pid"];
        } else {
            header("Location: index.php");
            die();
        }
        ?>
    </head>
    <body>
        <div class="buyerInvoice-area">
            <div class="buyerInvoice-area-header">
                </br>
                <a href="index.php"><img src="img/Logo.png" class="buyerInvoice-area-header-logo"/></a>
                </br></br></br>
                <p class="buyerInvoice-area-header-title">Invoice</p>
            </div>

            <br><br></br></br>

            <div class="buyerInvoice-area-details-area">

                <?php
                if (isset($_SESSION["activeBuyerId"])) {
                    $activeBuyerId = $_SESSION["activeBuyerId"];
                    $query = "SELECT * FROM `buyer` WHERE `buyer_id` = '" . $activeBuyerId . "'";
                    $result = $connection->query($query);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <table class="buyerInvoice-area-buyerTable">
                            <tr>
                                <td class="buyerInvoice-area-buyerTable-content">Customer ID </td>
                                <td class="buyerInvoice-area-buyerTable-content">:</td>
                                <td class="buyerInvoice-area-buyerTable-data"><?php echo $row["buyer_id"]; ?></td>
                            </tr>
                            <tr>
                                <td class="buyerInvoice-area-buyerTable-content">Customer Username </td>
                                <td class="buyerInvoice-area-buyerTable-content">:</td>
                                <td class="buyerInvoice-area-buyerTable-data"><?php echo $row["buyer_username"]; ?></td>
                            </tr>
                            <tr>
                                <td class="buyerInvoice-area-buyerTable-content">Customer Name </td>
                                <td class="buyerInvoice-area-buyerTable-content">:</td>
                                <td class="buyerInvoice-area-buyerTable-data"><?php echo $row["buyer_name"]; ?></td>
                            </tr>
                            <tr>
                                <td class="buyerInvoice-area-buyerTable-content">Customer Email </td>
                                <td class="buyerInvoice-area-buyerTable-content">:</td>
                                <td class="buyerInvoice-area-buyerTable-data"><?php echo $row["buyer_email"]; ?></td>
                            </tr>
                        </table>
                        <?php
                    }
                }
                ?>



                <table class="buyerInvoice-area-productTable">
                    <tr class="buyerInvoice-area-productTable-content">
                        <td>Image ID</td>     
                        <td>Image Name</td> 
                        <td>Image Type</td> 
                        <td>Seller Name</td> 
                        <td>Image Price</td>

                    </tr>
                    <?php
                    $query = "SELECT * FROM `product` WHERE `product_id` = '" . $productId . "'";
                    $result = $connection->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr class="buyerInvoice-area-productTable-data">
                                <td ><?php echo $row["product_id"]; ?></td>      

                                <td><?php echo $row["product_name"]; ?></td>

                                <td>
                                    <?php
                                    $query1 = "SELECT * FROM `type` WHERE `type_id` = (SELECT `type_type_id` FROM `product` WHERE `product_id` = '" . $productId . "')";
                                    $result1 = $connection->query($query1);
                                    if ($result1->num_rows > 0) {
                                        $row1 = $result1->fetch_assoc();
                                        echo $row1["type_name"];
                                    }
                                    ?></td>

                                <td>
                                    <?php
                                    $query1 = "SELECT * FROM `seller` WHERE `seller_id` = (SELECT `seller_seller_id` FROM `product` WHERE `product_id` = '" . $productId . "')";
                                    $result1 = $connection->query($query1);
                                    if ($result1->num_rows > 0) {
                                        $row1 = $result1->fetch_assoc();
                                        echo $row1["seller_name"];
                                    }
                                    ?></td>

                                <td><?php echo "LKR " . $row["product_sell_price"] . "/=";
                            $price = $row["product_sell_price"];
                                    ?></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="3" class="buyerInvoice-area-productTable-total">Total</td>
                        <td class="buyerInvoice-area-productTable-colenMark">:</td>
                        <td class="buyerInvoice-area-productTable-price" ><?php echo "LKR " . $price . "/="; ?></td>
                    </tr>


                </table>


                <button onclick="window.print()" class="buyerInvoice-area-printButton">Print</button>
            </div>

            </br></br>

            <div class="buyerInvoice-area-footer">
                <dl class="buyerInvoice-area-footer-contacts">
                    <dt class="buyerInvoice-area-footer-contacts-title">Email : </dt>
                    <dd class="buyerInvoice-area-footer-contact-Information"><a href="#">imagecave@gmail.com</a></dd>
                </dl>
                <dl class="buyerInvoice-area-footer-contacts">
                    <dt class="buyerInvoice-area-footer-contacts-title">Mobile : </dt>
                    <dd class="buyerInvoice-area-footer-contact-Information">077 555 1986</dd>
                    <dd class="buyerInvoice-area-footer-contact-Information">071 222 3333</dd>
                </dl>
            </div>

        </div>
    </body>
</html>
