<?php
//варианты отправок заголовок клиенту
    //header('Location: /a.php'); //функция позволяет отправить серверу заголовок либо через echo либо за пределали кода
    //exit;
//2 основных функции исп. - редирект и запрет на кеширование. Редирю- заголовок Location, где необх.указать url либо путь к файлу. можно ук. полный url ('Location: https://google.ru');
//всегда после редиректа еужно делать exit; or die;

//2 вариант исп.функц header - запрет кеширования с помощью заголовков. все 6 строк явл. обяз. все это носит рекоменд.характер т.е. брауз.все ровно может кеш.
    
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT');
    header('Cache-Control: no-cache, must-revalidate');
    header('Cache-Control: post-check=0,pre-check=0', false);
    header('Cache-Control: max-age=0', false);
    header('Pragma: no-cache');
    
    print_r(getallheaders()); // получить все заголовки, кот.прислал клиент
?>