<!doctype html>
<html lang="ru">
<head>
<title>Админ-панель</title>
</head>
<body>


<?php


 define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysite');
    
   $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');
    
    

/*$mysqli->query ("INSERT INTO `secret_users`
  (`id`, `name`, `email`, `password`, `balance`, `ip_reg`, `data_reg`) 
  VALUES (NULL, 'Dinn', 'dinn@mail.ru', MD5('123'), '0.00', INET_ATON('127.0.0.1'), UNIX_TIMESTAMP())");


 $mysqli->close();*/


//Если переменная reg передана
if (isset($_POST["reg"])) {
     $name = $mysqli->real_escape_string(htmlspecialchars($_POST['name'])); 
 $email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
        $password = $mysqli->real_escape_string(htmlspecialchars($_POST['password']));
        $ip_reg = ip2long($_SERVER['REMOTE_ADDR']);
       $query = ("INSERT INTO `secret_users`
      (`id`, `name`, `email`, `password`,  `ip_reg`, `data_reg`) 
        VALUES (NULL, '$name', '$email', MD5('$password'), '$ip_reg', UNIX_TIMESTAMP())");
        $result = $mysqli->query($query);


         if (isset($result)) {             

        echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
    }

?>


<table>
<form name='reg' action='index.php' method='post'>
    <p>
        Имя: <input type='text' name='name' />
    </p>
    <p>
        E-mail: <input type='text' name='email' />
    </p>
    <p>
        Пароль: <input type='password' name='password' />
    </p>
    <p>
        <input type='submit' name='reg' value='Зарегистрироваться' />
    </p>
</table>


<?php
// DELETE user

/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysite";

// Create connection
$conn = mysqli_connect('localhost','root','','mysite') 
or die ('Ошибка соединения с БД');
//or die ('Нет подключения к базе данных');

// sql to delete a record
$sql = "DELETE FROM secret_users WHERE id=16";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();*/
?>


