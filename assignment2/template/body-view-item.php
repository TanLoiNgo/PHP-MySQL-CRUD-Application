<?php
    include './database/database.php';
    $categoryList = getData($db_con, 'category');
    
    $itemList = viewItem_status();

    $itemListCategory = viewItemCategory_status($_GET['cat-id']);


    if($_GET['cat-id'] == 'all'){
        $total_records = sizeof($itemList);
    } else {
        $total_records = sizeof($itemListCategory);
    }


    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

?>

<body>
<div id="item">
    <div id="sideCategory">
        <h1>Categories</h1>
        <div>
            <?php foreach($categoryList as $category){?>
                <?php if($category['status'] == 'SHOW'){?>
                    <a href="./view-item.php?cat-id=<?php echo $category["cat_id"];?>" id="<?php echo $category["cat_id"];?>"><?php echo $category["name"];?></a>
                <?php } ?>
            <?php };?>
        </div>
    </div>
<div>
    <h1>Items</h1>
    <div>
        <?php  for ($i= $start; $i< ($limit * $current_page); $i++){
            if($i < $total_records){
                if(isset($_GET['cat-id']) && !empty($itemList[$i])){
                    if($_GET['cat-id'] == 'all'){?>
                        <div class="itemList">
                            <div>
                                <img src="<?= $itemList[$i]['picture'] ?>"
                                        alt="<?php echo $itemList[$i]['title']; ?>">

                            </div>
                            <div class="item-text">
                                <h2><a href="./item-view-detail.php?id=<?php echo $itemList[$i]['id'] ?>"><?php echo $itemList[$i]['title'] ?></a></h2>
                                <p><?php echo $itemList[$i][2] ?></p>
                                <?php $categoryList = mysqli_query($db_con, "SELECT * FROM category where cat_id=".$itemList[$i]['cat_id']); ?>
                                <?php foreach ($categoryList as $key => $value) {
                                    ?>

                                    <h3><?php echo $value["name"]; ?></h3> 

                                <?php }; ?>
                                <h4>Price: $<?php echo $itemList[$i]['price'] ?></h4>
                                <div class="pictures">
                                    <?php
                                    $q1 = "SELECT * FROM `item_Pictures` where `id` = " . $itemList[$i]['id'];
                                    $pic_Query = mysqli_query($db_con, $q1);
                                    $item_Pictures = array();

                                    while ($row1 = mysqli_fetch_array($pic_Query)) {
                                        $item_Pictures[] = $row1;
                                    }
                                    foreach ($item_Pictures as $v) {
                                        ?>
                                        <img src="<?= $v['pictures'] ?>" width="100px" height="150px">

                                    <?php } ?>

                                </div>

                            </div>
                        </div>
                    <?php }
                    }
                } else { break;}
        };?> 
    </div>

    <div>
        <?php  for ($i= $start; $i< ($limit * $current_page); $i++){
            if($i < sizeof($itemListCategory) && !empty($itemListCategory)){
                if(isset($_GET['cat-id'])){?>
                    <div class="itemList">
                            <div>
                                <img src="<?php echo $itemListCategory[$i]['picture'] ?>"
                                        alt="<?php echo $itemListCategory[$i]['title'] ?>">
                            </div>
                            <div class="item-text">
                                <h2><a href="./item-view-detail.php?id=<?php echo $itemListCategory[$i]['id'] ?>"><?php echo $itemListCategory[$i]['title'] ?></a></h2>
                                <p><?php echo $itemListCategory[$i][2] ?></p>
                                <?php $categoryList = mysqli_query($db_con, "SELECT * FROM category where cat_id=".$itemListCategory[$i]['cat_id']); ?>
                                <?php foreach ($categoryList as $key => $value) {
                                    ?>

                                    <h3><?php echo $value["name"]; ?></h3>

                                <?php }; ?>
                                <h4>Price: $<?php echo $itemListCategory[$i]['price'] ?></h4>

                                <div class="pictures">
                                    <?php
                                    $q1 = "SELECT * FROM item_Pictures ip, items i  WHERE ip.id =" . $itemListCategory[$i]['id'] . " and i.id= " . $itemListCategory[$i]['id'] . " and i.cat_id =  " . $itemListCategory[$i]['cat_id'];

                                    $pic_Query = mysqli_query($db_con, $q1);
                                    $item_Pictures = array();

                                    while ($row1 = mysqli_fetch_array($pic_Query)) {
                                        $item_Pictures[] = $row1;
                                    }
                                    foreach ($item_Pictures as $v) {
                                        ?>
                                        <img src="<?= $v['pictures'] ?>" width="100px" height="150px">

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                <?php }
                } else { break;}
        };?> 
    </div>





            <div class="pagination">
                <?php
                $pageCat = isset($_GET['cat-id']) ? $_GET['cat-id'] : 'all';
                // if current_page > 1 and total_page > 1, prev will be showed
                if ($current_page > 1 && $total_page > 1){
                    echo '<a href="./view-item.php?cat-id='.$pageCat.'&page='.($current_page-1).'">&laquo;</a> ';
                }
                for ($i = 1; $i <= $total_page; $i++){
                    // If it is current_page, shows span tag
                    // otherwise, shows tag <a>
                    if ($i == $current_page){
                        echo '<a class="active">'.$i.'</a> ';
                    }
                    else{
                        echo '<a href="./view-item.php?cat-id='.$pageCat.'&page='.$i.'">'.$i.'</a> ';
                    }
                }

                // if current_page < $total_page and total_page > 1, Next will be showed
                if ($current_page < $total_page && $total_page > 1){
                    echo '<a href="./view-item.php?cat-id='.$_GET['cat-id'].'&page='.($current_page+1).'">&raquo;</a> ';
                }
                ?>
            </div>
        </div>
       
    </div>

 
</body>

