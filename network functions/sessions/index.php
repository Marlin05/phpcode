<?php
    //<?php должен быть в нач.без отступов, либо error

// сессии хранятся на сервере. подходят для хранения инфо о корзине, авторизации
// время сесси настр. в php ini 
    session_start(); // формирует id сессии, кот. сохр. в куки и сохр. у польз.
    $counter = $_SESSION['counter']?? 0; // если сессия сущ. то пом. в пер. counter, либо 0  т.е. она нач. с 0
    $counter++;
    // для объявл. перем.исп.массив SESSION. как только она уст. не нужно заново обн.стр. как с уст.куки.
    $_SESSION['counter'] = $counter; // записываем counter в сессию
    print_r($_COOKIE);// echo где в конце- [PHPSESSID] => id сессии hbhlc7di8r737rek3h1n40nu63 ) 6  - строка id как польз. и кол.сессий.
    //unset($_SESSION['counter']); // очистить опер.память.   дейст. и для куки
    echo $counter;
?>