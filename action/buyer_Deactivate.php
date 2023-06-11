<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include './DB_Conn.php';

$activeBuyerId = "";

if (isset($_SESSION["Buyer_is_Login"]) && isset($_SESSION["activeBuyerId"])) {//check is login already setted(already logedin)
    if ($_SESSION["Buyer_is_Login"] == true) {//logged in
        $activeBuyerId = $_SESSION["activeBuyerId"];
        $query = "UPDATE `buyer` SET `buyer_is_active` = '0' WHERE `buyer_id` = '" . $activeBuyerId . "'";
        $result = $connection->query($query);

        if ($result === True) {
            header("Location: ../buyer_Logout.php");
            die();
        } else {
            header("Location: ../buyer_Profile.php?msgUpdate= Deactivation Faild !");
            die();
        }
    } else {
        header("Location: ../buyer_Login.php?msgLoginFirst=Login Frist");
        die();
    }
} else {
    header("Location: ../buyer_Login.php?msgLoginFirst=Login Frist");
    die();
}
    
    


