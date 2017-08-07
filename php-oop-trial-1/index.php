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
    $ret = $product->readPart($record_num_start,$records_per_page);

    6.6 Display data from the database naaaa


    $page_title = "Read Products";
    include_once "header.php";
?>

<div class='right-button-margin'>
    <a href='create_product.php' class='btn btn-default pull-right'>Create Product</a>
</div>

<?php
    include_once "footer.php";
?>