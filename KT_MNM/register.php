<?php 
    include "./connnectDatabase.php";
    $user = null;
    $pass = null;
    $errtext = null;
    if(isset($_POST['submit']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "insert into taikhoan(tendn, matkhau, loaitk) values('$user', '$pass', 0);";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            $errtext = "Tên đăng nhập đã tồn tại";
        }else{
            echo "<script type='text/javascript'>alert('Tạo tài khoản thành công !');
                window.location='login.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            form{
                background-color: #EAEAEA;
                border: 1px solid black;
                padding: 20px;
                width: 30%;
                height: 50%;
                display: flex;
                flex-direction: column;
            }
            h1{
                text-align: center;
            }
            input{
                margin: 10px 20px;
                height: 40px;
            }
            div{
                margin-left: 20px;
            }
            .submit{
                margin: 10px 20px;
                margin-top: 30px;
                height: 30px;
                cursor: pointer;
            }
            .error{
                color: red;
            }
        </style>
    </head>

    <body>
        <form method="POST">
            <h1>Đăng kí tài khoản</h1>
            <div>Tên đăng nhập</div>
            <input type="text" placeholder="Tên đăng nhập" name="username" value="<?php echo $user ?>" required>
            <div>Mật khẩu</div>
            <input type="password" placeholder="Mật khẩu" name="password"  value="<?php echo $pass ?>" required>
            <div class="error"><?php echo $errtext ?></div>
            <button name="submit" class="submit">Đăng kí</button>
            <div><a href="login.php">Đăng nhập</a></div>
        </form>
    </body>
</html>