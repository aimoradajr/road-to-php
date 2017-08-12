<?php
// for pagination
    $page = isset($_GET['page'])? $_GET['page']: 1;
    $records_per_page = 3;
    $record_num_start = ($records_per_page*$page) - $records_per_page;
?>