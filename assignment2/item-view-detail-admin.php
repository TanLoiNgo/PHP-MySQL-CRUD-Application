<?php

    session_start();
    include 'php/functions.php';
    check_access();

    //database
    include './database/database.php';
    //!database

    //category
    include './php/category.php';
    //!category

    // navigation
    include './template/nav-logout.php';
    // !navigation

    include './template/view-item-detail-admin.php';

    // Footer section 
    include './template/footer-admin.php';
    // !Footer section 

    // Javascript
    include './template/js.php';
    // !Javascript

?>