<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include './DB_Conn.php';

if (isset($_SESSION["Admin_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Admin_is_Login"] != true) {//logged in
        header("Location: ../admin_Login.php");
        die();
    }
} else {
    header("Location: ../admin_Login.php");
    die();
}

$addNewCategoryName = "";

if (isset($_POST["addNewCategoryName"])) {

    $addNewCategoryName = $_POST["addNewCategoryName"];

    if ($addNewCategoryName == "") {
        header("Location: ../adminPanel_Products_AddNewCategory.php?msgSelect=Please insert the new category name");
        die();
    } else {

        $queryExistsCategory = "SELECT `category_name` FROM `category` WHERE `category_name` = '" . $addNewCategoryName . "' ";
        $result = $connection->query($queryExistsCategory);
        if ($result->num_rows > 0) {
            header("Location: ../adminPanel_Products_AddNewCategory.php?msgSelect=Category Already Exists");
            die();
        } else {

            $query = "INSERT INTO `category`(`category_name`) VALUES ('" . $addNewCategoryName . "')";

            $isSaved = mysqli_query($connection, $query);

            if ($isSaved) {
                header("Location: ../adminPanel_Products_AddNewCategory.php?msgAdd=Successfully Added ");
                die();
            } else {
                header("Location: ../adminPanel_Products_AddNewCategory.php?msgAdd=Not Added ");
                die();
            }
        }
    }
}