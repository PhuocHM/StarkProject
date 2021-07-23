<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $database = mysqli_connect('localhost', 'root', '', 'sparkdata');
    $sql = "select * from userdata  where username = '$username' and password ='$password' ";
    // echo $sql; exit;

    $rs = mysqli_query($database, $sql);

    if (mysqli_num_rows($rs) > 0) {
        // Current User
        $_SESSION['current_user'] = $username;
        print_r($_SESSION);
        //
        header("Location: homepage.php");
    } else {
        echo "Tài khoản hoặc mật khẩu không đúng";
    }
}
