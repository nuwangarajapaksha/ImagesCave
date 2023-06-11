<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include './DB_Conn.php';

if (isset($_SESSION["Buyer_is_Login"])) {
if ($_SESSION["Buyer_is_Login"] != true) {
header("Location: ../buyer_Login.php");
die();
}
} else {
header("Location: ../buyer_Login.php");
die();
}


$activeBuyerId = "";
$productId = "";

if (isset($_SESSION["activeBuyerId"]) && isset($_GET["order_id"])) {
$activeBuyerId = $_SESSION["activeBuyerId"];
$productId = $_GET["order_id"];

$query = "SELECT * FROM `product` WHERE `product_id` = '" . $productId . "'";
$result = $connection->query($query);
$row = $result->fetch_assoc();

$sellerId = $row["seller_seller_id"];

$queryInsert = "INSERT INTO `sales`(`product_product_id`,`buyer_buyer_id`,`seller_seller_id`) VALUES ('" . $productId . "','" . $activeBuyerId . "','" . $sellerId . "')";

$isSaved = mysqli_query($connection, $queryInsert);

header("Location: ../buyer_Invoice.php?pid=$productId");
    
} else {
    header("Location: ../index.php");
    die();
}