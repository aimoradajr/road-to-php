<form role='search' action='search.php'>
    <div class='input-group col-md-3 pull-left margin-right-1em'>

        <?php 
            $search_value=isset($search_term) ? "value='{$search_term}'" : "";
            echo "<input type='text' class='form-control' placeholder='Type product name or description...' name='s' id='srch-term' required {$search_value} />";
        ?>
         
        <div class='input-group-btn'>
            <button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>
        </div>
    </div>
</form>

<div class='right-button-margin'>
    <a href='create_product.php' class='btn btn-default pull-right'>Create Product</a>
</div>

<div>
    <table class="table table-default table-bordered">
        <thead>
            <th>Image</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Actions</th>
        </thead>
        <tbody>
            <?php while($row = $the_products->fetch_assoc()){
                $category->setID($row['category_id']);

                echo '<tr>';
                echo "<td> <img src='uploads/{$row['image']}' style='height:30px;width:30px' </td>";
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

