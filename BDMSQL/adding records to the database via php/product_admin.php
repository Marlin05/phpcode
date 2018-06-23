<!doctype html>
<html lang="ru">
<head>
<title>Админ-панель</title>
</head>
<body>


<?php


 define('DB_HOST', 'localhost');
    define('DB_USER', 'user_bd');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysite');
    
   $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');
    
    



//Если переменная Name передана
if (isset($_POST["Name"])) {
      //$Name = $mysqli->real_escape_string(htmlspecialchars($_POST['name'])); 
       $query = ("INSERT INTO `products` 
        (`Name`, `Price`) VALUES ('".$_POST['Name']."','".$_POST['Price']."')");

        
       /* VALUES ('$name', '$email', MD5('$password'), '$ip_reg', UNIX_TIMESTAMP())";*/
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
?>

<?php if (isset($result)) { ?>
    <?php if ($result) { ?>
        <p>Данные успешно добавлены в таблицу</p>
    <?php } else { ?>
        <p>Произошла ошибка</p>
    <?php } ?>
<?php } ?>

<table>
<form action="" method="post">
    <tr>
        <td>Наименование:</td>
        <td><input type="text" name="Name"></td>
    </tr>
    <tr>
        <td>Цена:</td>
        <td><input type="text" name="Price" size="3"> руб.</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
    </tr>
</form>
</table>

<?php
//Удаляем, если что
if (isset($_GET['del'])) {
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
</body>