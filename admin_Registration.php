<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Admin</title>
        <link rel="stylesheet" type="text/css" href="css/admin_RegistrationStyle.css"/>
        <?php
        if (isset($_GET["msgRegistered"])) {
            echo "<script>alert('" . $_GET["msgRegistered"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
       <div class="adminReg-area">

            <a href="adminPanel_Admins.php">
                <img src="img/Close_Cross_Icon.png" class="adminReg-area-close-Icon"/>
            </a>

            <p class="adminReg-area-title">Registration</p>

            <form method="post" action="action/admin_Register.php" class="adminReg-area-form">

                <p class="adminReg-area-content">Name<span>*</span></p>
                <input type="text" name="adminName" id="adminName" placeholder="Name" class="adminReg-area-input" />

                <p class="adminReg-area-errors">
                    <?php
                    if (isset($_GET["msgName"])) {
                        echo $_GET["msgName"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="adminReg-area-content">Email<span>*</span></p>
                <input type="email" name="adminEmail" id="adminEmail" placeholder="email" class="adminReg-area-input" />

                <p class="adminReg-area-errors">
                    <?php
                    if (isset($_GET["msgEmail"])) {
                        echo $_GET["msgEmail"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="adminReg-area-content">Username<span>*</span></p>
                <input type="text" name="adminUsername" id="adminUsername" placeholder="username" class="adminReg-area-input" />

                <p class="adminReg-area-errors">
                    <?php
                    if (isset($_GET["msgUsername"])) {
                        echo $_GET["msgUsername"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="adminReg-area-content">Password<span>*</span></p>
                <input type="password" name="adminPassword" id="adminPassword" placeholder="password" class="adminReg-area-input" />

                <p class="adminReg-area-errors">
                    <?php
                    if (isset($_GET["msgPassword"])) {
                        echo $_GET["msgPassword"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="adminReg-area-content">Confirm Password<span>*</span></p>
                <input type="password" name="adminConfirmPassword" id="adminConfirmPassword" placeholder="confirm password" class="adminReg-area-input" />

                <p class="adminReg-area-errors">
                    <?php
                    if (isset($_GET["msgConfirmPassword"])) {
                        echo $_GET["msgConfirmPassword"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="adminReg-area-errors existAccount-error">
                    <?php
                    if (isset($_GET["msgexistAccount"])) {
                        echo $_GET["msgexistAccount"]; // error massage on DOM
                    }
                    ?>
                </p>

                <input type="submit" value="Register" class="adminReg-area-button"/>
            </form>

            <div class="adminReg-area-verticale-line"></div>

        </div>
    </body>
</html>
