<html>
    <head>
        <title>Forma</title>
    </head>
    <body>
        <div>
            <?php
                echo 'my name is ' . $_POST["name"] . '<br/>';
    
                echo 'php_self ' . htmlspecialchars($_SERVER['PHP_SELF']) . '<br/>';

                echo 'cleaned name is ' . cleanInput($_POST['name']) . '<br/>';

                if($_SERVER['REQUEST_METHOD'] == 'POST')
                    echo 'POST ito boi <br/>'; 
            ?>
        </div>
    </body>
</html>



<?php

function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>