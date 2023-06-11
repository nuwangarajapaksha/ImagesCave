<?php

session_start();
if (isset($_SESSION["Buyer_is_Login"])) {
    if ($_SESSION["Buyer_is_Login"] != true) {
        header("Location: buyer_Login.php");
        die();
    }
} else {
    header("Location: buyer_Login.php");
    die();
}
$_SESSION["Buyer_is_Login"] = false;
header("Location: buyer_Login.php");
session_destroy();
?>
