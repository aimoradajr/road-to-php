<?php
    define('DB_SERVER','localhost');
    define('DB_USERNAME','temptemp');
    define('DB_PASSWORD', 'temptemp');
    define('DB_DATABASE', 'logintest');

    $dbconn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if($dbconn->connect_error)
    {
        die('Failed to connect to DB. error: ' . $dbconn->connect_error);
    }
?>