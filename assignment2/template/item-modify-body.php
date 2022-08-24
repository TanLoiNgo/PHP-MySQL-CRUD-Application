<?php include './database/database.php';
$category1 = mysqli_query($db_con, "SELECT * FROM category");
$pictures = mysqli_query($db_con, "SELECT * FROM `item_Pictures` WHERE `id` = " . $item["id"]);

if (!empty($pictures) && !empty($pictures->num_rows)) {
    while ($row = mysqli_fetch_array($pictures)) {

        $item['libraryPictures'][] = array(
            'id' => $row['id'],
            'pictures' => $row['pictures']
        );
    }
}

?>
<body>
<div class="form-container">
    <h1>Modify Item: <?php echo $item["title"]; ;?></h1>

    <form action="./php/modify-item.php?id=<?php echo $item["id"]; ?>" method="post" enctype="multipart/form-data"
          id="form-addItem">
        <input class="input-shape" maxlength="100" type="text" required name="title" placeholder="Tittle"
               value="<?php echo $item["title"]; ?>"/>
        <p>Max length 100</p>
        <br>

        <textarea class="input-shape" maxlength="255" type="text" placeholder="Description"
                  value="<?php echo $item["description"]; ?>" required
                  name="description"><?php echo $item["description"]; ?></textarea>
        <p>Max length 255</p>
        <br>


        <select name="category" class="input-shape" required>
            <?php foreach ($category1 as $key => $value) { ?>
                <?php echo $value["name"]; ?>
                <option value="<?php echo $value["cat_id"]; ?>" <?php if($item['cat_id']== $value["cat_id"]){ echo "selected";}?> > <?php echo $value["cat_id"] . "-" . $value["name"]; ?></option>

            <?php }; ?>
        </select>
        <p>Select a category</p>
        <br>
        <input type="radio" name="status" value="SHOW" <?php if($item['status']=="SHOW"){ echo "checked";}?> required>
        <p1 for="SHOW">SHOW</p1>
        <input type="radio" name="status" value="HIDE" <?php if($item['status']=="HIDE"){ echo "checked";}?> required>
        <p1 for="HIDE">HIDE</p1>
        <p>Choose status</p><br>
        <select class="input-shape" name="front_page" required>
            <option value="YES" <?php if($item['front_page']=="YES"){ echo "selected";}?>>YES</option>
            <option value="NO" <?php if($item['front_page']=="NO"){ echo "selected";}?>>NO</option>
        </select>
        <p>Choose front page</p><br>
        <input type="text" class="input-shape" required name="price" id="left-col-1" placeholder="Price"
               value="<?php echo $item["price"]; ?>"/>
        <br>
        <div class="wrap-field">
            <?php if (!empty($item['picture'])) { ?>
                <img src="<?= $item['picture'] ?>" /><br/>
                <input type="hidden" name="image" value="<?= $item['picture'] ?>" />
            <?php } ?>
            <input type="file" class="input-shape"  name="uploadImage" id="left-col-1" id="uploadImage"/>
            <br>
            <p>Avatar </p><br>
        <?php if (!empty($item['libraryPictures'])) {  ?>
                <?php foreach ($item['libraryPictures'] as $image) { ?>
                        <img src="<?= $image['pictures'] ?>"/>
                <?php } ?>
        <?php } ?>
        </div>
        <input type="file" class="input-shape" name="pictures[]" multiple="multiple" id="picLibrary"/>

        <script>
            var limit = 5;
            $(document).ready(function(){
                $('#picLibrary').change(function(){
                    var files = $(this)[0].files;
                    if(files.length > limit){
                        alert("You can select max "+limit+" images.");
                        $('#picLibrary').val('');
                        return false;
                    }else{
                        return true;
                    }
                });
            });
        </script>
        <br>
        <p>Picture Library </p>


        <input class="submitBtn" type="submit" name="btnSubmit" value="Save Change" id="btnSubmit">
        <a class="cancel" href="./view-item-admin.php?cat-id=all">Cancel</a>

    </form>
</div>
</body>

