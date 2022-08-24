<?php

    $itemList = getData($db_con, 'items');
?>
<body>
    <div id="item">
        <div id="sideCategory">
            <h1>Categories</h1>
            <div>
                <?php foreach($categoryList as $category){?>
                <a href="./view-item-admin.php?cat-id=<?php echo $category["cat_id"];?>" id="<?php echo $category["cat_id"];?>"><?php echo $category["name"];?></a>
                <?php };?>
            </div>
        </div>

    <?php
        foreach($itemList as $item){
            if($item['id'] == get('id')){?>
                    <div class="itemList">
                        <div><img src="<?php echo $item['picture']?>" alt="<?php echo $item['title']?>"></div>
                        <div class="item-text">
                            <h3><?php echo $item['title']?></h3>
                            <p><?php echo $item['description']?></p>
                            <h4>Price: $<?php echo $item['price'] ?></h4>
                            <h3>Total View: <?php echo $item['view'] ?></h3>
                        </div>
                    </div>
            <?php }
        }
    ?>
    </div>
</body>

