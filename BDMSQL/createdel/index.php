<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysite');
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');
    
    $mysqli->query('CREATE DATABASE `database`'); // обратные ков.чтобы можно было использ.зарез.имена
    $mysqli->query('DROP DATABASE `database`'); // del
    $mysqli->query('DROP DATABASE `text`');
    
    $mysqli->close();
?>