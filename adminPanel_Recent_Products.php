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
        <title>Admin Panel Recent Products</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_HeaderStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_Recent_ProductsStyle1.css"/>
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
        <div class="adminPanel-header">
            <img src="img/Logo.png" class="adminPanel-header-logo"/>
            <span class="adminPanel-header-title">Recent Pruducts</span>
            <a href="adminPanel.php"><button class="adminPanel-header-button">Back To Admin Panel</button></a>
        </div>

        </br></br></br></br</br></br>

        <div class="adminPanel-RecentProducts-area">
            <?php
            $query = "SELECT * FROM `product` WHERE `product_buy_price` = '0' OR `product_sell_price` = '0'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <a href="adminPanel_Recent_ProductReport.php?pid=<?php echo $row["product_id"]; ?>">
                        <div class="adminPanel-RecentProducts-area-product">
                            <img class="adminPanel-RecentProducts-area-product-img" src="img/<?php echo $row["product_img_url"]; ?>"/>
                        </div>
                    </a>

                    <?php }
            } else {
                ?>
            <p class="adminPanel-RecentProducts-NotFound-header">No,More Resent Products</p>
           <?php } ?>



        </div>
        </br></br></br>

        <?php
        include './footer.php';
        ?>
    </body>
</html>
