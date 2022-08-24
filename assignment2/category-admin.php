<?php

    session_start();
    include 'php/functions.php';
    check_access();

    //database
    include './database/database.php';
    //!database

    // category
    include './php/category.php';
    //!category

    //view item function
    include './php/view-item.php';
    //!view item function

    // navigation
    include './template/nav-logout.php';
    // !navigation

    // body
    include './template/category-body.php';
    // !body

    // Javascript
    include './template/js.php';
    // !Javascript

    // Footer
    include './template/footer-admin.php';
    // Footer
?>