<?php
if(isset($_POST['submitChangePassword'])){
    $account = getData($db_con, 'members');
    $output = changePassword($db_con, get('oldPassword'),get('newPassword'),$_SESSION['username'], $account);
}
?>