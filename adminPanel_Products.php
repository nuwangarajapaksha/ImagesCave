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
        header("Location: ./admin_Login.php");die();
    }
} else {
    header("Location: ./admin_Login.php");die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel Products</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_ProductsStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_HeaderStyle.css"/>
        <?php
        if (isset($_GET["msg"])) {
            echo "<script>alert('" . $_GET['msg'] . "');</script>"; // error massage as alert
        }
        if (isset($_GET["msgUpdate"])) {
            echo "<script>alert('" . $_GET["msgUpdate"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <?php
        ?>

        <div class="adminPanel-header">
            <img src="img/Logo.png" class="adminPanel-header-logo"/>
            <span class="adminPanel-header-title">Pruducts</span>
            <a href="adminPanel.php"><button class="adminPanel-header-button">Back To Admin Panel</button></a>
        </div>

        </br></br></br></br</br></br></br>

        <div class="adminPanel-products-category-area">

            <div class="adminPanel-products-category-area-box box-title" onclick="h1();">Categories</div>

            <div class="dropDown_area" id="dropDown">

                <a href="adminPanel_Products.php">
                    <div class="adminPanel-products-category-area-box box-categories" >All</div>
                </a>
                <?php
                $query = "SELECT * FROM `type`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="adminPanel_Products.php?typeId=<?php echo $row["type_id"]; ?>">
                            <div class="adminPanel-products-category-area-box box-categories" ><?php echo $row["type_name"] . "s"; ?></div>
                        </a>
                    <?php }
                } ?>


                <?php
                $query = "SELECT * FROM `category`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="adminPanel_Products.php?categoryId=<?php echo $row["category_id"]; ?>">
                            <div class="adminPanel-products-category-area-box box-categories" ><?php echo $row["category_name"]; ?></div>
                        </a>
    <?php }
} ?>
                <a href="adminPanel_Products_AddNewCategory.php">
                    <div class="adminPanel-products-category-area-box box-categories" >Add New Category</div>
                </a>
            </div>

        </div>



        <div class="adminPanel-products-area">

            <?php
            $keywordType = "";
            $keywordCategory = "";
            if (isset($_GET["typeId"])) {
                $keywordType = $_GET["typeId"];
                $query = "SELECT * FROM `product` WHERE `type_type_id` = '" . $keywordType . "' AND `product_buy_price` != 0 AND `product_sell_price` != 0 ";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="adminPanel_ProductReport.php?pid=<?php echo $row["product_id"]; ?>">
                            <div class="adminPanel-products-area-product">
                                <img class="adminPanel-products-area-product-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                            </div>
                        </a>
                        <?php
                    }
                }
            } elseif (isset($_GET["categoryId"])) {
                $keywordCategory = $_GET["categoryId"];
                $query = "SELECT * FROM `product` WHERE `category_category_id`= '" . $keywordCategory . "' AND `product_buy_price` != 0 AND `product_sell_price` != 0 ";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="adminPanel_ProductReport.php?pid=<?php echo $row["product_id"]; ?>">
                            <div class="adminPanel-products-area-product">
                                <img class="adminPanel-products-area-product-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                            </div>
                        </a>
                        <?php
                    }
                }
            } else {
                $query = "SELECT * FROM `product`WHERE `product_buy_price` != 0 AND `product_sell_price` != 0 ";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="adminPanel_ProductReport.php?pid=<?php echo $row["product_id"]; ?>">
                            <div class="adminPanel-products-area-product">
                                <img class="adminPanel-products-area-product-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                            </div>
                        </a>

            <?php
        }
    }
}
?>


        </div>


        </br></br></br>

<?php
include './footer.php';
?>

        <script type="text/javascript" src="script.js"></script>

    </body>
</html>
