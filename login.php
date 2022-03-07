<?php
    session_start();
    require __DIR__ . '/class/Autoloader.php';
    Autoloader::register();

    ob_start();

    if(isset($_POST['username']) || isset($_POST['password'])){
        $tabRes=(new magic\Logger())->log(htmlspecialchars($_POST['username']),htmlspecialchars($_POST['password']));
        if($tabRes['granted']){
           $_SESSION['login']=htmlspecialchars($_POST['username']);
           header('Location:index.php');
           exit();
        }
        else {
            echo "<div>".$tabRes['error']."</div>";
            (new \magic\Logger())->generateLoginForm('login.php');
        }

    }else{
        (new \magic\Logger())->generateLoginForm('login.php');
    }

    $content=ob_get_clean();
    \magic\Template::render($content);


