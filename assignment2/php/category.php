<?php
    include './database/database.php';
    $categoryList = mysqli_query($db_con, "SELECT * FROM category");

?>