<?php
    session_start();
    if(!empty($_SESSION['login'])){
        session_destroy();
        header('Location:index.php');
        exit();
    }
    header('Location:index.php');