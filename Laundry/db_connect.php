<?php
    session_start();

    // Database connection start 
    $host = "localhost";    // Host name
    $user = "root";         // User
    $password = "";         // Password
    $dbname = "laundry";     // Database name

    // Create connection
    $con = mysqli_connect($host, $user, $password,$dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>