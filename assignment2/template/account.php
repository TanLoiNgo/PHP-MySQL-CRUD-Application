<body>
    <div id="AccountInfo">
        <h1>Account infomation.</h1>
        <div>
            <div></div>
            <h3>User Name: <?php echo $_SESSION['username'];?></h3>
            <br>
            <p>Change password</p>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="changePassword">
            <input class="input-shape" type="password" name="oldPassword" id="oldPassword" placeholder="Old Password" require>
            <input class="input-shape" type="password" name="newPassword" id="newPassword" placeholder="New Password" require>
            <input class="submitBtn" type="submit" id="submitPassword" name="submitChangePassword" value="Change password">
        </form>
        <div class="red"><?php echo $output?></div>
    </div>
    
</body>
</html>