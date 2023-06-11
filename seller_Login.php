<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION["Seller_is_Login"])) {
    if ($_SESSION["Seller_is_Login"] == true) {
        header("Location: contributor_Dashboard.php");
        die();
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contributor Login</title>
        <link rel="stylesheet" type="text/css" href="css/buyer_seller_LoginStyle.css"/>
        <?php
        if (isset($_GET["msgRegistered"])) {
            echo "<script>alert('" . $_GET["msgRegistered"] . "');</script>"; // error massage as alert
        } elseif (isset($_GET["msgLoginFirst"])) {
            echo "<script>alert('" . $_GET["msgLoginFirst"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>

        <div class="bsLogin-area">

            <a href="index.php">
                <img src="img/Close_Cross_Icon.png" class="bsLogin-area-close-Icon"/>
            </a>

            <p class="bsLogin-area-title">Log in</p>

            <form method="post" action="action/check_Seller_Login.php">

                <p class="bsLogin-area-content">Username</p>
                <input type="text" name="sellerEmailUsername" id="sellerEmailUsername" placeholder="email or username" class="bsLogin-area-input"/>

                <p class="bsLogin-area-errors">
                    <?php
                    if (isset($_GET["msgUsername"])) {
                        echo $_GET["msgUsername"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="bsLogin-area-content">Password</p>
                <input type="password" name="sellerPassword" id="sellerPassword" placeholder="password" class="bsLogin-area-input"/>

                <p class="bsLogin-area-errors">
                    <?php
                    if (isset($_GET["msgPassword"])) {
                        echo $_GET["msgPassword"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="bsLogin-area-errors incorrect-error">
                    <?php
                    if (isset($_GET["msgIncorrect"])) {
                        echo $_GET["msgIncorrect"]; // error massage on DOM
                    }
                    ?>
                </p>

                <input type="submit" value="Login" class="bsLogin-are-button"/>

            </form>

            <p class="bsLogin-area-createNewAccount">Haven't existing account ? <a href="seller_Registration.php">Create New Account</a></p>
            <div class="bsLogin-area-verticale-line"></div>

        </div>

    </body>
</html>
