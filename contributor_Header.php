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
        <link rel="stylesheet" type="text/css" href="css/headerStyle.css"/>
        <link rel="stylesheet" type="text/css" href="css/contributor_HeaderStyle.css"/>
    </head>
    <body>
        <header>
            <nav>
                <img src="img/MenuIcon.png" class="menuIcon" onclick="h();"/>
                <!--<p class="sp-menu" onclick="h();">Menu</p>-->
                <a href="contributor_Dashboard.php"><img src="img/Logo.png" class="logo"/></a>


                <div class="side-menu">  

                    <div class="side-menu-container" id="slidbar"> 

                        <ul class="main-ul">
                            
                            <li class="main-li conDashBoard-logo">Contributor Dashboard</li>

                            <span class="login">
                                
                                <?php
                                    //session_start();
                                    if (isset($_SESSION["activeSellerId"])) {
                                        $activeSellerId = $_SESSION["activeSellerId"];
                                        $query = "SELECT * FROM `seller` WHERE `seller_id` = '".$activeSellerId."'";
                                        $result = $connection->query($query);
                                        $row = $result->fetch_assoc();
                                    }else{
                                        $row["seller_username"] = "you";
                                    }
                                    ?>
                                
<!--                                <li class="main-li seller-Ppic">
                                   <img src="img/Animal1.jpg">
                                    </li>-->

                                <li class="main-li loginAccount-button">
                                    
                                    <a href="seller_Profile.php?activeSellerId=<?php echo $row["seller_id"];?>" class="account-button-activeUsername"><?php echo "Hi, ".$row["seller_username"];?></a>
                                    <div class="submenu">
                                        <ul class="sub-ul">
                                            <a href="seller_Profile.php?activeSellerId=<?php echo $row["seller_id"];?>"><li class="sub-li">Profile</li>
                                                <a href="seller_Logout.php"><li class="sub-li">Log out</li>
                                        </ul>
                                </div>
                                </li>
                                <li class="main-li logout-button"><a href="seller_Logout.php">Log out</a></li>
                                
                            </span>
                        </ul>

                    </div> 

                </div>
            </nav>
        </header>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>