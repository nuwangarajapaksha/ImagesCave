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
        <title>Seller Report</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_SellerReportStyle.css"/>
        <?php
        $sellerId = "";
        if (isset($_GET["id"])) {
            $sellerId = $_GET["id"];
        } else {
            header("Location: ./adminPanel_ProductReport.php");
        }
        ?>
    </head>
    <body>
        <?php
        $query = "SELECT * FROM `seller` WHERE `seller_id` = '" . $sellerId . "'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="sellerReprot-area">
                <center><img src="img/Logo.png" class="sellerReprot-area-logo"/></center>
                <p class="sellerReprot-area-title">Seller Report</p>

                <div class="sellerReprot-area-ppic-area">
                    <img class="sellerReprot-area-ppic" src="img/<?php echo $row["seller_ppic"]; ?>"/>
                </div>


                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Id : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_id"]; ?></span>
                </p>

                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Name : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_name"]; ?></span>
                </p>

                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Username : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_username"]; ?></span>
                </p>

                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Email : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_email"]; ?></span>
                </p>

                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Birthday : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_birthday"]; ?></span>
                </p>

                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Address : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_address"]; ?></span>
                </p>

                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Country : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_country"]; ?></span>
                </p>

                <p class="sellerReprot-area-pline">
                    <span class="sellerReprot-area-content">Bio : </span>
                    <span class="sellerReprot-area-data"><?php echo $row["seller_bio"]; ?></span>
                </p>
                <div class="sellerReprot-area-verticale-line"></div>
                <!--<a href="removeSeller.php?id=<?php echo $row["seller_id"]; ?>"><input type="button" value="Remove" class="sellerReprot-area-button button-remove"/></a>-->
                <a href="adminPanel_Products.php"><input type="button" value="Back" class="sellerReprot-area-button button-back"/></a>

            </div>

        <?php } ?>
    </body>
</html>
