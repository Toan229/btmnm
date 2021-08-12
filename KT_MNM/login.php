<?php 
    include "./connnectDatabase.php";
    session_start();
    $user = null;
    $pass = null;
    $errtext = null;
        if(isset($_POST['submit']))
        {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $sql = "select * from taikhoan where tendn = '$user' and matkhau = '$pass'";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows > 0)
            {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $row['tendn'];
                $_SESSION['pass'] = $row['matkhau'];
                $errtext = null;
                if( $row['loatk'] == 0)
                    header("Location: sinhvien.php");
                else
                    header("Location:admin.php");
                exit();
            }
            else{
                $errtext = "Tài khoản hoặc mật khẩu sai";
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
            <h1>Đăng nhập</h1>
            <div>Tên đăng nhập</div>
            <input type="text" placeholder="Tên đăng nhập" name="username" value="<?php echo $user ?>" required>
            <div>Mật khẩu</div>
            <input type="password" placeholder="Mật khẩu" name="password"  value="<?php echo $pass ?>" required>
            <div class="error"><?php echo $errtext ?></div>
            <button name="submit" class="submit">Đăng nhập</button>
            <div><a href="register.php">Đăng kí tài khoản</a></div>
        </form>
    </body>
</html>