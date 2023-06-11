<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$host = "localhost";
$username = "root";
$passwd = "ass34";
$dbname = "imagescave_db";
$port = "3307";

$connection = new mysqli($host, $username, $passwd, $dbname, $port);

if ($connection->connect_error) {
    echo 'Error !, Not Connected' 
    . $connection->connect_error;
} else {
    //echo "conected Successfully";
}
?>