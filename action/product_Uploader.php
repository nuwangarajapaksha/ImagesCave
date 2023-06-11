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

if (isset($_FILES["uploadProduct"]["name"])) {
    

    if ($_FILES["uploadProduct"]["name"] == "") {
        header("Location: ../product_Upload_Panel.php?msgSelect=Please select a product ");
        die();
    } else {

        $queryExistsProduct = "SELECT `product_img_url` FROM `product` WHERE `product_img_url` = '" . $_FILES["uploadProduct"]["name"] . "' ";
        $result = $connection->query($queryExistsProduct);
        if ($result->num_rows > 0) {
            header("Location: ../product_Upload_Panel.php?msgSelect=Product Already Exists ");
            die();
        } else {

            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["uploadProduct"]["name"]);
            $productFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($productFileType != "jpg" && $productFileType != "png" && $productFileType != "jpeg") {
                header("Location: ../product_Upload_Panel.php?msgSelect=Sorry, only JPG, JPEG, PNG files are allowed ");
                die();
            } else {
                move_uploaded_file($_FILES["uploadProduct"]["tmp_name"], $target_file);

                $_SESSION["uploadProductUrl"] = $_FILES["uploadProduct"]["name"];

                header("Location: ../product_Details_Upload_Panel.php");
                die();
            }
        }
    }
}