<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Log-in</title>
</head>

<body>
    <div class="login">
        
        <form action="" method="POST">
            <h3>SIGN IN</h3>
            <span>User Name</span>
            <input type="text" class="box" name="username" placeholder="Enter your username">
            <span>Pass Word</span>
            <input type="password" class="box" name="password" placeholder="Enter your password">
            <input type="submit" value="Login" class="btn" name="submit">
            <p>For get password? <a href="#">Click Here</a></p>
            <p>Don't have an account <a href="sign-up.php">Create One</a></p>
        </form>
    </div>
</body>
</html>
<?php
    // Kiểm tra xem nút login đã ấn hay chưa
    if(isset($_POST['submit']))
    {
        include('../config/connect.php');
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM db_user WHERE user_name='$user'";
        // Thực thi câu lệnh
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);
            $pass_hash = $row['user_pass'];
            if(password_verify($pass, $pass_hash))
            {
                $_SESSION['tengicungduoc'] = $user; // tạo biến đăng nhập
                header("Location:index.php");
            }
            else
            {
                header("Location:login.php");
            }
        }
        else
        {
            header("Location:login.php");
        }

    }

?>
