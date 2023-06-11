<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DB_Conn.php';

$sellerName = "";
$sellerBrithday = "";
$sellerBio = "";
$sellerEmail = "";
$sellerAddress = "";
$sellerCountry = "";
$sellerUsername = "";
$sellerPassword = "";
$sellerConfirmPassword = "";
$sellerPpic = "";

if (isset($_POST["sellerName"]) && isset($_POST["sellerBirthday"]) && isset($_POST["sellerBio"]) && isset($_POST["sellerEmail"]) && isset($_POST["sellerAddress"]) && isset($_POST["sellerCountry"]) && isset($_POST["sellerUsername"]) && isset($_POST["sellerPassword"]) && isset($_POST["sellerConfirmPassword"]) && isset($_FILES["sellerPpic"]["name"])) {


    $sellerName = $_POST["sellerName"];
    $sellerBrithday = $_POST["sellerBirthday"];
    $sellerBio = $_POST["sellerBio"];
    $sellerEmail = $_POST["sellerEmail"];
    $sellerAddress = $_POST["sellerAddress"];
    $sellerCountry = $_POST["sellerCountry"];
    $sellerUsername = $_POST["sellerUsername"];
    $sellerPassword = $_POST["sellerPassword"];
    $sellerConfirmPassword = $_POST["sellerConfirmPassword"];
    $sellerPpic = $_FILES["sellerPpic"]["name"];


    if ($sellerName == "") {
        header("Location: ../seller_Registration.php?msgName=Please enter your name");
        die();
    } elseif ($sellerBrithday == "") {
        header("Location: ../seller_Registration.php?msgBirthday=Please select your birthday");
        die();
    } elseif ($sellerEmail == "") {
        header("Location: ../seller_Registration.php?msgEmail=Please enter your email");
        die();
    } elseif ($sellerCountry == "") {
        header("Location: ../seller_Registration.php?msgCountry=Please enter your country");
        die();
    } elseif ($sellerUsername == "") {
        header("Location: ../seller_Registration.php?msgUsername=Please enter your username");
        die();
    } elseif ($sellerPassword == "") {
        header("Location: ../seller_Registration.php?msgPassword=Please enter your password");
        die();
    } elseif ($sellerConfirmPassword == "") {
        header("Location: ../seller_Registration.php?msgConfirmPassword=Please Confirm your password");
        die();
    } elseif ($sellerPassword != $sellerConfirmPassword) {
        header("Location: ../seller_Registration.php?msgConfirmPassword=Error,Confirmed password not match");
        die();
    } else {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["sellerPpic"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["sellerPpic"]["tmp_name"], $target_file);
        // $Ppicname = htmlspecialchars( basename( $_FILES["sellerPpic"]["name"]));
        //echo $sellerName,$sellerBrithday,$sellerPpic,$sellerBio,$sellerEmail,$sellerAddress,$sellerCountry,$sellerGender,$sellerUsername,$sellerPassword,$sellerConfirmPassword;

        $queryUser = "SELECT * FROM `seller` WHERE `seller_username` = '" . $sellerUsername . "' OR `seller_email` = '" . $sellerEmail . "'";
        $result = $connection->query($queryUser);
        $row = $result->fetch_assoc();

        if ($row["seller_username"] == $sellerUsername OR $row["seller_email"] == $sellerEmail) {
            header("Location: ../seller_Registration.php?msgexistAccount=Exist user account, Register from another email and username");
            die();
        } else {
            $query = "INSERT INTO `seller`(`seller_name`,`seller_birthday`,`seller_ppic`,`seller_bio`,`seller_email`,`seller_address`,`seller_country`,`seller_username`,`seller_passowrd`,`seller_is_active`) "
                    . "VALUES ('" . $sellerName . "','" . $sellerBrithday . "','" . $sellerPpic . "','" . $sellerBio . "','" . $sellerEmail . "','" . $sellerAddress . "','" . $sellerCountry . "','" . $sellerUsername . "','" . $sellerPassword . "','1')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../seller_Login.php?msgRegistered=Successfully Registered ");
                die();
            } else {
                header("Location: ../seller_Registration.php?msgRegistered=Not Registered ");
                die();
            }
        }
    }
}
?>