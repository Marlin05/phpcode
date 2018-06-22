<?php
//на серъезн.сайтах эти константы обычно расп.в отдельных файлах
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '33');
    define('DB_NAME', 'mysite');
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // @ оператор откл.ош.
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');// св-во connect_errno - если есть ош - выход 
    $mysqli->set_charset('utf8'); 
    
    $mysqli->close();
?>