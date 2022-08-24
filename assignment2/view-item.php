<?php

    include './php/functions.php';

    //database
    include './database/database.php';
    //!database
    
    if(!check_offline($db_con)){
        //category
        include './php/category.php';
        //!category

        //view item function
        include './php/view-item.php';
        //!view item function
        
        // navigation
        include './template/nav.php';
        // !navigation
    
        // login form
        include './template/login-form.php';
        // !login form

        // View Item Body
        include './template/body-view-item.php';
        // !View Item Body

        
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



<script>
    active('item-nav', 'white');
    var id = "<?php echo $_GET['cat-id']; ?>";
    active(id, 'black');
</script>
    

