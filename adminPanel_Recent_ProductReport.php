<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include './action/DB_Conn.php';
if (isset($_SESSION["Admin_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Admin_is_Login"] != true) {//logged in
        header("Location: ./admin_Login.php");
        die();
    }
} else {
    header("Location: ./admin_Login.php");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product Report</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_ProductReportStyle.css"/>
        <?php
        if (isset($_GET["msgUpdate"])) {
            echo "<script>alert('" . $_GET["msgUpdate"] . "');</script>"; // error massage as alert
        }
        $productId = "";
        if (isset($_GET["pid"])) {
            $productId = $_GET["pid"];
            $_SESSION["productIDPass"] = $productId;
        } else {
            $productId = $_SESSION["productIDPass"];
        }
        ?>
    </head>
    <body>
        <?php
        $query = "SELECT * FROM `product` WHERE `product_id` = '" . $productId . "'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <div class="productReport-area">
                <center><img src="img/Logo.png" class="productReport-area-logo"/></center>
                <p class="productReport-area-title">Product Report</p>
                <div class="productReport-area-img-area">
                    <img class="productReport-area-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                </div>

                <div class="productReport-details-aera">

                    <form method="post" action="action/adminpanel_Recent_Product_Details_Updater.php">

                        <table class="productReport-area-table">

                            <tr>
                                <td class="productReport-area-table-content">Id</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data"><?php echo $row["product_id"]; ?></td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Image URL</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data"><?php echo $row["product_img_url"]; ?></td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Name</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data">
                                    <input type="text" name="productName" id="productName" value="<?php echo $row["product_name"]; ?>" class="productReport-area-table-input"/>
                                </td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Type</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data">
                                    <?php
                                    $proId = $row["product_id"];
                                    $query = "SELECT * FROM `type` WHERE `type_id` = (SELECT `type_type_id` FROM `product` WHERE `product_id` = '" . $proId . "')";
                                    $result = $connection->query($query);
                                    if ($result->num_rows > 0) {
                                        $row1 = $result->fetch_assoc();
                                        echo $row1["type_name"];
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Category</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data">
                                    <?php
                                    $proId = $row["product_id"];
                                    $query = "SELECT * FROM `category` WHERE `category_id` = (SELECT `category_category_id` FROM `product` WHERE `product_id` = '" . $proId . "')";
                                    $result = $connection->query($query);
                                    if ($result->num_rows > 0) {
                                        $row1 = $result->fetch_assoc();
                                        echo $row1["category_name"];
                                    }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Description</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data"><?php echo $row["product_description"]; ?></td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Buy Price</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data">
                                    <input type="text" name="productBuyPrice" id="productBuyPrice" value="<?php echo $row["product_buy_price"]; ?>" class="productReport-area-table-input"/>
                                </td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Sell Price</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data">
                                    <input type="text" name="productSellPrice" id="productSellPrice" value="<?php echo $row["product_sell_price"]; ?>" class="productReport-area-table-input"/>
                                </td>
                            </tr>

                            <tr>
                                <td class="productReport-area-table-content">Seller</td>
                                <td class="productReport-area-table-content">:</td>
                                <td class="productReport-area-table-data">
                                    <?php
                                    $proId = $row["product_id"];
                                    $query = "SELECT * FROM `seller` WHERE `seller_id` = (SELECT `seller_seller_id` FROM `product` WHERE `product_id` = '" . $proId . "')";
                                    $result = $connection->query($query);
                                    if ($result->num_rows > 0) {
                                        $row1 = $result->fetch_assoc();
                                        ?>
                                        <a href="adminPanel_Product_SellerReport.php?id=<?php echo $row1["seller_id"]; ?>"><?php echo $row1["seller_name"]; ?></a>
                                    <?php } ?>
                                </td>
                            </tr>

                        </table>

                        <input type="submit" value="Save" class="productReport-details-aera-button button-save"/>

                    </form>

                    <div class="productReport-details-aera-verticale-line"></div>

                    <a href="action/remove_Recent_Product.php?id=<?php echo $row["product_id"]; ?>"><input type="button" value="Remove" class="productReport-details-aera-button button-remove"/></a>
                    <a href="adminPanel_Recent_Products.php"><input type="button" value="Back" class="productReport-details-aera-button button-back"/></a>

                </div>
            </div>

        <?php } ?>
    </body>
</html>
