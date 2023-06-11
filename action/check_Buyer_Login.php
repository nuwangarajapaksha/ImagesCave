<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include './DB_Conn.php';

$buyerEmailUsername = "";
$buyerPassword = "";

if (isset($_SESSION["Buyer_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Buyer_is_Login"] == true) {//logged in
        header("Location: ../index.php");
        die();
    }
} else {
    if (isset($_POST["buyerEmailUsername"]) && isset($_POST["buyerPassword"])) {
        $buyerEmailUsername = $_POST["buyerEmailUsername"];
        $buyerPassword = $_POST["buyerPassword"];

        if ($buyerEmailUsername == "") {
            header("Location: ../buyer_Login.php?msgUsername=Please enter your email or username");
            die();
        } elseif ($buyerPassword == "") {
            header("Location: ../buyer_Login.php?msgPassword=Please enter your password");
            die();
        } else {
            $query = "SELECT * FROM `buyer` WHERE `buyer_email` = '" . $buyerEmailUsername . "' OR `buyer_username` = '" . $buyerEmailUsername . "' ";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $buyerIdDB = $row["buyer_id"];
                $buyerEmailDB = $row["buyer_email"];
                $buyerUsernameDB = $row["buyer_username"];
                $buyerPasswordDB = $row["buyer_password"];
                $buyerIsActiveDB = $row["buyer_is_active"];
                if ($buyerIsActiveDB != 1) {
                    header("Location: ../buyer_Login.php?msgUsername= Inactive user");
                    die();
                } elseif ($buyerEmailUsername == $buyerEmailDB or $buyerUsernameDB && $buyerPassword == $buyerPasswordDB) {
                    //$_SESSION["name"] = "Your username is :" . $un; //assign username into name session
                    $_SESSION["Buyer_is_Login"] = true; //assign true into is_login
                    $_SESSION["activeBuyerId"] = $buyerIdDB;
                    header("Location: ../index.php");
                    die();
                    exit();
                } else {
                    //header("Location: ../buyer_Login.php?msgIncorrect=Error,incorrect email,username or password");
                    header("Location: ../buyer_Login.php?msgPassword=Error,incorrect password");
                    die();
                }
            } else {
                header("Location: ../buyer_Login.php?msgUsername=Error,incorrect email,username");
                die();
            }
        }
    }
}
?>

//header.php?bUsername=".$buyerUsernameDB."