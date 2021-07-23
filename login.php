<?php include '../StarkProject/layout/login-header.php' ?>
<div class="login-content">
    <form method="POST">

        <img src="img/avatar.svg">
        <h2 class="title">Welcome</h2>
        <div class="input-div one">
            <div class="i">
                <i class="fas fa-user"></i>
            </div>
            <div class="div">
                <h5>Username</h5>
                <input type="text" name="username" class="input">
            </div>
        </div>
        <div class="input-div pass">
            <div class="i">
                <i class="fas fa-lock"></i>
            </div>
            <div class="div">
                <h5>Password</h5>
                <input type="password" name="password" class="input">
            </div>
        </div>

        <a href="#">Forgot Password?</a>
        <input type="submit" class="btn" value="Login">
        <?php include "login_check.php" ?>
    </form>
</div>
</div>
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>