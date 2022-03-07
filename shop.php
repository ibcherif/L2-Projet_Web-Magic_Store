<?php
session_start();
    require __DIR__ . '/class/Autoloader.php';
    Autoloader::register();
    ob_start();
    if(!isset($_SESSION['login'])){
        header('Location:index.php');
        exit();
    }

    (new \magic\Shop())->generateShop();
    $content=ob_get_clean();
    \magic\Template::render($content);

