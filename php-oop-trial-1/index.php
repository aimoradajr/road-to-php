https://www.codeofaninja.com/2014/06/php-object-oriented-crud-example-oop.html

<?php
    // for pagination
    $page = isset($_GET['page'])? $_GET['page']: 1;
    $records_per_page = 3;
    $record_num_start = ($records_per_page*$page) - $records_per_page;

    // now get data
    include_once 'config/database.php';
    include_once 'objects/product.php';
    include_once 'objects/category.php';

    $db = new Database();
    $dbconn = $db->getConnection();

    $product = new Product($dbconn);
    $category = new Category($dbconn);

    // query the products
    $the_products = $product->readPart($record_num_start,$records_per_page);

    $page_title = "Read Products";
    include_once "header.php";
?>

<div class='right-button-margin'>
    <a href='create_product.php' class='btn btn-default pull-right'>Create Product</a>
</div>

<?php
    $page_url = "index.php";
    $total_product_rows = $product->totalRows();
    include_once "paging.php";
?>

<div>
    <table class="table table-default table-bordered">
        <thead>
            <th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Actions</th>
        </thead>
        <tbody>
            <?php while($row = $the_products->fetch_assoc()){
                $category->setID($row['category_id']);

                echo '<tr>';
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $category->name . "</td>";

                echo '<td>';
                echo "<a href='read_one_product.php?id={$row['id']}' class='btn btn-primary btn-md left-margin'>Read</a>";
                echo "<a href='update_product.php?id={$row['id']}' class='btn btn-info btn-md left-margin'>Edit</a>";
                echo "<a data-id='{$row['id']}' class='btn btn-danger btn-md left-margin delete-btn'>Delete</a>";
                echo '</td>';

                echo '</tr>';
            } 
            ?>
        </tbody>
    </table>
</div>


<?php
    include_once "footer.php";
?>