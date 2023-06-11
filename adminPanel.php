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
        <title>Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="css/adminPanelStyle.css"/>
    </head>
    <body>
        <div class="adminPanel-area">

            <a href="adminPanel_Buyers.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_Buyer_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Buyers</p>
                </div>
            </a>

            <a href="adminPanel_Sellers.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_Seller_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Sellers</p>
                </div>
            </a>  

            <a href="adminPanel_Products.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_Products_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Products</p>
                </div>
            </a>

            <a href="adminPanel_Recent_Products.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_Recent_Products_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Recent Products</p>
                </div>
            </a>

            <a href="adminPanel_SalesReport.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_SellProducts_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Sales Report</p>
                </div>
            </a>     

            <a href="adminPanel_S&C.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_Suggestionsv & Complaints_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Suggestions & Complaints</p>
                </div>
            </a> 
            
            <a href="adminPanel_Admins.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_Admins_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Admins</p>
                </div>
            </a>

            <a href="adminPanel_Logout.php">
                <div class="adminPanel-area-card">
                    <img class="adminPanel-area-card-img" src="img/AdminPanel_LogOut_ff3333.png"/>
                    <p class="adminPanel-area-card-content">Log Out</p>
                </div>
            </a>
        </div>

    </body>
</html>
