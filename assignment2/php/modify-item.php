<?php
session_start();
include '../database/database.php';
include './functions.php';


$id = $_GET['id'];
$items = mysqli_query($db_con, "SELECT * FROM items WHERE `id` = " . $id);
$data = mysqli_fetch_assoc($items);

$item_Pictures = mysqli_query($db_con, "SELECT * FROM `item_Pictures` WHERE `id` = " . $id);

$file_name = "assets/img/" . basename ($_FILES["uploadImage"]["name"]);
$title = get('title');
$description = get('description');
$category = get('category');
$price = get('price');
$status = get('status');
$front_page = get('front_page');

if (get('title') != '' && get('description') != '' && get('category') != '' && get('price') != '') {

    if (!is_numeric($price)) {
        echo '<script>
            alert("Item added unsuccessfully. Please enter digits for price!!");
            window.location.href="../add-item.php";
            </script>';
    } else {
        if (isset($_FILES["uploadImage"])) {
            $file = $_FILES["uploadImage"];
            $file_name = $file['name'];
            $file_type = $file['type'];
            //var_dump($file_name);die();
            if (empty($file_name)) {
                $file_name = $data['picture'];
            } else {
                if ($file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/bmp' || $file_type == 'image/jfif') {
                    move_uploaded_file($file["tmp_name"], "../assets/img/" . $file_name);
                    $file_name = "assets/img/" . $file_name;

                } else {
                    $file_name = "assets/img/default.jpg";
                }
            }
            $sql = " UPDATE `items` SET `title` ='" . $title . "',`description`= '" . $description . "',`price`= " . $price . ",`cat_id` = " . $category . ", `status` = '" . $status . "', `front_page` = '" . $front_page . "', `picture` = '" . $file_name . "' where `id`=" . $_GET['id'];
            $query = mysqli_query($db_con, $sql);

        }
        if (isset($_FILES["pictures"])) {
            $files = $_FILES["pictures"];
            $file_names = $files["name"];
            if(!empty($file_names[0])){
                mysqli_query($db_con, "DELETE FROM `item_Pictures` Where id=".$id);
                foreach ($file_names as $key => $value) {
                    move_uploaded_file($files['tmp_name'][$key], "../assets/img/" . $value);
                }
                foreach ($file_names as $key => $value) {
                    $value= "assets/img/".$value;
                    mysqli_query($db_con, "Insert Into `item_Pictures` (`id`, `pictures`) VALUES ('$id','$value')");
                }
            }
        }



        header('location: ../view-item-admin.php?cat-id=all');
        echo '<script language="javascript">';
        echo 'alert("Item added successfully")';
        echo '</script>';

    }

}

?>

