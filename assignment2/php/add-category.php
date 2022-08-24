<?php

    if(isset($_POST['submit'])){
        $output = addCategory($db_con, get('categoryTitle'), get('categoryDescription'), get('status'));
    }

?>