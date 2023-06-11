<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if(session_id() == ""){
    session_start();
}
include './action/DB_Conn.php';
$BuyerIsLogin = "";
if (isset($_SESSION["Buyer_is_Login"])){$BuyerIsLogin = $_SESSION["Buyer_is_Login"];}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/headerStyle.css"/>
    </head>
    <body>
        <header>
            <nav>
                <img src="img/MenuIcon.png" class="menuIcon" onclick="h();"/>

                <a href="index.php"><img src="img/Logo.png" class="logo"/></a>


                <div class="side-menu">  

                    <div class="side-menu-container" id="slidbar"> 

                        <ul class="main-ul">
                            <li class="main-li"><a href="search_Photos.php">Photos</a></li>
                            <li class="main-li"><a href="search_Illustrations.php">Illustrations</a></li>
                            <li class="main-li"><a href="#">Categories</a>
                                <div class="submenu">
                                    <ul class="sub-ul">
                                        <?php
                                        $query = "SELECT * FROM `category`";
                                        $result = $connection->query($query);
                                        if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                        <a href="search_Main.php?keyWord=<?php echo $row["category_name"];?>"><li class="sub-li"><?php echo $row["category_name"];?></li>

                                        <?php } }?>
                                    </ul>
                                </div> 
                            </li>
                            <li class="main-li"><a href="seller_Login.php">Contributor</a></li>
                            <li class="main-li"><a href="about_Us.php">About us</a></li>
                            <span class="login">
                                
                                
                                <li class="main-li loginAccount-button">
                                    <?php
                                    if ($BuyerIsLogin == true) {
                                        if (isset($_SESSION["activeBuyerId"])) {
                                            $activeBuyerId = $_SESSION["activeBuyerId"];
                                            $query = "SELECT * FROM `buyer` WHERE `buyer_id` = '" . $activeBuyerId . "'";
                                            $result = $connection->query($query);
                                            if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                        
                                        ?>
                                        <a href="buyer_Profile.php" class="account-button-activeUsername"><?php echo "Hi, " . $row["buyer_username"]; ?></a>
                                        <div class="submenu">
                                            <ul class="sub-ul">
                                                <a href="buyer_Profile.php"><li class="sub-li">Profile</li></a>
                                                <a href="buyer_Logout.php"><li class="sub-li">Log out</li></a>
                                            </ul>
                                         </div>

                                    <?php }}} else { ?>
                                                <a href="buyer_Login.php">Log in</a>
                                        <?php } ?>
                                </li>


                                <li class="main-li logout-button"><a href="buyer_Logout.php">Log out</a></li>
                                
                            </span>
                        </ul>

                    </div> 

                </div>
            </nav>
        </header>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
