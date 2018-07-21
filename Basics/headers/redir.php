<?php
require_once 'inc.php';
//header('Content-Type: text/html; charset=utf-8');
header('Content-Type: text/plain; charset=utf-8');
//список mime-типов
//перед скач.должен быть редирект на данный скрипт
header('Content-Disposition: attachment; filename="downloaded.txt"');
readfile('text.txt');
die;
//header('HTTP/1.0 304 Not Modified');
//header('Location: inc.php'); // редирект на страницу 
//header('Location: http://expange.ru/'); редирект на сайт
//header('refresh: 5; url=inc.php');
//exit;
//die;
?>



