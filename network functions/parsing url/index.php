<?php

// встроенные функц.для разбора url
//1 распарсим url исх. 2 - получен. запроса в виде массива перем. 3 манипул. с arr 4 - заново соберём запрос query  из массива в стр. п.29
//5 исп. массив arr  п.8 добавляет сходный адрес и доб. изменённый запрос. echo 34
    $url = 'http://myrusakov.ru/abc.html?id=7&page=8&x=9';
    echo $url.'<br />';
    $arr = parse_url($url); // функ.возвр.массив данных url
    print_r($arr); //echo Array
/*(
    [scheme] => http
    [host] => myrusakov.ru
    [path] => /abc.html
    [query] => id=7&page=8&x=9
)*/
//$_SERVER ['QUERY_STRING'];//строка запроса
    echo '<br />';
    //функция преобр.массива в строку
    parse_str($arr['query'], $query); // обратная функция http_build_query кот. разбирает url на запчасти и записывает в  массив  query (id=7&page=8&x=9) т.е. то, что будет распарсено. echo Array
/*(
    [id] => 7
    [page] => 8
    [y] => 10 */
    // с помощью query можно добавить новый get парам. или удал.
    $query['y'] = 10; // добавление парам.
    unset($query['x']); // удаление парам.
    print_r($query);
    echo '<br />';
    // теперь нужно у добавить в url 
    $query = http_build_query($query); // функция собирает массив в стр.  
    echo $query.'<br />'; // echo запрос query id=7&page=8&y=10 
    // обработка стр. для редиректа к прим.
    $url = $arr['scheme'].'://'.$arr['host'].$arr['path'].'?'.$query; // scheme'- протокол, '?' - новый массив перем. 
    echo $url.'<br />'; // echo >http://myrusakov.ru/abc.html?id=7&page=8&y=10
?>