<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './DB_Conn.php';

$scId = "";

if (isset($_GET["id"])) {

    $scId = $_GET["id"];

    $query = "DELETE FROM `s&c` WHERE `s&c_id` = " . $scId . "";

    $isDelete = mysqli_query($connection, $query);

    if ($isDelete) {
        //echo 'user Delect Succsess !';
        header("Location: ../adminPanel_S&C.php?msg=Remove Successful !");
        die();
    } else {
        //echo 'error';
        header("Location: ../adminPanel_S&C.php?msg=Error, Remove UnSuccessful !");
        die();
    }
}
?>