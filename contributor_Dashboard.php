<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './action/DB_Conn.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contributor Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/contributor_DashboardStyle12.css"/>
        <?php
//        session_start();
//        if (isset($_SESSION["sellerIDPass"])) {
//            $activeSellerId = $_SESSION["sellerIDPass"];
//        }
        if (isset($_GET["msgUpdate"])) {
            echo "<script>alert('" . $_GET["msgUpdate"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <?php
        include './contributor_Header.php';
        ?>
        </br></br></br></br></br>

        <div class="productUpload-area">

            <div class="productUpload-area-background">
                <a href="product_Upload_Panel.php"><button class="productUpload-area-button">upload Image</button></a>
                <p class="productUpload-area-text">Upload your Image and Get Value for it</p>
            </div>
        </div>


        <div class="earning-area">
            <span class="earning-area-content">Earnings : </span>
            <span class="earning-area-payment">LKR 500</span>

        </div>

        </br>

        <div class="products-area">
            <p class="products-area-title">Your Images</p>
            <?php
            $query = "SELECT * FROM `product` WHERE `seller_seller_id` = '" . $activeSellerId . "'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>

                    <div class="products-area-product">
                        <img class="products-area-product-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                    </div>


                <?php }
            }
            ?>
        </div>
        </br>


        <div class="products-area">
            <p class="products-area-title">Recent Selling Images</p>
            <table class="products-area-table">

                <tr class="products-area-table-content">
                    <td>Image</td>
                    <td>Buyer</td>                   
                </tr>
                <?php
                $query = "SELECT * FROM `sales` WHERE `seller_seller_id` = '" . $activeSellerId . "'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <tr class="products-area-table-data">

                            <td>
                                <?php
                                $query = "SELECT * FROM `product` WHERE `product_id` = (SELECT `product_product_id` FROM `sales` WHERE `sales_id` = '" . $row["sales_id"] . "' ) ";
                                $result1 = $connection->query($query);
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                }
                                ?>
                                <img src="img/<?php echo $row1["product_img_url"]; ?>" class="products-area-table-img"/>
                            </td>

                            <td>
                                <?php
                                $query = "SELECT * FROM `buyer` WHERE `buyer_id` = (SELECT `buyer_buyer_id` FROM `sales` WHERE `sales_id` = '" . $row["sales_id"] . "' ) ";
                                $result1 = $connection->query($query);
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                    echo $row1["buyer_name"];
                                }
                                ?>
                            </td>

                        </tr>
                    <?php }
                }
                ?>

            </table>
        </div>





        </br></br></br>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
