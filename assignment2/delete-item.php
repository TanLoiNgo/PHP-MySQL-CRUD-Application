<?php
session_start();
include 'php/functions.php';
include './database/database.php';
check_access();

//view item function
include './php/view-item.php';
//!view item function

$itemList = viewItem();

//$itemListCategory = viewItemCategory($_GET['cat-name']);

$item_id = $_GET['item-id'] ?? '1';

foreach($itemList as $item):
    if($item_id == $item["id"]):

        for($i = 0; $i < count($itemList); $i++){
                if($itemList[$i]['id'] ==  $item_id){
                    //delete a line
                    //var_dump($item_id);die();
                    mysqli_query($db_con, "DELETE FROM item_Pictures Where id=".$item_id  );
                    mysqli_query($db_con, "DELETE FROM items Where id=".$item_id );
            }


        }



    endif;
endforeach;

header('location: ./view-item-admin.php?cat-id=all');
?>
