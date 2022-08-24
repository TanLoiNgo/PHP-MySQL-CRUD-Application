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

    // Add category
    include './php/add-category.php';
    //! Add category

    // navigation
    include './template/nav-logout.php';
    // !navigation

    // body
    include './template/category-add-body.php';
    // !body
    
    // Javascript
    include './template/js.php';
    // !Javascript

    // Footer
    include './template/footer-admin.php';
    // Footer 
?>
    
