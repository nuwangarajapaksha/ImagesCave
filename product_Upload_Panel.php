<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION["Seller_is_Login"])) {
    if ($_SESSION["Seller_is_Login"] != true) {
        header("Location: seller_Login.php");
        die();
    }
} else {
    header("Location: seller_Login.php");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Image Upload Panel</title>
        <link rel="stylesheet" type="text/css" href="css/product_Upload_PanelStyle.css"/>
        <?php
        if (isset($_GET["msgUploaded"])) {
            echo "<script>alert('" . $_GET["msgUploaded"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <div class="productUpload-area">

            <a href="contributor_Dashboard.php">
                <img src="img/Close_Cross_Icon.png" class="productUpload-area-close-Icon"/>
            </a>

            <p class="productUpload-area-title">Upload Image</p>

            <form method="post" action="action/product_Uploader.php" enctype="multipart/form-data">

                <p class="productUpload-area-content">Select Image</p>
                <input type="file" name="uploadProduct" id="uploadProduct" class="productUpload-area-input"/>

                <p class="productUpload-area-errors">
                    <?php
                    if (isset($_GET["msgSelect"])) {
                        echo $_GET["msgSelect"]; // error massage on DOM
                    }
                    ?>
                </p>

                <input type="submit" value="Upload" class="productUpload-area-button">

            </form>
            <div class="productUpload-area-verticale-line"></div>
        </div>
    </body>
</html>
