<body>
    <div class="form-container">
        <h1>Add New Category</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input class="input-shape" maxlength="100" type="text" name="categoryTitle" placeholder="Category Title">
            <p>Max length 100</p>
            <br>
            <input class="input-shape" maxlength="255" type="text" name="categoryDescription" placeholder="Category Description">
            <p>Max length 255</p>
            <br>
            <input type="radio" name="status" value="SHOW" required>
            <label for="SHOW">Show</label>
            <input type="radio" name="status" value="HIDE" required>
            <label for="HIDE">Hide</label>
            <br>
            <input class="submitBtn" type="submit" name="submit" value="Add Category">
            <a class="cancel" href="./category-admin.php">Cancel</a>
            <br>
            <br>
            <h5 class="red"><?php echo $output;?></h5>
        </form>
    </div>

