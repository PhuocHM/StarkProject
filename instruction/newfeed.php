<?php

$conn = mysqli_connect('localhost', 'root', '', 'sparkdata');
$sql = "SELECT * FROM postdata ";
$result = mysqli_query($conn, $sql);
//Truy vấn người dùng hiện tại
$sql2 = "SELECT * FROM login_user ";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
$row2 = $row2['user'];
//Lấy thông tin người dùng hiện tại
$sql3 = "SELECT * FROM userdata where username='$row2' ";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3);

//----------------------------
$row = mysqli_num_rows($result);

if ($row) {
    while ($row = mysqli_fetch_array($result)) {
        $post_name = $row['user_name'];
        $sqll = "SELECT * FROM userdata where username='$post_name' ";
        $result4 = mysqli_query($conn, $sqll);
        $row4 = mysqli_fetch_array($result4);
        echo '<div class="post-container"><div class="post-row"><div class="user-profile"><img src="' . $row3['avatar'] . '"><div><p>' . $row['user_name'] . '</p><span>' . $row['time_post'] . '</span></div></div><a href="#"><i class="align justify icon"></i></a></div><p class="post-text">' . $row['post_text'] . '</p><img src="' . $row['post_img'] . '" class="post-img"><div class="post-row"><div class="activity-icons"><div><img src="./img/SourceHomePage/like-blue.png">' . $row['count_like'] . '</div><div><img src="./img/SourceHomePage/comments.png">' . $row['count_comment'] . '</div><div><img src="./img/SourceHomePage/share.png">' . $row['count_share'] . '</div></div><div class="post-profile-icon"><img src="' . $row3['avatar'] . '"></div></div></div>';
    }
};
echo '<pre>';
print_r($row4);
echo '</pre>';


//
