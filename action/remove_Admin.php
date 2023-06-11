<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include './DB_Conn.php';

$adminId = "";
$adminUsername = "";
$adminPassword = "";

if ( isset($_POST["adminUsername"]) && isset($_POST["adminPassword"])) {

    $adminId = $_SESSION["adminId"];
    $adminUsername = $_POST["adminUsername"];
    $adminPassword = $_POST["adminPassword"];


    if ($adminUsername == "") {
        header("Location: ../remove_Admin_Checker.php?msgUsername=Please enter your username");
        die();
    } elseif ($adminPassword == "") {
        header("Location: ../remove_Admin_Checker.php?msgPassword=Please enter your password");
        die();
    } else {

        if ($adminUsername == "nuwa" && $adminPassword == "1234") {

            $query = "DELETE FROM `admin` WHERE `admin_id` = " . $adminId . "";

            $isDelete = mysqli_query($connection, $query);

            if ($isDelete) {
//echo 'user Delect Succsess !';
                header("Location: ../adminPanel_Admins.php?msg=Remove Successful !");
                $_SESSION["adminId"] = null;
                die();
            } else {
//echo 'error';
                header("Location: ../adminPanel_Admins.php?msg=Error, Remove UnSuccessful !");
                die();
            }
        } else {
//header("Location: ../admin_Login.php?msgIncorrect=Error,incorrect username or password");
            header("Location: ../remove_Admin_Checker.php?msgIncorrect=Error,Incorrect username or password");
            die();
        }
    }
}


