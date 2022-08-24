<?php
$db_con = mysqli_connect('localhost', 'root', '', 'assignment2db');

if(mysqli_connect_errno() > 0){
    die('Cannot connect to database' . mysqli_connect_error());
}
