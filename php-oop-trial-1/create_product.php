<?php
    // db
    include_once "config/database.php";
    include_once "objects/product.php";
    include_once "objects/category.php";

    // setup connection. notenote: i use mysqli
    $db = new Database();
    $dbconn = $db->getConnection();

    // pass db connection to objects
    $product = new Product($dbconn);
    $category = new Category($dbconn);

    $page_title = 'Create Product Beybe';
    include_once "header.php";


    // create product form submitted
    if($_POST)
    {
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->description = $_POST['description'];
        $product->category_id = $_POST['category_id'];
        
        // create the product
        if($product->create()){
            echo "<div class='alert alert-success'>Product was created.</div>";
        }

        // if unable to create the product, tell the user
        else{
            echo "<div class='alert alert-danger'>Unable to create product.</div>";
        }
    }

?>

<div class='right-button-margin'>
    <a href='index.php' class='btn btn-default pull-right'>Read Products</a>
</div>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>

        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>

        <tr>
            <td>Category</td>
            <td>
            <!-- categories from database will be here -->
            <?php
                $cat_rows = $category->read();

                echo "<select class='form-control' name='category_id'>";
                    echo "<option>Select category...</option>";
                
                    while($row = $cat_rows->fetch_assoc())
                        echo "<option>".$row['name']."</option>";

                echo '</select>';
            ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>

    </table>
</form>

<?php
    include_once "footer.php";
?>