<?php
    //require_once 'lib/user_class.php';
    //require_once 'lib/point_class.php';
    
    /*function __autoload($classname) { 
        require_once "lib/{$classname}_class.php"; //названия классов должны совпадать с назв.файлов
    }*/
    echo get_include_path (); // текущая дир.
    set_include_path(get_include_path().PATH_SEPARATOR.'core'.PATH_SEPARATOR.'lib'); // PATH_SEPARATOR- ; 
    spl_autoload_extensions('_class.php'); //расширение имен файлов
    spl_autoload_register();
    $user = new User(); //с помощью function__autoload даже не подк.require_once п.2,3 можно вывести класс. имя класса должно совпадать с назв.файла
    echo $user->name.'<br />';
    
    $c = new Circle();
    echo $c->r;
?>