<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contributor Registration</title>
        <link rel="stylesheet" type="text/css" href="css/seller_RegistrationProfileStyle.css">
        <?php
        if (isset($_GET["msgRegistered"])) {
            echo "<script>alert('" . $_GET["msgRegistered"] . "');</script>"; // error massage as alert
        }
        ?>
    </head>
    <body>
        <div class="sellerRegUp-area">

            <a href="seller_Login.php">
                <img src="img/Close_Cross_Icon.png" class="sellerRegUp-area-close-Icon"/>
            </a>

            <p class="sellerRegUp-area-title">Contributor Registration</p>

            <form method="post" action="action/seller_Register.php" class="sellerRegUp-area-form" enctype="multipart/form-data">

                <div class="sellerRegUp-area-leftSide">

                    <p class="sellerRegUp-area-content">Name<span>*</span></p>
                    <input type="text" name="sellerName" id="sellerName" placeholder="Name" class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-errors">
                        <?php
                        if (isset($_GET["msgName"])) {
                            echo $_GET["msgName"]; // error massage on DOM
                        }
                        ?>
                    </p>

                    <p class="sellerRegUp-area-content">Birthday<span>*</span></p>
                    <input type="date" name="sellerBirthday" id="sellerBirthday"  class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-errors">
                        <?php
                        if (isset($_GET["msgBirthday"])) {
                            echo $_GET["msgBirthday"]; // error massage on DOM
                        }
                        ?>
                    </p>



                    <p class="sellerRegUp-area-content">Bio</p>
                    <input type="text" name="sellerBio" id="sellerBio" placeholder="bio" class="sellerRegUp-area-input" />


                    <p class="sellerRegUp-area-content">Email<span>*</span></p>
                    <input type="email" name="sellerEmail" id="sellerEmail" placeholder="email" class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-errors">
                        <?php
                        if (isset($_GET["msgEmail"])) {
                            echo $_GET["msgEmail"]; // error massage on DOM
                        }
                        ?>
                    </p>

                    <p class="sellerRegUp-area-content">Address</p>
                    <input type="text" name="sellerAddress" id="sellerAddress" placeholder="address" class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-content">Country<span>*</span></p>
                    <input type="text" name="sellerCountry" id="sellerCountry" placeholder="Country" class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-errors">
                        <?php
                        if (isset($_GET["msgCountry"])) {
                            echo $_GET["msgCountry"]; // error massage on DOM
                        }
                        ?>
                    </p>


                </div>
                <div class="sellerRegUp-area-rightSide">
                    <p class="sellerRegUp-area-content">Username<span>*</span></p>
                    <input type="text" name="sellerUsername" id="sellerUsername" placeholder="username" class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-errors">
                        <?php
                        if (isset($_GET["msgUsername"])) {
                            echo $_GET["msgUsername"]; // error massage on DOM
                        }
                        ?>
                    </p>

                    <p class="sellerRegUp-area-content">Password<span>*</span></p>
                    <input type="password" name="sellerPassword" id="sellerPassword" placeholder="password" class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-errors">
                        <?php
                        if (isset($_GET["msgPassword"])) {
                            echo $_GET["msgPassword"]; // error massage on DOM
                        }
                        ?>
                    </p>

                    <p class="sellerRegUp-area-content">Confirm Password<span>*</span></p>
                    <input type="password" name="sellerConfirmPassword" id="sellerConfirmPassword" placeholder="confirm password" class="sellerRegUp-area-input" />

                    <p class="sellerRegUp-area-errors">
                        <?php
                        if (isset($_GET["msgConfirmPassword"])) {
                            echo $_GET["msgConfirmPassword"]; // error massage on DOM
                        }
                        ?>
                    </p>


                    <p class="sellerRegUp-area-content">Profial Picture</p>
                    <input type="file" name="sellerPpic" id="sellerPpic"  class="sellerRegUp-area-input-ppic-button" />

                    <p class="sellerRegUp-area-errors existAccount-error">
                        <?php
                        if (isset($_GET["msgexistAccount"])) {
                            echo $_GET["msgexistAccount"]; // error massage on DOM
                        }
                        ?>
                    </p>


                    <input type="submit" value="Register" class="sellerRegUp-area-button"/>
                    <div class="sellerRegUp-area-verticale-line"></div>
                </div>
            </form>



        </div>
    </body>
</html>
