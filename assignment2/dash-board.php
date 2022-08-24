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
    include './template/dash-board-body.php';
    // !body
    
    include './php/siteStatus.php';

    // Javascript
    include './template/js.php';
    // !Javascript

    // Footer
    include './template/footer-admin.php';
    // Footer
?>

<script>
    active('home-nav', 'white');
</script>