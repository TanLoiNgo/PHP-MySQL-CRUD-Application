
<body>
    <div id="dash-board">
        <h1>Welcome back <?php echo $_SESSION['username'];?>!</h1>
        <div>
            <a  class="black-btn" href="view-item-admin.php?cat-id=all">Items</a>
            <a class="black-btn" href="category-admin.php">Categories</a>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <button class="black-btn" name="submit">Site Status: <?php echo getData($db_con, 'system')[0]['status']?></button>
            </form>
            
        </div>
    </div>
