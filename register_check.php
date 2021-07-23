<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["name"] && $_POST["username"] && $_POST["password"] && $_POST["re-password"] && $_POST["dayofbirth"] != '') {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["re-password"];
        $dateofbirth = $_POST["dayofbirth"];
        if ($password != $repassword) {
            header('location: register.php');
        }
        $db = mysqli_connect('localhost', 'root', '', 'sparkdata');
        $sql = "select * from userdata  where username = '$username' and password ='$password' ";
        // echo $sql; exit;

        $rs = mysqli_query($db, $sql);

        if (mysqli_num_rows($rs) > 0) {
            header('location: register.php');
        } else {
            $sql = "INSERT INTO userdata (id,username,password,name,day_of_birth,avatar) VALUES (NULL, '$username', '$password', '$name', '$dateofbirth','img/useravatar.png')";
            mysqli_query($db, $sql);
            header("Location: login.php");
        }
    } else {
        header('location: register.php');
    }
}
