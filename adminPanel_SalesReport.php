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
        <title>Admin Panel Sales Report</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_SalesReportStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_HeaderStyle.css"/>
    </head>
    <body>
        <div class="adminPanel-header">
            <img src="img/Logo.png" class="adminPanel-header-logo"/>
            <span class="adminPanel-header-title">Sales Report</span>
            <a href="adminPanel.php"><button class="adminPanel-header-button">Back To Admin Panel</button></a>
        </div>

        </br></br></br></br>

        <div class="adminPanel-salesReport-area">

            <table class="adminPanel-salesReport-area-table">

                <tr class="adminPanel-salesReport-area-table-content">
                    <td>ID</td>
                    <td>Product</td>
                    <td>Image</td>
                    <td>Buyer</td>
                    <td>Seller</td>                   
                </tr>
                <?php
                $query = "SELECT * FROM `sales`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="adminPanel-salesReport-area-table-data">
                            <td><?php echo $row["sales_id"]; ?></td>

                            <td><?php
                                $query = "SELECT * FROM `product` WHERE `product_id` = (SELECT `product_product_id` FROM `sales` WHERE `sales_id` = '" . $row["sales_id"] . "' ) ";
                                $result1 = $connection->query($query);
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                    echo $row1["product_name"];
                                }
                                ?>
                            </td>

                            <td><?php
                                $query = "SELECT * FROM `product` WHERE `product_id` = (SELECT `product_product_id` FROM `sales` WHERE `sales_id` = '" . $row["sales_id"] . "' ) ";
                                $result1 = $connection->query($query);
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                    ?>
                                    <img src="img/<?php echo $row1["product_img_url"]; ?>" class="adminPanel-salesReport-area-table-img"/>
                                <?php } ?>
                            </td>

                            <td><?php
                                $query = "SELECT * FROM `buyer` WHERE `buyer_id` = (SELECT `buyer_buyer_id` FROM `sales` WHERE `sales_id` = '" . $row["sales_id"] . "' ) ";
                                $result1 = $connection->query($query);
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                    echo $row1["buyer_name"];
                                }
                                ?>
                            </td>

                            <td><?php
                                $query = "SELECT * FROM `seller` WHERE `seller_id` = (SELECT `seller_seller_id` FROM `sales` WHERE `sales_id` = '" . $row["sales_id"] . "' ) ";
                                $result1 = $connection->query($query);
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                    echo $row1["seller_name"];
                                }
                                ?>
                            </td>

                        </tr>
                    <?php }
                }
                ?>

            </table>

        </div>

        </br></br></br></br>

        <?php
        include './footer.php';
        ?>

    </body>
</html>
