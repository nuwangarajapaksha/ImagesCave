<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="css/buyer_RegistrationProfileStyle1.css"/>
        <?php
        if (isset($_GET["msgRegistered"])) {
            echo "<script>alert('" . $_GET["msgRegistered"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <div class="buyerRegUp-area">

            <a href="buyer_Login.php">
                <img src="img/Close_Cross_Icon.png" class="buyerRegUp-area-close-Icon"/>
            </a>

            <p class="buyerRegUp-area-title">Registration</p>

            <form method="post" action="action/buyer_Register.php" class="buyerRegUp-area-form">

                <p class="buyerRegUp-area-content">Name<span>*</span></p>
                <input type="text" name="buyerName" id="buyerName" placeholder="Name" class="buyerRegUp-area-input" />

                <p class="buyerRegUp-area-errors">
                    <?php
                    if (isset($_GET["msgName"])) {
                        echo $_GET["msgName"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="buyerRegUp-area-content">Email<span>*</span></p>
                <input type="email" name="buyerEmail" id="buyerEmail" placeholder="email" class="buyerRegUp-area-input" />

                <p class="buyerRegUp-area-errors">
                    <?php
                    if (isset($_GET["msgEmail"])) {
                        echo $_GET["msgEmail"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="buyerRegUp-area-content">Username<span>*</span></p>
                <input type="text" name="buyerUsername" id="buyerUsername" placeholder="username" class="buyerRegUp-area-input" />

                <p class="buyerRegUp-area-errors">
                    <?php
                    if (isset($_GET["msgUsername"])) {
                        echo $_GET["msgUsername"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="buyerRegUp-area-content">Password<span>*</span></p>
                <input type="password" name="buyerPassword" id="buyerPassword" placeholder="password" class="buyerRegUp-area-input" />

                <p class="buyerRegUp-area-errors">
                    <?php
                    if (isset($_GET["msgPassword"])) {
                        echo $_GET["msgPassword"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="buyerRegUp-area-content">Confirm Password<span>*</span></p>
                <input type="password" name="buyerConfirmPassword" id="buyerConfirmPassword" placeholder="confirm password" class="buyerRegUp-area-input" />

                <p class="buyerRegUp-area-errors">
                    <?php
                    if (isset($_GET["msgConfirmPassword"])) {
                        echo $_GET["msgConfirmPassword"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="buyerRegUp-area-errors existAccount-error">
                    <?php
                    if (isset($_GET["msgexistAccount"])) {
                        echo $_GET["msgexistAccount"]; // error massage on DOM
                    }
                    ?>
                </p>

                <input type="submit" value="Register" class="buyerRegUp-area-button"/>
            </form>

            <div class="buyerRegUp-area-verticale-line"></div>

        </div>
    </body>
</html>
