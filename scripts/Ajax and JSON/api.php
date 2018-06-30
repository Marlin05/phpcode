<?php

//print_r($_POST) - связь с сервером через js

// обработка кода:
    if (isset($_POST['func']) && $_POST['func'] == '1') { // если такие данные сущ. и при этом = 1
        // определяем конст. и подкл.к базе данных, чтобы все выкачать:
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'mysite');
        try {
            // подкл.к бд в скрипте secret_users.sql
            $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); // [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); - чтобы были все искл.
            $query = 'SELECT * FROM `secret_users` ORDER BY rand() LIMIT 1'; // Limit 1 - вывести только 1 случайного польз. рендерингом
            $result = $pdo->query($query); // выполнить запрос
            $row = $result->fetch(PDO::FETCH_ASSOC); // получить
            echo json_encode($row); // преобразование массива json в стр.
            // далее эту стр. с помощью js распарсиваем в index.php 
            // ловим искл.error
        } catch(PDOException $e) {
            echo 'Ошибка: '.$e->getMessage();
        }
    }
?>