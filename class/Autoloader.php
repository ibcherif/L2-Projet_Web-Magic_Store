<?php


class Autoloader
{
    public static function autoload($className){
        $className=str_replace('\\',DIRECTORY_SEPARATOR,$className);
        require $className.'.php';
    }

    public static function register(){
        spl_autoload_register(array(__CLASS__ ,'autoload'));
    }
}