<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Checker</title>
        <link rel="stylesheet" type="text/css" href="css/admin_LoginStyle.css"/>
    </head>
    <body>
        <div class="adminlogin-area">

            <a href="adminPanel_Admins.php">
                <img src="img/Close_Cross_Icon.png" class="adminlogin-area-close-Icon"/>
            </a>

            <p class="adminlogin-area-title">permissions</p>

            <form method="post" action="action/register_Admin_CheckerAction.php">
                


                <p class="adminlogin-area-content">Username</p>
                <input type="text" name="adminUsername" id="adminUsername" placeholder="username" class="adminlogin-area-input"/>

                <p class="adminlogin-area-errors">
                    <?php
                    if (isset($_GET["msgUsername"])) {
                        echo $_GET["msgUsername"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="adminlogin-area-content">Password</p>
                <input type="password" name="adminPassword" id="adminPassword" placeholder="password" class="adminlogin-area-input"/>

                <p class="adminlogin-area-errors">
                    <?php
                    if (isset($_GET["msgPassword"])) {
                        echo $_GET["msgPassword"]; // error massage on DOM
                    }
                    ?>
                </p>

                <p class="adminlogin-area-errors incorrect-error">
                    <?php
                    if (isset($_GET["msgIncorrect"])) {
                        echo $_GET["msgIncorrect"]; // error massage on DOM
                        echo '</br>';
                    }

                    echo 'Only Chief Admin can Register New an Admin!';
                    ?>
                </p>

                <input type="submit" value="Login" class="adminlogin-are-button"/>

            </form>

            <div class="adminlogin-area-verticale-line"></div>

        </div>
    </body>
</html>
