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
    $product->id = $_GET['id'];
    $product->readOne();
?>

<div class='right-button-margin'>
    <a href='index.php' class='btn btn-default pull-right'>Read Products</a>
</div>

<table class='table table-hover table-responsive table-bordered'>
 
    <tr>
        <td>Name</td>
        <td><?php echo $product->name ?></td>
    </tr>
 
    <tr>
        <td>Price</td>
        <td><?php echo "&#36;" . $product->price ?></td>
    </tr>
 
    <tr>
        <td>Description</td>
        <td><?php echo $product->description ?></td>
    </tr>
 
    <tr>
        <td>Category</td>
        <td>
            <?php
                // display category name
                $category->setID($product->category_id);
                echo $category->name;
            ?>
        </td>
    </tr>
 
</table>

<?php
    include_once "footer.php";
?>