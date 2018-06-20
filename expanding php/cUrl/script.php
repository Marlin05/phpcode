<?php
// если скрипт закр. и дост. только авт.польз. то проверяем автор. польз. или нет
    echo 'Вы пришли с: '.$_SERVER['HTTP_REFERER'];
    $login = $_COOKIE['login']?? false; // получаем куки
    $password = $_COOKIE['password']?? false;
    if ($login !== 'Admin' || $password !== '123') { // если логин не эквивалентно Admin и пароль не 123 то 
        echo 'Доступ закрыт';
        exit;
    }

    // 2 параметра в скрипте кот. принимает Post запрос
    $x = $_POST['x']?? false;
    $y = $_POST['y']?? false;
    $x = htmlspecialchars($x);
    $y = htmlspecialchars($y);
    if (is_numeric($x) && is_numeric($y)) echo $x + $y; // если х - число и у - тоже число тогда +
    else echo 'error';
?>