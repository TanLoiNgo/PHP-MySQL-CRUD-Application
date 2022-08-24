<?php

    session_start();
    include 'php/functions.php';
    check_access();

    //category
    include './php/category.php';
    //!category

    // navigation
    include './template/nav-logout.php';
    // !navigation

    //Search body
    include './template/search-body-admin.php';
    //!Search body

    // Javascript
    include './template/js.php';
    // !Javascript

    //footer section
    include './template/footer-admin.php';
    //!footer section 
?>

<script>
    active('search-nav', 'white');
</script>

