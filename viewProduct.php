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
        <title>View Product</title>
        <link rel="stylesheet" type="text/css" href="css/viewProductStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/searchStyle.css" />
        <?php
        if (isset($_GET["pid"])) {
            $productId = $_GET["pid"];
        } else {
            header("Location: ./search_Main.php");
        }
        ?>
    </head>
    <body>
        <?php
        include './header.php';
        ?>


        </br></br></br>
        <?php
        $query = "SELECT * FROM `product` WHERE `product_id` = '" . $productId . "'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()
            ?>

            <div class="viewProduct-area">
                <div class="viewProduct-area-img-area">
                    <img class="viewProduct-area-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                </div>


                <div class="viewProduct-details-aera">

            <!--                    <p class="viewProduct-details-aera-pline">
                                    <span class="viewProduct-details-aera-data"><?php echo $row["product_name"]; ?></span>
                                </p>-->

                    <p class="viewProduct-details-aera-pline">
                        <span class="viewProduct-details-aera-data">
                            <?php
                            $proId = $row["product_id"];
                            $query = "SELECT * FROM `type` WHERE `type_id` = (SELECT `type_type_id` FROM `product` WHERE `product_id` = '" . $proId . "')";
                            $result = $connection->query($query);
                            if ($result->num_rows > 0) {
                                $row1 = $result->fetch_assoc();
                                echo $row1["type_name"];
                            }
                            ?>
                        </span>
                    </p>

                    <p class="viewProduct-details-aera-pline">
                        <span class="viewProduct-details-aera-data">
                            <?php
                            $proId = $row["product_id"];
                            $query = "SELECT * FROM `category` WHERE `category_id` = (SELECT `category_category_id` FROM `product` WHERE `product_id` = '" . $proId . "')";
                            $result = $connection->query($query);
                            if ($result->num_rows > 0) {
                                $row1 = $result->fetch_assoc();
                                echo $row1["category_name"];
                            }
                            ?>
                        </span>
                    </p>

                    <p class="viewProduct-details-aera-pline">
                        <span class="viewProduct-details-aera-data data-description"><?php echo $row["product_description"]; ?></span>
                    </p>

                    <p class="viewProduct-details-aera-pline">
                        <span class="viewProduct-details-aera-data data-sellPrice"><?php echo "LKR " . $row["product_sell_price"] . "/="; ?></span>
                    </p>



                    <div class="viewProduct-details-aera-verticale-line"></div>
                    <a href="buyer_Payment_Methods.php?pid=<?php echo $row["product_id"]; ?>"><input type="button" value="Download" class="viewProduct-details-aera-button button-download"/></a>
                    </br</br></br>
                    <a href="search_Main.php"><input type="button" value="Back" class="viewProduct-details-aera-button button-back"/></a>

                </div>

                <table class="viewProduct-seller-table">
                    <?php
                    $proId = $row["product_id"];
                    $query = "SELECT * FROM `seller` WHERE `seller_id` = (SELECT `seller_seller_id` FROM `product` WHERE `product_id` = '" . $proId . "')";
                    $result = $connection->query($query);
                    if ($result->num_rows > 0) {
                        $row1 = $result->fetch_assoc();
                        ?>
                        <tr>
                            <td><div class="viewProduct-seller-table-ppic-area"><img src="img/<?php echo $row1["seller_ppic"]; ?>" class="viewProduct-seller-table-ppic-img"/></div></td>
                            <td><?php echo "By: " . $row1["seller_name"]; ?></td>
                            <td><?php echo "Bio: " . $row1["seller_bio"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>




            </div>

        <?php } ?>

        </br></br></br>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
