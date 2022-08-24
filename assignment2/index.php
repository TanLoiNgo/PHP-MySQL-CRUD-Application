

<?php
    include './php/functions.php';
    //database
    include './database/database.php';

    //!database
    if(!check_offline($db_con)){
        //category
        include './php/category.php';
        //!category

        // navigation
        include './template/nav.php';
        // !navigation

        // login form
        include './template/login-form.php';
        // !login form

        //title section
        include './template/title-section.php';
        //!title section

        //fashion section
        include './template/fashion.php';
        //!fashion section

        //technology section
        include './template/technology.php';
        //!technology section

        //watch section
        include './template/watch.php';
        //!watch section

        
        //footer section
        include './template/footer.php';
        //!footer section 
    } else {
        include '../assignment2/template/offline.html';
    }
    
    // Javascript
    include './template/js.php';
    // !Javascript

?>

<script>
    active('home-nav', 'white');
</script>
