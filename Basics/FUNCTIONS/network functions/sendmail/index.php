<?php

// в данном случае все письма будуи скл.в отдельный файл. D:\Open Server\OpenServer\userdata\temp\email
// заголовки разд. \r\n - перех.на нов.стр.
// $headers .= 'Reply-to:' добавление к стр. заг. ещё одной стр. email польз.кому будет отпр.письмо.п.12
// для лучшей валид необх. отправлять в 2 форматах text/html п.14


    $to = 'abc@mail.ru'; // кому идёт письмо
    $subject = 'Тема';
    $text = 'Текст сообщений! <b>Hello World!</b> <br /><br />';
    $headers = 'From: Вася Пупкин < admin@mysite.local>\r\n';
    $headers .= 'Reply-to: <admin@mysite.ru>\r\n';
    $headers .= 'Content-type: text/html; charset=utf-8';
    // 'Тема' письма необх.кодировать:
    $subject = '=?utf-8?B?'.base64_encode($subject).'?='; // в письме echo: Subject: =?utf-8?B?0KLQtdC80LA=?=
    if (mail($to, $subject, $text, $headers)) echo 'Письмо отправлено!';
    else echo 'Письмо не отправлено';
?>