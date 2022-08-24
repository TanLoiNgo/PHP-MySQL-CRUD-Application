<?php
    session_start();
    include './php/functions.php';
    check_access();

    //database
    include './database/database.php';
    //!database

    //Run Change Password
    include './php/changePassword.php';
    //!Run Change Password
    
    //category
    include './php/category.php';
    //!category

    // navigation
    include './template/nav-logout.php';
    // !navigation

    // account body
    include './template/account.php';
    // !account body

    // Javascript
    include './template/js.php';
    // !Javascript

    // Footer
    include './template/footer-admin.php';
    // Footer 
?>

