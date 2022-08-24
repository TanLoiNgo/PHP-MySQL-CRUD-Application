<?php
function get($name, $def=''){
    return $_REQUEST[$name] ?? $def;
}

function check_access(){
    if(!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']){
        header('location: ../index.php');
    }
}

function check_offline($db_con){
    if(getData($db_con, 'system')[0]['status'] == 'ONLINE'){
        return false;
    } else {
        return true;
    }
}

function getData($db_con, $table){

    $query = "SELECT * FROM $table";

    $dataArray = array();

    $result = mysqli_query($db_con , $query);

    while($row = mysqli_fetch_assoc($result)){
        $dataArray[] = $row;
    }
    return $dataArray;
}

function getItemByCategory($db_con, $cat_id){
    $result = array();
    $items = getData($db_con, 'items');
    
    foreach($items as $item){
        if($item['cat_id'] == $cat_id){
            $result[] = $item;
        }
    }

    return $result;
}

function changePassword($db_con, $oldPassword, $newPassword, $username, $accounts){
    $id = null;
    foreach($accounts as $account){
        if($account['password'] == $oldPassword && $account['username'] == $username){
            $id = $account['id'];
        break;
        }
    }
    if($id == null){
        $output = "Password is incorrect!";
    } else {
        $sql = "UPDATE `members`
        SET 
            `password` = '$newPassword'
        WHERE
            `members`.`id` = $id;";
        mysqli_query($db_con, $sql);
        $output = "Change sucessfull!";
    }
    return $output;
}

function modifyCategory($db_con, $id, $name, $desc, $status){

    if($id == null){
        $output = "Cannot find category.";
    } else {
        $sql = "UPDATE `category`
        SET 
            `name` = '$name',
            `description` = '$desc',
            `status` = '$status'
        WHERE
            `category`.`cat_id` = $id;";
        mysqli_query($db_con, $sql);
        $output = "Change sucessfull!";
    }
    return $output;

}

function getUserName($accounts){

    //get full name of user
    foreach($accounts as $account){
        if($account['username'] == $_SESSION['username']){
            $name = $account['first_name'] .' '. $account['last_name'] ;
        break;
        }
    }

    return $name;
}

function login($listAccInfo,$username, $password){
    for($i = 0; $i < count($listAccInfo); $i++){

        if($listAccInfo[$i]['username'] == $username && $listAccInfo[$i]['password'] == $password){
            $_SESSION['user_logged_in'] = true;
            $_SESSION['username'] = $username;
            return true;
        break;
        }else {
            $_SESSION['user_logged_in'] = false;
        }

    }
    return false;
}

function addCategory($db_con, $name, $desc, $status){
    if($db_con != null){
        $sql = "INSERT INTO `category` (`cat_id`, `name`, `description`, `status`) VALUES (NULL, '$name', '$desc', '$status');";
        mysqli_query($db_con, $sql);
        return "Add Successfull";
    }
    return "Cannot add category.";
}

function getNumerOfItem($db_con, $id)
{

    if($db_con != null){
        $sql = "SELECT c.cat_id, count(*) AS 'total' FROM category c JOIN items i ON c.cat_id = i.cat_id  WHERE c.cat_id = $id GROUP BY c.cat_id";
        $result = mysqli_query($db_con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $dataArray[] = $row;
        }
        if($dataArray[0]['total'] == null){
            return $dataArray[0]['total'] = 0;
        }
        return $dataArray[0]['total'];
    }
    return "UNKNOWN";
}

function setSiteStatus($db_con){
    $status = getData($db_con, 'system');
    $changedStatus = null;
    if($status[0]['status'] == "OFFLINE"){
        $changedStatus = "ONLINE";
    } else {
        $changedStatus = "OFFLINE";
    }

    $sql = "UPDATE `system` SET `status` = '$changedStatus' WHERE `system`.`id` = 1";

    mysqli_query($db_con, $sql);
}

function increaseView($db_con, $id){
    $items = getData($db_con, 'items');
    $store = null;
    foreach($items as $item){
        if($item['id'] == $id){
            $store = $item;
        }
    }

    $count = $store['view'];

    ++$count;

    $sql = "UPDATE `items` SET `view` = '$count' WHERE `items`.`id` = $id";

    mysqli_query($db_con, $sql);
}
?>