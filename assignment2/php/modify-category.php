<?php

if(isset($_POST['submit'])){

    $output = modifyCategory($db_con, get('cat_id'), get('categoryTitle'), get('categoryDescription'), get('status'));

        
}

?>