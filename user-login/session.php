<?php
    include('dbconfig.php');
    session_start();

    if(!isset($_SESSION['login_user']))
        header('location: login.php');

    $login_user = $_SESSION['login_user'];
    
    $qresult = $dbconn->query("select username from users where username = '$login_user'");

    if($qresult->num_rows > 0)
    {
        $row = $qresult->fetch_assoc();
        //echo 'login user: ' . $row['username'];
    }
    else{
        echo "user: $login_user not found.";
        unset($_SESSION['login_user']);
        header('location: login.php');
    }
?>