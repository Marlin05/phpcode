<?php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysite');
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');
    
    $result_set = $mysqli->query('SELECT * FROM `secret_users`'); // выборка всех user
    //print_r($result_set); // echo mysqli_result Object ( [current_field] => 0 [field_count] => 7 [lengths] => [num_rows] => 15 [type] => 0 )
// * - получить все поля
// чтобы вытащить данные из result_set нужно создать массив
	$table = [];
    while (($row = $result_set->fetch_assoc()) != false) { // строке присваиваем то что возвр.функ.fetch_assoc у объект result_set (текущую стр) и пока это всё не эквив.false добавляем в таблицу строку row
        $table[] = $row;
    }
    
   // print_r($table); 

  

    $result_set = $mysqli->query('SELECT `email`, `balance` FROM `secret_users`');
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    
   /* $result_set = $mysqli->query('SELECT `name`, `balance` FROM `secret_users` WHERE `email`=\'vasya@mail.ru\''); // данные у польз. email кот. = vasya@mail.ru '\\' - экранирован.кав.
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    print_r($table);
    */
    $result_set = $mysqli->query("SELECT `name`, `email` FROM `secret_users` WHERE `email` LIKE 'v%'"); // выбрать email с подстрокой - симв. v в email. % - после v может быть любое кол-во сим.
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
   // print_r($table);
    /*
    $result_set = $mysqli->query("SELECT `id`, `name`, `email` FROM `secret_users` WHERE `id` IN (2, 5, 6)"); // все записи в кот.id наход.в одном из ук.вариантов
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    
    $result_set = $mysqli->query("SELECT `id`, `name`, `email` FROM `secret_users` WHERE `id` IN (2, 5, 6) AND `email` LIKE '%v%'"); // в кот. id из ук.симв. и сод. в email симв.v
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    
    $result_set = $mysqli->query("SELECT `id`, `name`, `email` FROM `secret_users` WHERE `id` IN (2, 5, 6) OR `email` LIKE '%v%'");
    $table = []; // покажет и те и другие
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    
    $result_set = $mysqli->query("SELECT `id`, `name`, `email` FROM `secret_users` WHERE (`id` IN (2, 5, 6) OR `email` LIKE '%v%') AND `name` = 'Вячеслав'"); // id = 2 5 6 или email c v внач.или в конце и доп.обяз. поле- имя Вечеслав
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    // 
    // сортировка результирующей выборки
    // после where должен идти order
    // ORDER BY  дальше ук.название поля по кот.она будет выполнена
    */
    /*$result_set = $mysqli->query("SELECT `name`, `email`, `date_reg` FROM `secret_users` WHERE `email` LIKE 'v%' ORDER BY `date_reg`");
    $table = []; // сортировка по дате рег.
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    /*
    $result_set = $mysqli->query("SELECT `name`, `email`, `date_reg` FROM `secret_users` WHERE `email` LIKE 'v%' ORDER BY `date_reg` DESC");
    $table = []; // знач. сортируются по дате рег.
    while (($row = $result_set->fetch_assoc()) != false) { // сортировка  даты рег. по убыванию - DESC 
        $table[] = $row;
    }
    //print_r($table);
    */
   /* $result_set = $mysqli->query("SELECT `name`, `email`, `date_reg` FROM `secret_users` WHERE `email` LIKE 'v%' ORDER BY `name`, `email`"); 
    $table = [];  // сортировка по возр. - name и email, где сортировка по email при усл., что name совпадает
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
   // print_r($table);
    /*

    // получить всех польз и их записи
    ORDER BY и WHERE можно ук. только после INNER JOIN - вывод. записи кот.сод. только в email и в articles
    // LEFT OUTER JOIN - вытащит всех пол. даже без записей
    // RIGHT OUTER JOIN -все записи из правой части таблицы

*/
    // `id`secret_users` псевдоним `u_id` 
    $result_set = $mysqli->query("SELECT *, `secret_users`.`id` as `u_id` FROM `secret_users` INNER JOIN `secret_articles` ON 
    `secret_users`.`id` = 
    
    `secret_articles`.`user_id`"); // совпадает с id s_a
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
   // print_r($table);
    // echo 
   /* Array
(
    [0] => Array
        (
            [id] => 1 // id articles
            [name] => Василий
            [email] => vasya@mail.ru
            [password] => 202cb962ac59075b964b07152d234b70
            [balance] => 0.00
            [ip_reg] => 0
            [data_reg] => 1529629870
            [user_id] => 2 // id secret_users
            [title] => Моя первая статья
            [text] => Тут текст статьи
            [date] => 1529630272
            [hide] => 0
            [u_id] => 2 // id secret_users
        )*/
    
    // запрос на кол-во польз. в табл.
// чтобы выводился полностью записи исп. псевдоним as `count`
    $result_set = $mysqli->query('SELECT COUNT(`id`) as `count` FROM `secret_users`');
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
   //echo $table[0]['count'];
  

   // print_r($table); 

    // сумма всех балансов
    $result_set = $mysqli->query('SELECT SUM(`balance`) as `sum` FROM `secret_users` WHERE `balance` > "0"'); // где баланс больше 0 получить сумму
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    // вытащить опр.часть записей
    // LIMIT - то, какое кол-во записей хотим получить
    // ORDER BY `name` - сортировка по полю name
    $result_set = $mysqli->query('SELECT * FROM `secret_users` WHERE `balance` = "0" ORDER BY `name` LIMIT 3');
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    // print_r($table);
    // используется при выводе кол-ва статей
//на стр.
    $result_set = $mysqli->query('SELECT * FROM `secret_users` WHERE `balance` = "0" LIMIT 3, 2'); // показать 2 зап.после 3. 1 число -3 это смещение выборки. 2 - кол-во зап.  
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
    //print_r($table);
    

    // рандомная выборка т.е. вывод произвольных записей
    $result_set = $mysqli->query('SELECT * FROM `secret_users` ORDER BY RAND() LIMIT 3');
    $table = [];
    while (($row = $result_set->fetch_assoc()) != false) {
        $table[] = $row;
    }
  //  print_r($table);
    
    $mysqli->close();
?>