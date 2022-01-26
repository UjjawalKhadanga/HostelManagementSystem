<?php
    // SQL Connetion

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hms_database";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>   