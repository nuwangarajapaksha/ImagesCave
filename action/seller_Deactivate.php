<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DB_Conn.php';
session_start();

$activeSellerId = "";

if (isset($_SESSION["Seller_is_Login"]) && isset($_SESSION["activeSellerId"])) {//check is login already setted(already logedin)
    if ($_SESSION["Seller_is_Login"] == true) {//logged in
        $activeSellerId = $_SESSION["activeSellerId"];
        $query = "UPDATE `seller` SET `seller_is_active` = '0' WHERE `seller_id` = '" . $activeSellerId . "'";
        $result = $connection->query($query);

        if ($result === True) {
            header("Location: ../seller_Logout.php");
            die();
        } else {
            header("Location: ../seller_Profile.php?msgUpdate= Deactivation Faild !");
            die();
        }
    } else {
        header("Location: ../seller_Login.php?msgLoginFirst=Login Frist");
        die();
    }
} else {
    header("Location: ../seller_Login.php?msgLoginFirst=Login Frist");
    die();
}
    
    


