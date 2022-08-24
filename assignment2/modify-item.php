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

    //view item function
    include './php/view-item.php';
    //!view item function

    $itemList = viewItem();

    $item_id = $_GET['item-id'] ?? '1';
    
    foreach($itemList as $item):
    if($item_id == $item["id"]):
?>
    

    
<?php
    // body
    include './template/item-modify-body.php';
    // !body
    endif;
endforeach;
?>

<?php 
    // Footer
    include './template/footer-admin.php';
    // Footer
?>