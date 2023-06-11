<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

include './DB_Conn.php';

if (isset($_SESSION["Seller_is_Login"])) {
    if ($_SESSION["Seller_is_Login"] != true) {
        header("Location: ../seller_Login.php");
        die();
    }
} else {
    header("Location: ../seller_Login.php");
    die();
}

$activeSellerId = "";
$uploadProductUrl = "";
$productName = "";
$productDescription = "";
$productType = "";
$productCategory = "";

if (isset($_SESSION["activeSellerId"]) && isset($_SESSION["uploadProductUrl"]) && isset($_POST["productName"]) && isset($_POST["productDescription"]) && isset($_POST["productType"]) && isset($_POST["productCategory"])) {

    $activeSellerId = $_SESSION["activeSellerId"];
    $uploadProductUrl = $_SESSION["uploadProductUrl"];
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productType = $_POST["productType"];
    $productCategory = $_POST["productCategory"];



    if ($productName == "") {
        header("Location: ../product_Details_Upload_Panel.php?msgName=Please enter a product name");
        die();
    } elseif ($productDescription == "") {
        header("Location: ../product_Details_Upload_Panel.php?msgDescription=Please enter description about the product");
        die();
    } else {

//        $typeId = "SELECT `type_id` FROM `type` WHERE `type_name` = '" . $productType . "' ";
//        $typeIdResult = $connection->query($typeId);
//        $typeIdRow = $typeIdResult->fetch_assoc();
//        //echo $typeIdRow["type_id"];
//
//        $categoryId = "SELECT `category_id` FROM `category` WHERE `category_name` = '" . $productCategory . "' ";
//        $categoryIdResult = $connection->query($categoryId);
//        $categoryIdRow = $categoryIdResult->fetch_assoc();
        // echo $categoryIdRow["category_id"];

        $buyPrice = 0;
        $sellPrice = 0;

        $query = "INSERT INTO `product`(`product_name`,`product_description`,`product_img_url`,`product_buy_price`,`product_sell_price`,`type_type_id`,`category_category_id`,`seller_seller_id`) "
                . "VALUES ('" . $productName . "','" . $productDescription . "','" . $uploadProductUrl . "','" . $buyPrice . "','" . $sellPrice . "','" . $productType . "','" . $productCategory . "','" . $activeSellerId . "')";


        $isSaved = mysqli_query($connection, $query);

        if ($isSaved) {
            header("Location: ../product_Upload_Panel.php?msgUploaded=Successfully Uploaded ");
            $_SESSION["uploadProductUrl"] = null;
            die();
        } else {
            header("Location: ../product_Upload_Panel.php?msgUploaded=Not Uploaded ");
            die();
        }
    }
}
