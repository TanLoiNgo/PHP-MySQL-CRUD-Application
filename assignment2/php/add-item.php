<?php
session_start();
include '../database/database.php';
include './functions.php';

//$items = mysqli_query($db_con, "SELECT * FROM items");

$picture_file = "../assets/img/" . basename($_FILES["uploadImage"]["name"]);
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

        if (basename($_FILES["uploadImage"]["name"]) != '') {
            $picture_file = "../assets/img/" . basename($_FILES["uploadImage"]["name"]);
            move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $picture_file);
        }

        //var_dump($_FILES);


        if (isset($_FILES["uploadImage"])) {
            $filename = $_FILES["uploadImage"]["name"];
            $filetype = $_FILES["uploadImage"]["type"];
            $validTypes = array("jpg", "jpeg", "png", "bmp", "jfif");
            $ext = substr($filename, strrpos($filename, ".") + 1);
            if (!in_array($ext, $validTypes)) {
                $picture_file = "assets/img/default.jpg";
            } else {
                $picture_file = "assets/img/" . basename($_FILES["uploadImage"]["name"]);

            }
        }
        $sql = "Insert Into `items`  (`title`, `description`, `price`, `cat_id`, `status`, `front_page`, `picture`) VALUES ('$title','$description','$price','$category','$status','$front_page','$picture_file')";

        $query = mysqli_query($db_con, $sql);


        if (isset($_FILES["pictures"])) {
            $files = $_FILES["pictures"];
            $file_names = $files["name"];
            if (!empty($file_names[0])) {
                foreach ($file_names as $key => $value) {
                    move_uploaded_file($files['tmp_name'][$key], "../assets/img/" . $value);
                }
                $picture_id = mysqli_insert_id($db_con);
                foreach ($file_names as $key => $value) {
                    $value = "assets/img/" . $value;

                    mysqli_query($db_con, "Insert Into `item_Pictures` (`id`, `pictures`) VALUES ('$picture_id','$value')");
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