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

$buyerName = "";
$buyerEmail = "";
$buyerUsername = "";
$buyerPassword = "";

if (isset($_SESSION["activeBuyerId"])) {
    $activeBuyerId = $_SESSION["activeBuyerId"];
    if (isset($_POST["buyerName"]) && isset($_POST["buyerEmail"]) && isset($_POST["buyerUsername"]) && isset($_POST["buyerPassword"])) {

        $buyerName = $_POST["buyerName"];
        $buyerEmail = $_POST["buyerEmail"];
        $buyerUsername = $_POST["buyerUsername"];
        $buyerPassword = $_POST["buyerPassword"];

        $query = "UPDATE `buyer` SET `buyer_name`='" . $buyerName . "', `buyer_username`='" . $buyerUsername . "',`buyer_password`='" . $buyerPassword . "',  `buyer_email`='" . $buyerEmail . "' WHERE `buyer_id` = '" . $activeBuyerId . "' ";

        $isSaved = mysqli_query($connection, $query);

        if ($isSaved) {
            header("Location: ../buyer_Profile.php?msgUpdate=Successfully Updated");
            die();
        } else {
            header("Location: ../buyer_Profile.php?msgUpdate=Not Updated");
            die();
        }
    }
}
?>