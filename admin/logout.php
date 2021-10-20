<?php
    // Hủy phiên đăng nhập
    include('../config/connect.php');
    session_destroy();
    header("Location:login.php");
?>