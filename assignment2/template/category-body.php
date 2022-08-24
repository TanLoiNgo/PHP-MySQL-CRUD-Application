<?php
    $itemList = viewItem();
    $count = 0;
?>

<body>
    <div id="category-admin">
        <h1>Categories</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th> 
                <th>Status</th>
                <th>Number of Items</th>
                <th>Action</th>
            </tr>
            <?php foreach($categoryList as $category){
                    foreach($itemList as $item){
                        if($category["name"] == $item["category"]){
                            $count++;
                        }
                    }?>
                <tr>
                <td><?php echo $category["name"];?></td>
                <td><?php echo $category["description"];?></td> 
                <td><?php echo $category["status"];?></td> 
                <td><?php echo getNumerOfItem($db_con, $category["cat_id"]);?></td>
                <td><a href="modify-category.php?id=<?php echo $category["cat_id"];?>">Modify</a></td>
                </tr>
            <?php $count = 0;
                };?>
        </table>
        <a href="add-category.php">Add New Category</a>
    </div>
