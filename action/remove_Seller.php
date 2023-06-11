<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DB_Conn.php';

$sellerId = "";

if (isset($_GET["id"])) {

    $sellerId = $_GET["id"];

    $query = "DELETE FROM `seller` WHERE `seller_id` = " . $sellerId . "";

    $isDelete = mysqli_query($connection, $query);

    if ($isDelete) {
        //echo 'user Delect Succsess !';
        header("Location: ../adminPanel_Sellers.php?msg=Remove Successful !");
        die();
    } else {
        //echo 'error';
        header("Location: ../adminPanel_Sellers.php?msg=Error, Remove UnSuccessful !");
        die();
    }
}
?>