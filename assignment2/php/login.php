<?php
    session_start();
    include './functions.php';
    include '../database/database.php';

    $listAccInfo = getData($db_con, 'members');


    if(login($listAccInfo, get('username'), get('password'))){
        header('location: ../dash-board.php');
    } else {
        header('location: ../index.php');
    }

    
?>