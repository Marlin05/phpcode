
<?php

// общение со скриптом script.php:
// 1 часть - инициализация соединения
// 2 часть - отправка всех заголовков
// 3 часть - отправка тела сообщ.
// 4 часть - получение ответа от сервера
//  5 часть - закрытие соединения

// расширение curl упрощает процесс в срвнении с исп. сокетами
// 1 инициализ. соед. (переменной дескрипт.)
// 2 установка парам.соед. (загаловков кот.отпр.)
// 3 - выполнение запроса с получением ответа
// 4 закрытие соед.
    $ch = curl_init('http://mysite.local/www/rus/script.php'); // функ. прин. url к кот.обр. http://mysite.local/www/rus  D:\sites\mysite.local\www\rus
     // установка настроек
   // curl_setopt($ch, CURLOPT_HEADER, true);
    //curl_setopt($ch, CURLOPT_NOBODY, true); // тело возвр. не будет

   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 1 парам - дескр, название настр.значение - возврат результат или сразу печ. п. 26 при false - сразу печ. без п. 27
   curl_setopt($ch, CURLOPT_POST, true); // отправление Post pfghjcf
    curl_setopt($ch, CURLOPT_REFERER, 'https://myrusakov.ru'); // как-будто вы пришли с какого-то сайта
   curl_setopt($ch, CURLOPT_COOKIE, 'login=Admin;password=123'); // передаём данные для открытия дост.
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'x=5&y=10'); // указ. парам. кот. хотим передать. x=5&y=10 - передача как по адр. строке Get  запр.
    
    $result = curl_exec($ch); // выполнение запроса
   // echo $result;
    curl_close($ch);
    
   $ch = curl_init('http://google.ru');
   
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // чтобы след.редирект
    curl_setopt($ch, CURLOPT_HEADER, true);
     curl_setopt($ch, CURLOPT_NOBODY, true);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // если сайт не работ. с https
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = curl_exec($ch);
    
    // вытащим куку из заголовка echo в брауз: Set-Cookie: NID=132=YhkEaQY5vCYE8ixZpng9xVDgMESSYBbOQs9OCWAAfPzDm8rDxEzcBQZe4jiriAILQtAMEUXjQ0JCgQjCnP3tYijnykd4M4JR2-pad9pUoppB43MKKVaYg9IsFdabsExI;
    preg_match('/Set-Cookie: NID=(.*?);/i', $result, $matches);
    // '//i' - без учёта регистра стр.$result, и пом.все это в массив $matches echo - все соответствия. нач.рег Set-Cookie: NID= в скобки пом. все симв. (.*) до ; в скобки ставим квантификатор ? чтобы ; не посчитался как произв. симв.и не зах.всю стр.
    curl_setopt($ch, CURLOPT_COOKIE, 'NID='.$matches[1]); // сайт будет думать что это одна и таже сессия
    
    print_r($matches);
    // echo Array т.е. все соотв.
/*(
    [0] => Set-Cookie: NID=132=FxZxhd09B5NeW1Ere_hgDI4ZeNQAJ6jjBYISoc5-zFc86o31eHgzesFhZAYzPJ_7TLHjI1fTJITUWH5koV4DvryRfdRF6GM_REof3MEDpsPoJoT42zf4vuQyVQrzhvJS; // все рег.
    [1] => 132=FxZxhd09B5NeW1Ere_hgDI4ZeNQAJ6jjBYISoc5-zFc86o31eHgzesFhZAYzPJ_7TLHjI1fTJITUWH5koV4DvryRfdRF6GM_REof3MEDpsPoJoT42zf4vuQyVQrzhvJS // только знач. куки
)*/
  
    echo iconv( "windows-1251", "UTF-8", "$result"); // смена кодировки

   // echo  $result;
    curl_close($ch); // п.4*/
    //аналогично curl_setopt($ch, CURLOPT_POST, true); 
   // curl_setopt($ch, CURLOPT_POST, 'NID='.$matches[1]); //записываем в настр.curl
    
?>