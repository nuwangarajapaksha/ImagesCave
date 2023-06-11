<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include './DB_Conn.php';

if (isset($_SESSION["Admin_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Admin_is_Login"] != true) {//logged in
        header("Location: ../admin_Login.php");
        die();
    }
} else {
    header("Location: ../admin_Login.php");
    die();
}

$productId = "";
$productName = "";
$productBuyPrice = "";
$productSellPrice = "";

if (isset($_SESSION["productIDPass"]) && isset($_POST["productName"]) && isset($_POST["productBuyPrice"]) && isset($_POST["productSellPrice"])) {

    $productId = $_SESSION["productIDPass"];
    $productName = $_POST["productName"];
    $productBuyPrice = $_POST["productBuyPrice"];
    $productSellPrice = $_POST["productSellPrice"];

    $query = "UPDATE `product` SET `product_name`='" . $productName . "', `product_buy_price`='" . $productBuyPrice . "',`product_sell_price`='" . $productSellPrice . "' WHERE `product_id` = '" . $productId . "' ";

    $isSaved = mysqli_query($connection, $query);

    if ($isSaved) {
        header("Location: ../adminPanel_Recent_ProductReport.php?msgUpdate=Successfully Saved");
        die();
    } else {
        header("Location: ../adminPanel_Recent_ProductReport.php?msgUpdate=Not Saved");
        die();
    }
}