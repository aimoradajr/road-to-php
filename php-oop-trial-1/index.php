https://www.codeofaninja.com/2014/06/php-object-oriented-crud-example-oop.html

<?php
    // for pagination
    include_once "config/core.php";

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

<?php
    $page_url = "index.php";
    $total_product_rows = $product->totalRows();

    include "paging.php";

    include_once "view_products.template.php";

    include "paging.php";

    include_once "footer.php";
?>