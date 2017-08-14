<?php
    $page_title = "Update Product";
    include_once "header.php";
?>

<?php
    $id = isset($_GET['id'])? $_GET['id'] : die('error. missing ID');

    include_once "config/database.php";
    include_once "objects/product.php";
    include_once "objects/category.php";

    $db = new Database();
    $dbconn = $db->getConnection();

    $product = new Product($dbconn);
    $category = new Category($dbconn);
    
    $product->id = $id;
?>

<?php
    // process form post
    if($_POST)
    {
        $product->name = $_POST['name'];
        $product->description = $_POST['description'];
        $product->price = $_POST['price'];
        $product->category_id = $_POST['category_id'];

        // the image
        $image = !empty($_FILES['image']['name']) ? sha1_file($_FILES['image']['tmp_name']) . '-' . basename($_FILES['image']['name'])  : "";
        $product->image = $image;

        if($product->update())
        {
            echo 'successfully updated.';
            echo $product->uploadPhoto();
        }
        else
        {
            echo 'failed to update';
        }
    }
?>

<?php
    $product->id = $_GET['id'];
    $product->readOne();
?>

<div class='right-button-margin'>
    <a href='index.php' class='btn btn-default pull-right'>Read Products</a>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$product->id}");?>" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $product->name; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' value='<?php echo $product->price; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Image</td>
            <td><input type="file" name="image"/></td>
        </tr>

        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo $product->description; ?></textarea></td>
        </tr>
 
        <tr>
            <td>Category</td>
            <td>
                <!-- categories select drop-down will be here -->
                <?php
                    $cat_rows = $category->read();

                    echo "<select class='form-control' name='category_id'>";
                        echo "<option>Select category...</option>";
                    
                        while($row = $cat_rows->fetch_assoc())
                        {
                            if($row['id']==$product->category_id)
                                echo "<option value='{$row['id']}' selected>".$row['name']."</option>";
                            else
                                echo "<option value='{$row['id']}'>".$row['name']."</option>";
                        }

                    echo '</select>';
                ?>
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
    include_once "footer.php";
?>