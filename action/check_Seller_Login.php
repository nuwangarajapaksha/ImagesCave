<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include './DB_Conn.php';

$sellerEmailUsername = "";
$sellerPassword = "";

if (isset($_SESSION["Seller_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Seller_is_Login"] == true) {//logged in
        header("Location: ../contributor_Dashboard.php");
        die();
    }
} else {
    if (isset($_POST["sellerEmailUsername"]) && isset($_POST["sellerPassword"])) {
        $sellerEmailUsername = $_POST["sellerEmailUsername"];
        $sellerPassword = $_POST["sellerPassword"];

        if ($sellerEmailUsername == "") {
            header("Location: ../seller_Login.php?msgUsername=Please enter your email or username");
            die();
        } elseif ($sellerPassword == "") {
            header("Location: ../seller_Login.php?msgPassword=Please enter your password");
            die();
        } else {
            $query = "SELECT * FROM `seller` WHERE `seller_email` = '" . $sellerEmailUsername . "' OR `seller_username` = '" . $sellerEmailUsername . "' ";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $sellerIdDB = $row["seller_id"];
                $sellerEmailDB = $row["seller_email"];
                $sellerUsernameDB = $row["seller_username"];
                $sellerPasswordDB = $row["seller_passowrd"];
                $sellerIsActiveDB = $row["seller_is_active"];
                if ($sellerIsActiveDB != 1) {
                    header("Location: ../seller_Login.php?msgUsername= Inactive user");
                    die();
                } elseif ($sellerEmailUsername == $sellerEmailDB or $sellerUsernameDB && $sellerPassword == $sellerPasswordDB) {
                    //$_SESSION["name"] = "Your username is :" . $un; //assign username into name session
                    $_SESSION["Seller_is_Login"] = true; //assign true into is_login
                    $_SESSION["activeSellerId"] = $sellerIdDB;
                    header("Location: ../contributor_Dashboard.php");
                    die();
                    exit();
                } else {
                    // header("Location: ../seller_Login.php?msgIncorrect=Error,incorrect email,username or password");
                    header("Location: ../seller_Login.php?msgPassword=Error,incorrect password");
                    die();
                }
            } else {
                header("Location: ../seller_Login.php?msgUsername=Error,incorrect email,username");
                die();
            }
        }
    }
}
?>

