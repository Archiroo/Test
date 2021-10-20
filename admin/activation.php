<?php
    $email = $_GET['email'];
    $code = $_GET['code'];

    include('../config/connect.php');
    $sql = "SELECT * FROM db_user WHERE user_email='$email' AND user_code = '$code'";
    $res = mysqli_query($con, $sql);

    if(mysqli_num_rows($res) > 0){
        
        $sql2 = "UPDATE db_user SET status=1 WHERE user_email = '$email'";
        $res2 = mysqli_query($con, $sql2);
        if($res2>0)
        {
            header("Location:return.php");
        }
        else
        {
            echo 'Không thể kích hoạt tài khoản';
        }
    }
        

?>