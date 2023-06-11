<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './DB_Conn.php';

$adminUsername = "";
$adminPassword = "";


if (isset($_POST["adminUsername"]) && isset($_POST["adminPassword"])) {
    $adminUsername = $_POST["adminUsername"];
    $adminPassword = $_POST["adminPassword"];

    if ($adminUsername == "") {
        header("Location: ../register_Admin_Checker.php?msgUsername=Please enter your username");
        die();
    } elseif ($adminPassword == "") {
        header("Location: ../register_Admin_Checker.php?msgPassword=Please enter your password");
        die();
    } else {

            if ($adminUsername == "nuwa" && $adminPassword == "1234") {

                header("Location: ../admin_Registration.php");
                die();
                exit();
            } else {
                //header("Location: ../admin_Login.php?msgIncorrect=Error,incorrect username or password");
                header("Location: ../register_Admin_Checker.php?msgIncorrect=Error,Incorrect username or password");
                die();
            }
        } 
    }

?>


