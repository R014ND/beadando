<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "database";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if(!$conn){
    echo 'sql err';
}