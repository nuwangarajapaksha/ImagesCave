<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './DB_Conn.php';

$visitorName = "";
$scDetails = "";

if (isset($_POST["visitorName"]) && isset($_POST["scDetails"])) {

    $visitorName = $_POST["visitorName"];
    $scDetails = $_POST["scDetails"];


    $query = "INSERT INTO `s&c`(`s&c_visitor_name`,`s&c_details`) VALUES ('" . $visitorName . "','" . $scDetails . "')";

    $isSaved = mysqli_query($connection, $query);

    if ($isSaved) {
        header("Location: ../suggestions_Complaints.php?msgSent=Successfully Sent ");
        die();
    } else {
        header("Location: ../suggestions_Complaints.php?msgSent=Not Sent ");
        die();
    }
}
?>

