<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysite');
    

    // создаём объект базы данных, в переме.передается драйвер бд. в данном сл.-msql, далее хост подкл.
   // try-catch - перехват ошибок
    try {
        $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); // режим [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]) выходит из тихого режима и показ.все ош.
    } catch (PDOException $e) {
        echo 'Ошибка при подключении к базе данных!';
    }
    
   /* $query = 'SELECT * FROM `secret_users`';
    $result = $pdo->query($query);
    //echo PDOStatement- другой объект
   // $row = $result->fetch(); // метод fentch -получения стр. 
    $row = $result->fetch(PDO::FETCH_ASSOC);
   // print_r($row); // arr 
    echo '<br />';
    */
    // запрос без выборки на добавление статьи
  /*  try {
        $query = 'INSERT INTO `secret_articles` (`user_id`, `title`, `text`, `date`)
        VALUES ("7", " Cтатья1", "Текст этой новой статьи...", UNIX_TIMESTAMP())';
        $result = $pdo->exec($query);// возвр.кол-во затрон.зап.
        $last_id = $pdo->lastInsertId(); //получить последний вставл.id
        echo $result.' - '.$last_id.'<br />';
    } catch (PDOException $e) {
        echo 'Ошибка в запросе: '.$e->getMessage().'<br />';
    }
  // изменить поле date на значен. +1
    $query = 'UPDATE `secret_articles` SET `date` = `date` + 1';
    $result = $pdo->exec($query);
    echo $result.'<br />';// 3 - при изм.было затр. 3 зап.
   
    $query = "DELETE FROM `secret_articles` WHERE `id`='$last_id'";
    $result = $pdo->exec($query);
    echo $result.'<br />';
   */

    // выборка -получение всей таблицы без циклов 
  /*  $query = 'SELECT * FROM `secret_users`';
    $result = $pdo->query($query);
    $table = $result->fetchAll(PDO::FETCH_ASSOC);
    print_r($table);
  */ 

    // параметризация сиквел запр. вместо $msql -> real_escape_string();
    // для безопасности от с.иньекций
   // $email = 'vasya@mail.ru'; // Допустим, получено из формы
    // 1 вариант
   /* $query = 'SELECT * FROM `secret_users` WHERE `email` = ?'; // получить значение = этому пользователю
    $query = $pdo->prepare($query); // запрос подг. и возв. PDO statement
    $query->execute([$email]); // вызывает объект PDO st.  в парам. подставляем то что нужно зам. вместо ? в п.54. 
    // $email - массив = п.53. данный метод делает парам.безоп.
    $row = $query->fetch(); // метод fetch PDO st.
    print_r($row);
   */ 
// 2 вариант
   /* $email = 'vasya@mail.ru'; 
    $query = 'SELECT * FROM `secret_users` WHERE `email` = :email'; // :email вместо '?' назв. парам.
    $query = $pdo->prepare($query);
    $query->execute(['email' => $email]); // в масс.создаем асс.arr, а не список/ 'email' - ключ $email] - знач.
    $row = $query->fetch();
    print_r($row);
*/ //3 вариант
  /*      $email = 'vasya@mail.ru'; 
    $query = 'SELECT * FROM `secret_users` WHERE `email` = :email :a :b'; // :email вместо '?' назв. парам.
    $query = $pdo->prepare($query);
    $query->execute(['email' => $email, 'b'=>1, 'a'=>2]); // в масс.создаем асс.arr, а не список 
    $row = $query->fetch();
 */   print_r($row);

?>