<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DB_Conn.php';

$adminName = "";
$adminEmail = "";
$adminUsername = "";
$adminPassword = "";
$adminConfirmPassword = "";

if (isset($_POST["adminName"]) && isset($_POST["adminEmail"]) && isset($_POST["adminUsername"]) && isset($_POST["adminPassword"]) && isset($_POST["adminConfirmPassword"])) {

    $adminName = $_POST["adminName"];
    $adminEmail = $_POST["adminEmail"];
    $adminUsername = $_POST["adminUsername"];
    $adminPassword = $_POST["adminPassword"];
    $adminConfirmPassword = $_POST["adminConfirmPassword"];

    if ($adminName == "") {
        header("Location: ../admin_Registration.php?msgName=Please enter your name");
        die();
    } elseif ($adminEmail == "") {
        header("Location: ../admin_Registration.php?msgEmail=Please enter your email");
        die();
    } elseif ($adminUsername == "") {
        header("Location: ../admin_Registration.php?msgUsername=Please enter your username");
        die();
    } elseif ($adminPassword == "") {
        header("Location: ../admin_Registration.php?msgPassword=Please enter your password");
        die();
    } elseif ($adminConfirmPassword == "") {
        header("Location: ../admin_Registration.php?msgConfirmPassword=Please Confirm your password");
        die();
    } elseif ($adminPassword != $adminConfirmPassword) {
        header("Location: ../admin_Registration.php?msgConfirmPassword=Error,Confirmed password not match");
        die();
    } else {

        $queryUser = "SELECT * FROM `admin` WHERE `admin_username` = '" . $adminUsername . "' OR `admin_email` = '" . $adminEmail . "'";
        $result = $connection->query($queryUser);
        $row = $result->fetch_assoc();

        if ($row["admin_username"] == $adminUsername OR $row["admin_email"] == $adminEmail) {
            header("Location: ../admin_Registration.php?msgexistAccount=Exist Admin account, Register from another email and username");
            die();
        } else {
            $query = "INSERT INTO `admin`(`admin_name`,`admin_email`,`admin_username`,`admin_password`,`admin_is_active`) VALUES ('" . $adminName . "','" . $adminEmail . "','" . $adminUsername . "','" . $adminPassword . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../adminPanel_Admins.php?msgRegistered=Successfully Registered ");
                die();
            } else {
                header("Location: ../admin_Registration.php?msgRegistered=Not Registered ");
                die();
            }
        }
    }
}
?>