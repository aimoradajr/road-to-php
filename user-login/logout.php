<?php
    include('session.php');

    unset($_SESSION['login_user']);
    if(session_destroy())
        header('location: login.php');
?>