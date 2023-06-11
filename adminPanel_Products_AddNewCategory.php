<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
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
        <title>Add New Category</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanel_Products_AddNewCategoryStyle.css">
        <?php
        if (isset($_GET["msgAdd"])) {
            echo "<script>alert('" . $_GET["msgAdd"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <div class="addNewCategoryName-area">

            <a href="adminPanel_Products.php">
                <img src="img/Close_Cross_Icon.png" class="addNewCategoryName-area-close-Icon"/>
            </a>

            <p class="addNewCategoryName-area-title">Add New Category</p>

            <form method="post" action="action/adminPanel_Products_NewCategoryAdder.php">

                <p class="addNewCategoryName-area-content">Add New Category Name</p>
                <input type="text" name="addNewCategoryName" id="addNewCategoryName" class="addNewCategoryName-area-input"/>

                <p class="addNewCategoryName-area-errors">
                    <?php
                    if (isset($_GET["msgSelect"])) {
                        echo $_GET["msgSelect"]; // error massage on DOM
                    }
                    ?>
                </p>

                <input type="submit" value="Add" class="addNewCategoryName-area-button">

            </form>
            <div class="addNewCategoryName-area-verticale-line"></div>
        </div>
    </body>
</html>
