<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include './action/DB_Conn.php';
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
        <title>Image Details Upload Panel</title>
        <link rel="stylesheet" type="text/css" href="css/product_Details_Upload_PanelStyle.css"/>
        <?php
        $uploadProductUrl = "";
        if (isset($_SESSION["uploadProductUrl"])) {
            $uploadProductUrl = $_SESSION["uploadProductUrl"];
        } else {
            header("Location: product_Upload_Panel.php?msgUploaded=Choose a Photo !");
        }
        ?>
    </head>
    <body>
        <div class="productDeUpload-area">

            <a href="product_Upload_Panel.php">
                <img src="img/Close_Cross_Icon.png" class="productDeUpload-area-close-Icon"/>
            </a>

            <p class="productDeUpload-area-title">Upload Image Details</p>

            <div class="productDeUpload-area-leftSide">
                <div class="productDeUpload-product-area">
                    <img src="img/<?php echo $uploadProductUrl; ?>"/>
                </div>
            </div>

            <div class="productDeUpload-area-rightSide">

                <form method="post" action="action/product_Details_Uploader.php">

                    <p class="productDeUpload-area-content">Image Name<span class="productDeUpload-area-content-starMark">*</span><span class="productDeUpload-area-subContent">( Like a search Keyword )</span></p>
                    <input type="text" name="productName" id="productName" class="productDeUpload-area-input"/>

                    <p class="productDeUpload-area-errors">
                        <?php
                        if (isset($_GET["msgName"])) {
                            echo $_GET["msgName"]; // error massage on DOM
                        }
                        ?>
                    </p>

                    <p class="productDeUpload-area-content">Description<span class="productDeUpload-area-content-starMark">*</span></p>
                    <input type="text" name="productDescription" id="productDescription" class="productDeUpload-area-input"/>

                    <p class="productDeUpload-area-errors">
                        <?php
                        if (isset($_GET["msgDescription"])) {
                            echo $_GET["msgDescription"]; // error massage on DOM
                        }
                        ?>
                    </p>

                    <p class="productDeUpload-area-content">Type<span class="productDeUpload-area-content-starMark">*</span></p>
                    <select class="productDeUpload-area-select" name="productType" id="productType">
                        <?php
                        $query = "SELECT * FROM `type`";
                        $result = $connection->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["type_id"]; ?>"><?php echo $row["type_name"]; ?></option>
                            <?php }
                        }
                        ?>
                    </select>

                    <p class="productDeUpload-area-content">Category<span class="productDeUpload-area-content-starMark">*</span></p>
                    <select class="productDeUpload-area-select" name="productCategory" id="productCategory">
                        <?php
                        $query = "SELECT * FROM `category`";
                        $result = $connection->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
                            <?php }
                        }
                        ?>
                    </select>

                    <input type="submit" value="Submit" class="productDeUpload-area-button"/>

                </form>
                <div class="productDeUpload-area-verticale-line"></div>
            </div>

        </div>
    </body>
</html>
