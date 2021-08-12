<?php 
    include "./connnectDatabase.php";
    $user = $_GET['tendn'];
    $malop = $_GET['malop'];
    $sql = "insert into taikhoan_lop(tendn, malop) values('$user', '$malop');";
    $result = mysqli_query($conn, $sql);
    $sql = "update lop set soluongdk = soluongdk + 1";
    mysqli_query($conn, $sql);
    header("Location:dangkimon.php");
?>