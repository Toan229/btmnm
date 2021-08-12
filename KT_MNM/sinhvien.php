<?php 
    session_start();
    include "./connnectDatabase.php";
    $tendn = null;
    $sql = "select * from lop";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                height: 100vh;
                display: flex;
                align-items: center;
                justify-self: center;
                flex-direction: column;
            }
            table{
                width: 90%;
                border: 1px solid black;
                border-collapse: collapse;
            }
            td{
                text-align: center;
                border: 1px solid black;
            }
            div{
                margin-bottom: 10px;
            }
        </style>

    </head>
    <body>
        
        <div>
            <h3>Xin chào, <?php echo  $_SESSION['user'] ?></h3>
            <a href="./logout.php">Đăng xuất</a>
        </div>       
        <table>
            <tr>
                <th style="width:20%">Mã lớp</th>
                <th style="width:30%">Mã môn</th>
                <th style="width:20%">Tổng số lượng sinh viên</th>
                <th style="width:20%">Số lượng sinh viên đăng kí</th>
                <th>Đăng kí</th>
            </tr>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                <tr>
                    <td style="width:20%"><?php echo $row['malop'] ?></td>
                    <td style="width:30%"><?php echo $row['mamon'] ?></td>
                    <td style="width:20%"><?php echo $row['soluongsv'] ?></td>
                    <td style="width:20%"><?php echo $row['soluongdk'] ?></td>
                    <td><a href="./dangkimon.php?tendn=<?php echo  $_SESSION['user'] ?>&mamon=<?php echo $row['mamon'] ?>">Đăng kí</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </body>
</html>