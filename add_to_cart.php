<?php
session_start();
    require __DIR__ . '/class/Autoloader.php';
    Autoloader::register();

    if(isset($_SESSION['login'])){
            $tabCard=array();
            for($i=0;$i<count($_POST['ListeCart']);$i++){
                $tabCard[$i]=$_POST['ListeCart'][$i];
            }

            (new \magic\Cart())->add($tabCard);
            header("Location: cart.php");
            exit();
    }
    header("Location:index.php");
    exit();