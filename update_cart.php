<?php
session_start();
require __DIR__ . '/class/Autoloader.php';
Autoloader::register();

if(isset($_POST['update'])){
    $tabCard=array();
        foreach($_SESSION['cart'] as $id=>$val){
            if(isset($_POST[$id])){
                $tabCard[$id]=$_POST[$id];
            }
        }
    (new \magic\Cart())->update($tabCard);
    header("Location: cart.php");
    exit();
}
header("Location: index.php");
exit();