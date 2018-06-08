<?php
    use ru\myrusakov\User;
    use ru\google\User as GoogleUser;
    require_once 'a.php'; // обр.в тек.дир. по относительному пути
    require_once 'b.php';
    
    $user = new User(); // создаём новый объект класса. в данном случае обр.к тек.дир. класса  User в тек.простр.имён ru\myrusakov\User; если в др.дир.- обр.по полному пути. это обр.к классу, кот.описан в namespace
    $user->name = 'Michael';
    echo $user->name.'<br />';
    
    $g_user = new GoogleUser();
    $g_user->email = 'abc@mail.ru';
    echo $g_user->email.'<br />';
    
    $user = new ru\google\User(); // 2 способ-обр.к полному пути
    $user->email = '123@mail.ru';
    echo $user->email.'<br />';
?>