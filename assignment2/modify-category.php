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

    //Run Mofidy Function
    include './php/modify-category.php';
    //!Run Modify Function

    $category_id = $_GET['id'] ?? '1';
    foreach($categoryList as $category):
    if($category_id == $category["cat_id"]):
?>
    

    
<?php
    // body
    include './template/category-modify-body.php';
    // !body
    endif;
endforeach;
?>

<?php 
    // Footer
    include './template/footer-admin.php';
    // Footer
?>