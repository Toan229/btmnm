<?php
    $hostname = "localhost";
    $database = "dangkihp";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if(!$conn)
    {
        die("<script>alert('Kết nối thất bại.')</script>");
    }
?>