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
    
    

/*$mysqli->query("INSERT INTO `secret_users`
    ( `name`, `email`, `password`, `balance`, `ip_reg`, `date_reg`)
    VALUES ('Denis', '2@mail.ru', MD5('1234'), '0.00', INET_ATON('127.0.0.1'), UNIX_TIMESTAMP())");
 $mysqli->close();*/

//Если переменная Name передана
/*if (isset($_POST["reg"])) {
     $name = $mysqli->real_escape_string(htmlspecialchars($_POST['name'])); 
 $email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
        $password = $mysqli->real_escape_string(htmlspecialchars($_POST['password']));
        $ip_reg = ip2long($_SERVER['REMOTE_ADDR']);
       $query = ("INSERT INTO `secret_users`  
        (`name`, `email`, `password`) 
        VALUES ('$name', '$email', MD5('$password')");
        $result = $mysqli->query($query);
    }*/

    if (isset($_POST["reg"])) {
      //$Name = $mysqli->real_escape_string(htmlspecialchars($_POST['name'])); 
       $query = ("INSERT INTO `secret_users` 
         (`name`, `email`) VALUES ('".$_POST['name']."','".$_POST['email']."')");

        
       
        $result = $mysqli->query($query);
    }
  
 $mysqli->close();


    //Вставляем данные, подставляя их в запрос
  /*  $sql = mysql_query("INSERT INTO `products` (`Name`, `Price`) 
                        VALUES ('".$_POST['Name']."','".$_POST['Price']."')");*/

    //Если вставка прошла успешно
   /* if ($mysqli) {
        echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}*/

/*if (isset($_POST['reg'])) { // если форма пришла нач рег.
        $name = $mysqli->real_escape_string(htmlspecialchars($_POST['name'])); // $mysqli->real_escape_string  метод безопасности
        $email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
        $password = $mysqli->real_escape_string(htmlspecialchars($_POST['password'])); // если в sql запросе
        //    $password = md5 (htmlspecialchars($_POST['password']); // 2 вар.
        // далее необхпроверить входные данные - в этом коде этого нет
        $ip_reg = ip2long($_SERVER['REMOTE_ADDR']);
        $query = ("INSERT INTO `secret_users`  
        (`name`, `email`, `password`, `ip_reg`, `date_reg`) 
        VALUES ('$name', '$email', MD5('$password'), '$ip_reg', UNIX_TIMESTAMP()");
        $result = $mysqli->query($query);
    }
  
 $mysqli->close();*/
?>

<?php if (isset($result)) { ?>
    <?php if ($result) { ?>
        <p>Регистрация прошла успешно!</p>
    <?php } else { ?>
        <p>Произошла ошибка</p>
    <?php } ?>
<?php } ?>

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
//Удаляем, если что
/*if (isset($_GET['del'])) {
    $sql = mysqli('DELETE FROM `products` WHERE `ID` = "'.$_GET['del'].'"');
    if ($sql) {
        echo "<p>Товар удален.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}

//Получаем данные
 

/*$sql = mysqli('SELECT `ID`, `Name` FROM `products`');
while ($result = mysql_fetch_array($sql)) {
    echo $result['ID'].") ".$result['Name']." - <a href='?del=".$result['ID']."'>Удалить</a><br>";
}
$mysqli->close();*/
?>
