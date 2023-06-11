<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DB_Conn.php';

$productId = "";

if (isset($_GET["id"])) {

    $productId = $_GET["id"];

    $query = "DELETE FROM `product` WHERE `product_id` = " . $productId . "";

    $isDelete = mysqli_query($connection, $query);

    if ($isDelete) {
        //echo 'user Delect Succsess !';
        header("Location: ../adminPanel_Products.php?msg=Remove Successful !");
        die();
    } else {
        //echo 'error';
        header("Location: ../adminPanel_Products.php?msg=Error, Remove UnSuccessful !");
        die();
    }
}
?>