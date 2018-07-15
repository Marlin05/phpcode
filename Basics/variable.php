<?php

error_reporting(-1); // php выводит все ошибки

$title = 'hello world!';
$title = 'page title'; // перезапись перем.
$fruit = 'apple';
$winnie_pooh = "Hello, I'm Winnie. I have 2 {$fruit}s";  // перем fruit в одинарн.кав. не обраб.
// $winnieThePooh = "Hello, I'm Winnie";

$var = '123';
$Var = '456';

//echo $var;
define("PAGE", "new page"); // 1 парам-имя, 2 - значение
// define("PAGE", "new page2");
 
 // 2 способ можно исп.только внакчале кода и с версией не ниже php 5.3
const PAGE2 = 'new const';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
</head>
<body>
	
	<h1><?php echo PAGE; ?></h1>
	<p><?php echo $winnie_pooh; ?></p>
	<p><?php echo $Var; ?></p>
	<p><?php echo PAGE2; ?></p>

</body>
</html>