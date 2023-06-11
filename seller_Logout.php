<?php

session_start();
if (isset($_SESSION["Seller_is_Login"])) {
    if ($_SESSION["Seller_is_Login"] != true) {
        header("Location: seller_Login.php");
        die();
    }
} else {
    header("Location: seller_Login.php");
    die();
}
$_SESSION["Seller_is_Login"] = false;
header("Location: seller_Login.php");
session_destroy();
?>


