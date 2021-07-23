<?php include '../StarkProject/layout/login-header.php' ?>
<?php include '../StarkProject/register_check.php' ?>
<div class="login-content">
    <form method="POST">

        <img src="img/avatar.svg">
        <h2 class="title">Register</h2>
        <div class="input-div one">
            <div class="i">
                <i class="fas fa-user"></i>
            </div>
            <div class="div">
                <h5>Name</h5>
                <input type="text" name="name" class="input">
            </div>
        </div>
        <div class="input-div one">
            <div class="i">
                <i class="fas fa-user"></i>
            </div>
            <div class="div">
                <h5>Email</h5>
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
        <div class="input-div pass">
            <div class="i">
                <i class="fas fa-lock"></i>
            </div>
            <div class="div">
                <h5>Confirm </h5>
                <input type="password" name="re-password" class="input">
            </div>
        </div>
        <div class="input-div pass">
            <div class="i">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div>
                <h5>Day of birth </h5>
                <input type="text" name="dayofbirth" class="input">
            </div>
        </div>
        <div>
            <div>
                <input type="submit" class="btn" value="Register">
    </form>
</div>
</div>
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>