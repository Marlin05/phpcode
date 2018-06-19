<?php
   // phpinfo (); -// покажет расположение php ini
// на OS временный файл находится D:\Open Server\OpenServer\modules\php\PHP-7.0-x64 php ini 
// для ред. наход. в openserver\userdata\config\PHP-7.0*64_php.ini
	//set_time_limit(0); // если скрипт будет  выполнятся долго
    $a = $_GET['a']?? false;
    $a = htmlspecialchars($a);// заменяет тэги кавычки на html сущности
    echo $a.'<br />';
    // получить email от польз. и проверить на валидность
    $email_1 = 'abc@mail.ru';
    $email_2 = 'abcmail.ru';
    
    echo filter_var($email_1, FILTER_VALIDATE_EMAIL).'<br />'; //возвр. отфильтрованые данные или false(ничего) 1 парам.- приним.данные. 2 парам- константа т.н. тип кот хотим проверить. 
    echo filter_var($email_2, FILTER_VALIDATE_EMAIL).'<br />';
    
    $ip = '127.0.0.1';
    echo filter_var($ip, FILTER_VALIDATE_IP).'<br />';
    
    $url = 'https://myrusakov.ru';
    echo filter_var($url, FILTER_VALIDATE_URL).'<br />'; // ввод адреса
    
    // обычно можно писать так
    if (filter_var($email_1, FILTER_VALIDATE_EMAIL)) echo 'Данные прошли проверку';
    else echo 'Данные проверку не прошли';
    echo '<br />';
    
    $n = '5';
    echo filter_var($n, FILTER_VALIDATE_INT).'<br />';// проверка на целое значение
    // при передаче в парам.значения оно авт.преобр.в стр.
    $d = '5.5';
    echo filter_var($d, FILTER_VALIDATE_FLOAT).'<br />';
    
    $b = 'On';
    echo filter_var($b, FILTER_VALIDATE_BOOLEAN).'<br />'; // echo 1 
    
    $b = 'no';
    echo filter_var($b, FILTER_VALIDATE_BOOLEAN).'<br />'; // пустая стр.
    
?>