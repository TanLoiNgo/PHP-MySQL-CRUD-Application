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

    // body
    include './template/item-add-body.php';
    // !body

    // Footer
    include './template/footer-admin.php';
    // Footer
?>
