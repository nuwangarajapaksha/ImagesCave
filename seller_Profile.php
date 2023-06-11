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
        <title>Contributor Profile</title>
        <link rel="stylesheet" type="text/css" href="css/seller_RegistrationProfileStyle.css">
        <?php
        if (isset($_GET["msgUpdate"])) {
            echo "<script>alert('" . $_GET["msgUpdate"] . "');</script>"; // error massage as alert
        }
        if (isset($_SESSION["activeSellerId"])) {
            $activeSellerId = $_SESSION["activeSellerId"];
        }
        ?>
    </head>
    <body>
        <div class="sellerRegUp-area">

            <a href="contributor_Dashboard.php">
                <img src="img/Close_Cross_Icon.png" class="sellerRegUp-area-close-Icon"/>
            </a>

            <p class="sellerRegUp-area-title">Contributor Profile</p>

            <form method="post" action="action/seller_Profile_Updater.php" class="sellerRegUp-area-form" enctype="multipart/form-data">

                <?php
                $query = "SELECT * FROM `seller` WHERE `seller_id` = '" . $activeSellerId . "'";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>

                    <div class="sellerRegUp-area-leftSide">

                        <p class="sellerRegUp-area-content">Name</p>
                        <input type="text" name="sellerName" id="sellerName" value="<?php echo $row["seller_name"]; ?>" class="sellerRegUp-area-input" />



                        <p class="sellerRegUp-area-content">Birthday</p>
                        <input type="date" name="sellerBirthday" id="sellerBirthday" value="<?php echo $row["seller_birthday"]; ?>" class="sellerRegUp-area-input" />




                        <p class="sellerRegUp-area-content">Bio</p>
                        <input type="text" name="sellerBio" id="sellerBio" value="<?php echo $row["seller_bio"]; ?>" class="sellerRegUp-area-input" />


                        <p class="sellerRegUp-area-content">Email</p>
                        <input type="email" name="sellerEmail" id="sellerEmail" value="<?php echo $row["seller_email"]; ?>" class="sellerRegUp-area-input" />


                        <p class="sellerRegUp-area-content">Address</p>
                        <input type="text" name="sellerAddress" id="sellerAddress" value="<?php echo $row["seller_address"]; ?>" class="sellerRegUp-area-input" />

                        <p class="sellerRegUp-area-content">Country</p>
                        <input type="text" name="sellerCountry" id="sellerCountry" value="<?php echo $row["seller_country"]; ?>" class="sellerRegUp-area-input" />


                    </div>

                    <div class="sellerRegUp-area-rightSide">

                        <p class="sellerRegUp-area-content">Username</p>
                        <input type="text" name="sellerUsername" id="sellerUsername" value="<?php echo $row["seller_username"]; ?>" class="sellerRegUp-area-input" />


                        <p class="sellerRegUp-area-content">Password</p>
                        <input type="password" name="sellerPassword" id="sellerPassword" value="<?php echo $row["seller_passowrd"]; ?>" class="sellerRegUp-area-input" />


                        <p class="sellerRegUp-area-content">Profial Picture</p>
                        <input type="file" name="sellerPpic" id="sellerPpic" class="sellerRegUp-area-input-ppic-button" />


                        <input type="submit" value="Save" class="sellerRegUp-area-button"/>

                        <p class="sellerRegUp-area-deactivateAccount">Want to Deactivate the Account ! <a href="action/seller_Deactivate.php">Deactivate Account</a></p>

                        <div class="sellerRegUp-area-verticale-line"></div>
                    </div>
                </form>


        <?php } ?>
        </div>
    </body>
</html>
