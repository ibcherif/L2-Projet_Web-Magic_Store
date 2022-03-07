<?php
    session_start();
    require __DIR__ . '/class/Autoloader.php';
    Autoloader::register();
    if(!isset($_SESSION['login'])){
        header('Location:index.php');
    }
    ob_start();
    (new \magic\Cart())->render();
    $content=ob_get_clean();
    \magic\Template::render($content);

