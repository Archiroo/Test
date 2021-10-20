<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <title>SIGN UP</title>
</head>

<body>
    <div class="login">

        <form action="" method="POST" class="register">
            <h3>SIGN UP</h3>
            <div class="form-group">
                <span>User name:</span>
                <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="form-group">
                <span>User email:</span>
                <input type="text" class="form-control" placeholder="Enter your email" name="useremail">
            </div>
            <div class="form-group">
                <span>Password</span>
                <input type="password" class="form-control" placeholder="Enter your password" name="pass1">
            </div>
            <div class="form-group">
                <span>Confirm password</span>
                <input type="password" class="form-control" placeholder="Confirm password" name="pass2">
            </div>
            <div class="them">
                <a href="login.php" class="btn btn_cancel">Cancel</a>
                <input type="submit" name="submit" value="Create" class="btn btn_create">
            </div>
        </form>
    </div>
</body>
<?php
    
    if(isset($_POST['submit']))
    {
        include('send.php');
        $user = $_POST['username'];
        $email = $_POST['useremail'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        $connect = mysqli_connect('localhost', 'root', '', 'directory');
        $sql = "SELECT * FROM db_user WHERE user_name='$user' and user_email ='$email' ";
        $res = mysqli_query($connect, $sql);
        if(mysqli_num_rows($res) > 0)
        {
            echo "Email đã tồn tại";
        }
        else
        {
            if($pass1==$pass2)
            {
                $code = md5(uniqid(rand(), true));
                $pas_hash = password_hash($pass1, PASSWORD_DEFAULT);
                $sql2 = "INSERT INTO db_user(user_name, user_email, user_pass, user_code) VALUES ('$user', '$email', '$pas_hash', '$code')";
                $res2 = mysqli_query($connect, $sql2);
                if($res2>=1){
                    sendEmail($email, $code);
                }
            }
        }

    }
?>