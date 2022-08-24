<?php include './database/database.php';
$categoryList = mysqli_query($db_con, "SELECT * FROM category");
$itemList_Sql = mysqli_query($db_con, "SELECT * from items i, category cat where i.cat_id = cat.cat_id and cat.status like 'SHOW'");
$itemList = array();
while ($row1 = mysqli_fetch_array($itemList_Sql)) {
    $itemList[] = $row1;
}

?>
<div id="item">
    <div id="sideCategory">
        <h1>Categories</h1>
        <div>
            <?php foreach ($categoryList as $category) { ?>
                <a href="./view-item.php?cat-name=<?php echo $category["name"]; ?>"
                   id="<?php echo $category["name"]; ?>"><?php echo $category["name"]; ?></a>
            <?php }; ?>
        </div>
    </div>

    <div>
        <div>
            <h1 id="h1-Search">Search for <?php if (!empty($_GET['search'])) {
                    echo $_GET['search'];
                } ?></h1>
            <form id="search-form" action="search.php" method="get" enctype="multipart/form-data">
                <input type="text" id="search" name="search" placeholder="Search..." class="input-shape">
                <input type="submit" id="btnSearch" name="btnSearch" value="Search" class="submitBtn">
            </form>
        </div>

        <?php
        if (isset($_GET['btnSearch'])) {
            ?>
            <?php
            $searchThis = $_GET['search'];
            $breakStrings = explode(' ', $searchThis);
            if (!empty($searchThis)) {
                $count = 0;

                for ($i = 0; $i < count($itemList); $i++) {
                    for ($split = 0; $split < count($breakStrings); $split++) {
                        $title = strtolower($itemList[$i]['title']);
                        $description = strtolower($itemList[$i][2]);
                        $searchText = strtolower($breakStrings[$split]);
                        if (strpos($title, $searchText) !== false or strpos($description, $searchText) !== false) {

                        $count++;
                            ?>

                            <div>
                                <div class="itemList_search">
                                    <div>
                                        <img src="<?php echo $itemList[$i]['picture']; ?>">
                                    </div>
                                    <div class="item-text">
                                        <h2><?php echo $itemList[$i]['title']; ?></h2>
                                        <p><?php echo $itemList[$i][2]; ?></p>
                                        <h3>Price: <?php echo $itemList[$i]['price']; ?> </h3>
                                        <div class="wrap-field1">
                                            <?php
                                            $itemList1 = array();
                                            $pictures = mysqli_query($db_con, "SELECT * FROM `item_Pictures` where  id =" . $itemList[$i]['id']);
                                            if (!empty($pictures) && !empty($pictures->num_rows)) {
                                                while ($row = mysqli_fetch_array($pictures)) {
                                                    $itemList1[] = $row;
                                                }
                                            }
                                            if (!empty($itemList1)) { ?>
                                                <?php foreach ($itemList1 as $image) { ?>
                                                    <img src="<?= $image['pictures'] ?>"/>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php break;
                        }
                    }
                }
                if ($count == 0) {
                    ?>
                    <br><?php echo "<p class='red'>Can not find the item, change the keyword and try again</p>"; ?><?php
                }

            } else { ?>
                <br><?php echo "<p class='red'>Please Enter keywords.</p>"; ?><?php
            }
        } ?>
    </div>
</div>
