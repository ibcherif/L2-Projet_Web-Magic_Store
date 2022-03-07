<?php
     require __DIR__ . '/class/Autoloader.php';
     Autoloader::register();
     use magic\Browser;
     ob_start();
    ?>
    <div>Please <a href="login.php">login</a> to shop</div>
<?php
    (new Browser())->generateCards();

    $content=ob_get_clean();
    \magic\Template::render($content);
