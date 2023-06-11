<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include './DB_Conn.php';

$adminUsername = "";
$adminPassword = "";

if (isset($_SESSION["Admin_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Admin_is_Login"] == true) {//logged in
        header("Location: ../adminPanel.php");
        die();
    }
} else {
    if (isset($_POST["adminUsername"]) && isset($_POST["adminPassword"])) {
        $adminUsername = $_POST["adminUsername"];
        $adminPassword = $_POST["adminPassword"];

        if ($adminUsername == "") {
            header("Location: ../admin_Login.php?msgUsername=Please enter your username");
            die();
        } elseif ($adminPassword == "") {
            header("Location: ../admin_Login.php?msgPassword=Please enter your password");
            die();
        } else {
            $query = "SELECT * FROM `admin` WHERE `admin_username` = '" . $adminUsername . "' ";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $adminUsernameDB = $row["admin_username"];
                $adminPasswordDB = $row["admin_password"];
                if ($adminUsername == $adminUsernameDB && $adminPassword == $adminPasswordDB) {
                    //$_SESSION["name"] = "Your username is :" . $un; //assign username into name session
                    $_SESSION["Admin_is_Login"] = true; //assign true into is_login
                    header("Location: ../adminPanel.php");
                    die();
                    exit();
                } else {
                    //header("Location: ../admin_Login.php?msgIncorrect=Error,incorrect username or password");
                    header("Location: ../admin_Login.php?msgPassword=Error,incorrect password");
                    die();
                }
            } else {
                header("Location: ../admin_Login.php?msgUsername=Error,incorrect username");
                die();
            }
        }
    }
}
?>

