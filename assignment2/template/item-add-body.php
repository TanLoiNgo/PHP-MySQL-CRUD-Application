<?php include './database/database.php';
$category1 = mysqli_query($db_con, "SELECT * FROM category");
?>
<body>
<div class="form-container">
    <h1>Add New Item.</h1>

    <form action="./php/add-item.php" method="post" enctype="multipart/form-data">

        <input class="input-shape" maxlength="100" type="text" required name="title" placeholder="Tittle"/>
        <p>Max length 100</p>
        <br>
        <textarea class="input-shape" maxlength="255" type="text" placeholder="Description" required
                  name="description"></textarea>
        <p>Max length 255</p>
        <br>
        <select class="input-shape" name="category" required>
            <?php foreach ($category1 as $key => $value) { ?>
                <?php echo $value["name"]; ?>
                <option value="<?php echo $value["cat_id"]; ?>"><?php echo $value["cat_id"] . "-" . $value["name"]; ?></option>

            <?php }; ?>
        </select>
        <p>Select a category</p>
        <br>
        <input type="radio" name="status" value="SHOW" required>
        <p1 for="SHOW">SHOW</p1>
        <input type="radio" name="status" value="HIDE" required>
        <p1 for="HIDE">HIDE</p1>
        <p>Choose status</p><br>
        <select class="input-shape" name="front_page" required>
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select>
        <p>Choose front page</p><br>
        <input type="text" class="input-shape" required name="price" placeholder="Price"/>
        <br>
        <input type="file" class="input-shape" name="uploadImage" id="uploadImage"/>
        <br>
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
        <p>Picture Library: </p>
        <input class="submitBtn" type="submit" name="btnSubmit" value="Save Change" id="btnSubmit">
        <a class="cancel" href="./view-item-admin.php?cat-id=all">Cancel</a>

    </form>
</div>
</body>

