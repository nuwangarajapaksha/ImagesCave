<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DB_Conn.php';

$buyerId = "";

if (isset($_GET["id"])) {

    $buyerId = $_GET["id"];

    $query = "DELETE FROM `buyer` WHERE `buyer_id` = " . $buyerId . "";

    $isDelete = mysqli_query($connection, $query);

    if ($isDelete) {
        //echo 'user Delect Succsess !';
        header("Location: ../adminPanel_Buyers.php?msg=Remove Successful !");
        die();
    } else {
        //echo 'error';
        header("Location: ../adminPanel_Buyers.php?msg=Error, Remove UnSuccessful !");
        die();
    }
}
?>
