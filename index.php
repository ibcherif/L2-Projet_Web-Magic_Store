<?php
    session_start();
    require __DIR__.'/class/Autoloader.php';
    Autoloader::register();

    ob_start();
    ?>
            <?php if(!empty($_SESSION['login'])):?>
                <h1 style="margin:auto;">Hi <?=$_SESSION['login']?>, </h1>
            <?php endif; ?>
            <div class="title">WELCOME TO THE MAGIC STORE</div>
            <img src="images/MagicLogo4.png" id="imgIndex">

    <?php

    $content=ob_get_clean();
    \magic\Template::render($content);
