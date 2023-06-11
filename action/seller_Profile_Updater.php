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

$sellerName = "";
$sellerBrithday = "";
$sellerBio = "";
$sellerEmail = "";
$sellerAddress = "";
$sellerCountry = "";
$sellerUsername = "";
$sellerPassword = "";
$sellerPpic = "";

if (isset($_SESSION["activeSellerId"])) {
    $activeSellerId = $_SESSION["activeSellerId"];
    if (isset($_POST["sellerName"]) && isset($_POST["sellerBirthday"]) && isset($_POST["sellerBio"]) && isset($_POST["sellerEmail"]) && isset($_POST["sellerAddress"]) && isset($_POST["sellerCountry"]) && isset($_POST["sellerUsername"]) && isset($_POST["sellerPassword"]) && isset($_FILES["sellerPpic"]["name"])) {

        $sellerName = $_POST["sellerName"];
        $sellerBrithday = $_POST["sellerBirthday"];
        $sellerBio = $_POST["sellerBio"];
        $sellerEmail = $_POST["sellerEmail"];
        $sellerAddress = $_POST["sellerAddress"];
        $sellerCountry = $_POST["sellerCountry"];
        $sellerUsername = $_POST["sellerUsername"];
        $sellerPassword = $_POST["sellerPassword"];
        $sellerPpic = $_FILES["sellerPpic"]["name"];

        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["sellerPpic"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["sellerPpic"]["tmp_name"], $target_file);

        $query = "UPDATE `seller` SET `seller_name`='" . $sellerName . "', `seller_birthday`='" . $sellerBrithday . "',`seller_ppic`='" . $sellerPpic . "',  `seller_bio`='" . $sellerBio . "', "
                . " `seller_email`='" . $sellerEmail . "',  `seller_address`='" . $sellerAddress . "',  `seller_country`='" . $sellerCountry . "', `seller_username`='" . $sellerUsername . "',  `seller_passowrd`='" . $sellerPassword . "' "
                . "WHERE `seller_id` = '" . $activeSellerId . "' ";

        $isSaved = mysqli_query($connection, $query);

        if ($isSaved) {
            header("Location: ../seller_Profile.php?msgUpdate=Successfully Updated");
            die();
        } else {
            header("Location: ../seller_Profile.php?msgUpdate=Not Updated");
            die();
        }
    }
}
?>