<?php
session_start();
// <!-- --------------Xử lí dữ liệu NewFeed------------------ -->
$connect = mysqli_connect('localhost', 'root', '', 'sparkdata');
$sql_post = "SELECT * FROM postdata ";
$sql_post_result = mysqli_query($connect, $sql_post);
$new_feed = mysqli_num_rows($sql_post_result);
//--------------- Truy vấn người dùng hiện tại -----------------
$current_user = $_SESSION['current_user'];
//------------- Lấy thông tin người dùng hiện tại ---------------
$sql_user_info = "SELECT * FROM userdata where username='$current_user' ";
$info_result = mysqli_query($connect, $sql_user_info);
$user_info = mysqli_fetch_array($info_result);
//----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ------------------ Upload Post --------------------------------
    if ($_POST["content-upload"] != '') {
        $content = $_POST["content-upload"];
        $upload_directory = __DIR__ . DIRECTORY_SEPARATOR . "uploads/";
        $temp_name = $_FILES["file-upload"]["tmp_name"];
        $temp_file_extension = pathinfo($temp_name, PATHINFO_EXTENSION);
        $new_name = $_FILES["file-upload"]['name'];
        move_uploaded_file($temp_name, $upload_directory . $new_name);

        //upload dữ liệu lên database

        $user_name = $user_info['username'];
        $date = date('Y-m-d H:i:s');;
        $db = mysqli_connect('localhost', 'root', '', 'sparkdata');
        $sql = "INSERT INTO postdata (id,user_name,time_post,post_text, post_img) VALUES (NULL, '$user_name', '$date', '$content', 'uploads/$new_name')";
        mysqli_query($db, $sql);
        header("Location: homepage.php");
    }
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
    <link rel="stylesheet" href="./css/homepage.css">
</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="./img/Spark-logos_transparent.png" alt="Logo" class="logo">
            <ul>
                <li><img src="./img/SourceHomePage/notification.png"></li>
                <li><img src="./img/SourceHomePage/inbox.png"></li>
                <li><img src="./img/SourceHomePage/video.png"></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="seach-box">
                <div class="ui left icon input">
                    <input type="text" placeholder="Search users...">
                    <i class="users icon"></i>
                </div>
            </div>
            <div class="nav-user-icon online" onclick="settingMenuToggle()">
                <img src="<?php echo $user_info['avatar']; ?>">
            </div>
            <!-- settings-menu-->
            <div class="settings-menu">
                <div class="settings-mennu-inner">
                    <div class="user-profile">
                        <img src="<?php echo $user_info['avatar']; ?>">
                        <div>
                            <p><?php echo $user_info['name']; ?></p>
                            <a href="profile.php">See your profile</a>
                        </div>
                    </div>
                    <hr>
                    <div class="user-profile">
                        <img src="./img/SourceHomePage/feedback.png">
                        <div>
                            <p>Give Feedback</p>
                            <a href="#">Help us to improve the new design</a>
                        </div>
                    </div>
                    <hr>
                    <div class="settings-links">
                        <img src="./img/SourceHomePage/setting.png" class="settings-icon">
                        <a href="#">Setting & Privacy</a><img src="./img/SourceHomePage/arrow.png" width="10px">
                    </div>
                    <div class="settings-links">
                        <img src="./img/SourceHomePage/help.png" class="settings-icon">
                        <a href="#">Help & Support</a><img src="./img/SourceHomePage/arrow.png" width="10px">
                    </div>
                    <div class="settings-links">
                        <img src="./img/SourceHomePage/logout.png" class="settings-icon">
                        <a href="log_out.php">Logout</a><img src="./img/SourceHomePage/arrow.png" width="10px">
                    </div>
                </div>
            </div>
    </nav>

    <div class="container">
        <!-- left-sidebar -->
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="#"><img src="./img/SourceHomePage/news.png">Latest News</a>
                <a href="#"><img src="./img/SourceHomePage/friends.png">Friend</a>
                <a href="#"><img src="./img/SourceHomePage/group.png">Group</a>
                <a href="#"><img src="./img/SourceHomePage/marketplace.png">Market Place</a>
                <a href="#"><img src="./img/SourceHomePage/watch.png">watch</a>
                <a href="#">See More</a>
            </div>
            <div class="shortcut-links">
                <p>Your Shortcuts</p>
                <a href="#"><img src="./img/SourceHomePage/shortcut-1.png">Web Developer</a>
                <a href="#"><img src="./img/SourceHomePage/shortcut-2.png">Web Design Course</a>
                <a href="#"><img src="./img/SourceHomePage/shortcut-3.png">Full Stack</a>
                <a href="#"><img src="./img/SourceHomePage/shortcut-4.png">Website Expert</a>
            </div>
        </div>
        <!-- main-content -->
        <div class="main-content">
            <div class="story-gallery">
                <div class="story story1">
                    <img src="./img/SourceHomePage/upload.png">
                    <p>Post Story</p>
                </div>
                <div class="story story2">
                    <img src="./img/SourceHomePage/member-1.png">
                    <p>A</p>
                </div>
                <div class="story story3">
                    <img src="./img/SourceHomePage/member-2.png">
                    <p>B</p>
                </div>
                <div class="story story4">
                    <img src="./img/SourceHomePage/member-3.png">
                    <p>C</p>
                </div>
                <div class="story story5">
                    <img src="./img/SourceHomePage/member-4.png">
                    <p>D </p>
                </div>
            </div>

            <div class="write-post-container">
                <div class="user-profile">
                    <img src="<?php echo $user_info['avatar']; ?>">
                    <div>
                        <p><?php echo $user_info['name']; ?></p>
                        <small>Public <i class="angle down icon"></i></small>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="post-input-container">
                        <textarea rows="3" placeholder="What's on your mind ?" name="content-upload"></textarea>
                        <div class="add-post-links">
                            <div>
                                <label for="file" class="ui icon button">
                                    <i class="camera icon"></i>
                                    Camera</label>
                                <input type="file" id="file" name="file-upload" style="display:none">
                            </div>
                            <input type="submit" class="ui green button" value="Post" style="margin-left: 20px;" onclick="location.reload()">
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if ($new_feed) {
                while ($new_feed = mysqli_fetch_array($sql_post_result)) {
                    $post_name = $new_feed['user_name'];
                    $sql_post_user = "SELECT * FROM userdata where username='$post_name' ";
                    $post_user_info = mysqli_query($connect, $sql_post_user);
                    $post_info = mysqli_fetch_array($post_user_info);
                    echo '<div class="post-container"><div class="post-row"><div class="user-profile"><img src="' . $post_info['avatar'] . '"><div><p>' . $post_info['name'] . '</p><span>' . $new_feed['time_post'] . '</span></div></div><a href="#"><i class="align justify icon"></i></a></div><p class="post-text">' . $new_feed['post_text'] . '</p><img src="' . $new_feed['post_img'] . '" class="post-img"><div class="post-row"><div class="activity-icons"><div><img style=" cursor: pointer;" id="like-button-' . $new_feed['id'] . '" src="./img/SourceHomePage/like.png" onclick="changeLike(' . $new_feed['id'] . ')">' . $new_feed['count_like'] . '</div><div><img src="./img/SourceHomePage/comments.png">' . $new_feed['count_comment'] . '</div><div><img src="./img/SourceHomePage/share.png">' . $new_feed['count_share'] . '</div></div><div class="post-profile-icon"><img src="' . $user_info['avatar'] . '"></div></div><div><div id="comment-field"><p>Hoang Phuoc : AAAA</p></div><div class="ui icon input" style="padding-top: 30px; width: 102%; "><input type="text" placeholder="Type something ....." style="margin-right:20px"><button class="circular ui icon button" type="submit" style="  background: #38d39f;"><i class="angle right icon"></i></button></div></div></div>';
                }
            };

            ?>

        </div>
        <!-- right-sidebar -->
        <div class="right-sidebar">
            <div class="sidebar-title">
                <h4>Event</h4>
                <a href="#">See All</a>
            </div>
            <div class="event">
                <div class="left-event">
                    <h3>18</h3>
                    <span>March</span>
                </div>
                <div class="right-event">
                    <h4>Social Media</h4>
                    <p><i class="location arrow icon"></i>Izumi Park</p>
                    <a href="#">More Info</a>
                </div>
            </div>
            <div class="sidebar-title">
                <h4>Advertisement</h4>
                <a href="#">Close</a>
            </div>
            <img src="./img/SourceHomePage/advertisement.png" class="sidebar-ads">
            <div class="sidebar-title" id="title">
                <h4>Conversation</h4>
                <a href="#" onclick="hideChat()">Hide Chat</a>
            </div>
            <div id="chatbox" style="padding-bottom: 20px;">
                <?php
                $sql_chat = "SELECT * FROM userdata";
                $chat_result = mysqli_query($connect, $sql_chat);
                $count_chat = mysqli_num_rows($chat_result);
                if ($count_chat) {
                    while ($chatbox = mysqli_fetch_array($chat_result)) {
                        echo '<div class="online-list"><div class="online"><img src="' . $chatbox['avatar'] . '"></div> ' . $chatbox['name'] . '</p></div>';
                    }
                };
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Copyright 2021 - Spark Social Network</p>
    </div>
    <script src="./js/homepage.js"></script>

</body>

</html>