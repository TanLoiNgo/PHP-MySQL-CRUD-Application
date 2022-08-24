<?php

 function viewItem(){

     include './database/database.php';
     $query = "SELECT * FROM items ";
     $items = array();
     $result = mysqli_query($db_con, $query);
     while ($row = mysqli_fetch_array($result)){

         $items[] = $row;
     }

     return $items;

}
function viewItem_status(){
    include './database/database.php';
    $query = "SELECT * FROM items i, category cat where i.cat_id = cat.cat_id and cat.status like 'SHOW'";
    $items = array();
    $result = mysqli_query($db_con, $query);
    while ($row = mysqli_fetch_array($result)){
        $items[] = $row;
    }
    return $items;
}
function viewItemCategory_status($category){
    include './database/database.php';
    $query = "SELECT * FROM items i, category cat where i.cat_id = cat.cat_id and cat.status like 'SHOW'";
    $items = array();
    $result = mysqli_query($db_con, $query);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['cat_id'] == $category) {
            $items[] = $row;
        }
    }
    return $items;
}

function viewItemCategory($category){
    include './database/database.php';
    $query = "SELECT * FROM items";
    $items = array();
    $result = mysqli_query($db_con, $query);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['cat_id'] == $category) {
            $items[] = $row;
        }
    }
    return $items;
}
?>