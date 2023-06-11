<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include './action/DB_Conn.php';
if (isset($_SESSION["Buyer_is_Login"])) {
    if ($_SESSION["Buyer_is_Login"] != true) {
        header("Location: buyer_Login.php");
        die();
    }
} else {
    header("Location: buyer_Login.php");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="css/buyer_RegistrationProfileStyle1.css"/>
        <?php
        if (isset($_GET["msgUpdate"])) {
            echo "<script>alert('" . $_GET["msgUpdate"] . "');</script>"; // error massage as alert
        }
        $activeBuyerId = "";
        if (isset($_SESSION["activeBuyerId"])) {
            $activeBuyerId = $_SESSION["activeBuyerId"];
        }
        ?>
    </head>
    <body>
        <div class="buyerRegUp-area">

            <a href="index.php">
                <img src="img/Close_Cross_Icon.png" class="buyerRegUp-area-close-Icon"/>
            </a>

            <p class="buyerRegUp-area-title">Profile</p>

            <form method="post" action="action/buyer_Profile_Updater.php" class="buyerRegUp-area-form">


                <?php
                $query = "SELECT * FROM `buyer` WHERE `buyer_id` = '" . $activeBuyerId . "'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>
                    <p class="buyerRegUp-area-content">Name</p>
                    <input type="text" name="buyerName" id="buyerName" value="<?php echo $row["buyer_name"]; ?>" class="buyerRegUp-area-input" />


                    <p class="buyerRegUp-area-content">Email</p>
                    <input type="email" name="buyerEmail" id="buyerEmail" value="<?php echo $row["buyer_email"]; ?>" class="buyerRegUp-area-input" />               

                    <p class="buyerRegUp-area-content">Username</p>
                    <input type="text" name="buyerUsername" id="buyerUsername" value="<?php echo $row["buyer_username"]; ?>" class="buyerRegUp-area-input" />

                    <p class="buyerRegUp-area-content">Password</p>
                    <input type="password" name="buyerPassword" id="buyerPassword" value="<?php echo $row["buyer_password"]; ?>" class="buyerRegUp-area-input" />


                    <input type="submit" value="Save" class="buyerRegUp-area-button"/>
                <?php } ?>
            </form>

            <p class="buyerRegUp-area-deactivateAccount">Want to Deactivate the Account ! <a href="action/buyer_Deactivate.php">Deactivate Account</a></p>

            <div class="buyerRegUp-area-verticale-line"></div>

        </div>
    </body>
</html>

