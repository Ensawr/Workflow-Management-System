<?php 

    $host = "localhost";
    $database = "WMS";
    $user = "root";
    $pass = "";

    $conn = new mysqli($host,$user,$pass,$database);
    mysqli_set_charset($conn,"uft8");