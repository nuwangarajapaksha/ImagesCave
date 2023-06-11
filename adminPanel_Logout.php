<?php

session_start();
if (isset($_SESSION["Admin_is_Login"])) {//check is login already setted(already logedin)
    if ($_SESSION["Admin_is_Login"] != true) {//logged in
        header("Location: ./admin_Login.php");
        die();
    }
} else {
    header("Location: ./admin_Login.php");
    die();
}
$_SESSION["Admin_is_Login"] = false;
header("Location: admin_Login.php");
session_destroy();
?>


