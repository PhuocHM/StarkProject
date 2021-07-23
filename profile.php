<?php
session_start();
//--------------- Truy vấn người dùng hiện tại -----------------
$current_user = $_SESSION['current_user'];
//------------- Lấy thông tin người dùng hiện tại ---------------
$connect = mysqli_connect('localhost', 'root', '', 'sparkdata');
$sql_user_info = "SELECT * FROM userdata where username='$current_user' ";
$info_result = mysqli_query($connect, $sql_user_info);
$user_info = mysqli_fetch_array($info_result);
// --------- Edit thông tin user ---------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["new-avatar"]) {
        $upload_directory = __DIR__ . DIRECTORY_SEPARATOR . "uploads/";
        $temp_name = $_FILES["new-image"]["tmp_name"];
        $temp_file_extension = pathinfo($temp_name, PATHINFO_EXTENSION);
        $new_name = $_FILES["new-image"]['name'];
        move_uploaded_file($temp_name, $upload_directory . $new_name);
        $sql_update_image = "UPDATE userdata SET avatar='uploads/$new_name'";
    }
    // ---------
    if ($_POST["new-name"] && $_POST["new-info"] && $_POST["new-address"] && $_POST["new-dob"] && $_POST["new-password"] != '') {
        $new_name = $_POST["new-name"];
        $new_info = $_POST["new-info"];
        $new_address = $_POST["new-address"];
        $new_dob = $_POST["new-dob"];
        $new_password = $_POST["new-password"];
        $sql_update_info = "UPDATE userdata SET name='$new_name', user_info='$new_info', user_address= '$new_address', password='$new_password',day_of_birth= '$new_dob' WHERE username='$current_user'";
        mysqli_query($connect, $sql_update_info);
        //header('Location: profile.php');
    };
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./css/profile.css">
</head>

<body>
    <div class="logo">
        <img src="./img/Spark-logos_transparent.png">
    </div>
    <div class="user-profile" id="user-profile">
        <div class="user-avatar">
            <img src="<?php echo $user_info['avatar']; ?>">
        </div>
        <div class="user-info" id="user-info">
            <h3><?php echo $user_info['name']; ?></h3>
            <span><?php echo $user_info['user_info']; ?></span>
            <span><i class="location arrow icon"></i><?php echo $user_info['user_address']; ?></span>
            <span><i class="calendar alternate icon"></i>
                <?php echo $user_info['day_of_birth'] ?></span>
        </div>
        <div class="user-info-follow" id="display-followers">
            <div class="info-follow">
                <h4><?php echo $user_info['count_followers']; ?></h4>
                <p>Followers</p>
            </div>
            <div class="info-following">
                <h4><?php echo $user_info['count_following']; ?></h4>
                <p>Following</p>
            </div>
            <div class="info-count-post">
                <h4><?php echo $user_info['count_post']; ?></h4>
                <p>Post</p>
            </div>
        </div>
        <div class="user-edit" id="user-edit">
            <input type="button" value="Edit Profile" class="positive ui button" onclick="showEdit()" style="margin-bottom: 30px;">
            <input type="button" value="Return to Homepage" class="negative ui button" style="margin-bottom: 30px;" onclick="returnHomepage()">
        </div>
    </div>
    <div class="user-edit-profile" id="user-edit-profile">
        <form method="POST" style="margin-left:12px" enctype="multipart/form-data">
            <div class="edit-user-info" style=" padding-top:50px">
                <div class="user-avatar-2" style="top: 50px; left:50px">
                    <img src="<?php echo $user_info['avatar']; ?>">
                </div>
                <div class="ui input focus" style="padding-bottom:10px; padding-left:70px; padding-right:50px; padding-top:20px" name="new-name">
                    <label for="file" class="ui icon button">
                        <i class="camera icon"></i>
                        Upload new photo</label>
                    <input type="file" id="file2" name="new-avatar" style="display:none">
                </div><br>
                <div class="ui labeled input" style=" margin-bottom:10px">
                    <div class="ui label" style="width: 100px;">
                        Name
                    </div>
                    <input type="text" name="new-name" value="<?php echo $user_info['name']; ?>">
                </div><br>
                <div class="ui labeled input" style=" margin-bottom:10px">
                    <div class="ui label" style="width: 100px;">
                        Info
                    </div>
                    <input type="text" name="new-info" value="<?php echo $user_info['user_info']; ?>">
                </div><br>
                <div class="ui labeled input" style=" margin-bottom:10px">
                    <div class="ui label" style="width: 100px;">
                        Address
                    </div>
                    <input type="text" name="new-address" value="<?php echo $user_info['user_address']; ?>">
                </div><br>
                <div class="ui labeled input" style=" margin-bottom:10px">
                    <div class="ui label" style="width: 100px;">
                        Day of birth
                    </div>
                    <input type="text" name="new-dob" value="<?php echo $user_info['day_of_birth']; ?>">
                </div><br>
                <div class="ui labeled input" style=" margin-bottom:10px">
                    <div class="ui label" style="width: 100px;">
                        Password
                    </div>
                    <input type="text" name="new-password" value="<?php echo $user_info['password']; ?>">
                </div><br>
            </div>
            <input type="submit" value="Submit" class="positive ui button" style="margin-top: 30px;margin-left:50px"> <input type="button" value="Cancel" class="negative ui button" style="margin-bottom: 30px;" onclick="location.reload()">
        </form>
    </div>
    <script>
        function returnHomepage() {
            window.location = "homepage.php";
        }

        function showEdit() {
            document.getElementById('user-profile').style.display = "none";
            document.getElementById('user-edit-profile').style.display = "block";
        }
    </script>

</body>

</html>