<?php

    include './php/functions.php';

    //database
    include './database/database.php';
    //!database

    //category
    include './php/category.php';
    //!category
    if(!check_offline($db_con)){
        // navigation
        include './template/nav.php';
        // !navigation

        include './template/view-item-detail.php';

        // Footer section 
        include './template/footer.php';
        // !Footer section 

    } else {
        include './template/offline.html';
    }
            // Javascript
            include './template/js.php';
            // !Javascript
?>