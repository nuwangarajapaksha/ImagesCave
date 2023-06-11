<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './DB_Conn.php';

$buyerName = "";
$buyerEmail = "";
$buyerUsername = "";
$buyerPassword = "";
$buyerConfirmPassword = "";

if (isset($_POST["buyerName"]) && isset($_POST["buyerEmail"]) && isset($_POST["buyerUsername"]) && isset($_POST["buyerPassword"]) && isset($_POST["buyerConfirmPassword"])) {

    $buyerName = $_POST["buyerName"];
    $buyerEmail = $_POST["buyerEmail"];
    $buyerUsername = $_POST["buyerUsername"];
    $buyerPassword = $_POST["buyerPassword"];
    $buyerConfirmPassword = $_POST["buyerConfirmPassword"];

    if ($buyerName == "") {
        header("Location: ../buyer_Registration.php?msgName=Please enter your name");
        die();
    } elseif ($buyerEmail == "") {
        header("Location: ../buyer_Registration.php?msgEmail=Please enter your email");
        die();
    } elseif ($buyerUsername == "") {
        header("Location: ../buyer_Registration.php?msgUsername=Please enter your username");
        die();
    } elseif ($buyerPassword == "") {
        header("Location: ../buyer_Registration.php?msgPassword=Please enter your password");
        die();
    } elseif ($buyerConfirmPassword == "") {
        header("Location: ../buyer_Registration.php?msgConfirmPassword=Please Confirm your password");
        die();
    } elseif ($buyerPassword != $buyerConfirmPassword) {
        header("Location: ../buyer_Registration.php?msgConfirmPassword=Error,Confirmed password not match");
        die();
    } else {

        $queryUser = "SELECT * FROM `buyer` WHERE `buyer_username` = '" . $buyerUsername . "' OR `buyer_email` = '" . $buyerEmail . "'";
        $result = $connection->query($queryUser);
        $row = $result->fetch_assoc();

        if ($row["buyer_username"] == $buyerUsername OR $row["buyer_email"] == $buyerEmail) {
            header("Location: ../buyer_Registration.php?msgexistAccount=Exist user account, Register from another email and username");
            die();
        } else {
            $query = "INSERT INTO `buyer`(`buyer_name`,`buyer_email`,`buyer_username`,`buyer_password`,`buyer_is_active`) VALUES ('" . $buyerName . "','" . $buyerEmail . "','" . $buyerUsername . "','" . $buyerPassword . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../buyer_Login.php?msgRegistered=Successfully Registered ");
                die();
            } else {
                header("Location: ../buyer_Registration.php?msgRegistered=Not Registered ");
                die();
            }
        }
    }
}
?>