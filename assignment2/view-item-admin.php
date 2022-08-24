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


     if(!check_offline($db_con)){
     //view item function
     include './php/view-item.php';
     //!view item function
     
 
     // navigation
     include './template/nav-logout.php';
     // !navigation

     // View Item Body
     include './template/body-view-item-admin.php';
     // !View Item Body

    // Footer section 
    include './template/footer-admin.php';
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
   
    

