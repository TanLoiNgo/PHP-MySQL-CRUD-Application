<body>
    <div class="form-container">
        <h1>Modify Category: <?php echo $category["name"];?></h1>
        <form action="<?php echo $_SERVER['PHP_SELF']. '?id=' .$category["cat_id"]; ?>" method="post">
            <input type="hidden" name="cat_id" value="<?php echo $category["cat_id"];?>">
            <input class="input-shape" maxlength="100" type="text" name="categoryTitle" placeholder="Title" value="<?php echo $category["name"];?>">
            <p>Max length 100</p>
            <br>
            <input class="input-shape" maxlength="255" type="text" name="categoryDescription" placeholder="Description" value="<?php echo $category["description"];?>">
            <p>Max length 255</p>
            <br>
            <input type="radio" name="status" value="SHOW" required>
            <label for="SHOW">Show</label>
            <input type="radio" name="status" value="HIDE" required>
            <label for="HIDE">Hide</label>
            <br>
            <input class="submitBtn" type="submit" name="submit" value="Save Changes">
            <a class="cancel" href="./category-admin.php">Cancel</a>
            <br>
            <br>
            <h5 class="red"><?php echo $output?></h5>
        </form>
    </div>
</body>

