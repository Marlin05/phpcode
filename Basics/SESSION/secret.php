<?php

session_start();
// если сущ. isset в arr GET эл. do и он = exit - уд. сес. пер.
// проверка п. 9 не сработает т.к. сессия админ удалена
if( isset($_GET['do']) && $_GET['do'] == 'exit' ) unset($_SESSION['admin']);

// если в сессии нет эл. admin то die
if( !isset($_SESSION['admin']) ) die('Вы не авторизованы!');

echo "Добро пожаловать, {$_SESSION['admin']}! ";

?>
<!-- выход из сессии Get = exit-->
<a href="secret.php?do=exit">Logout</a>

<ul>
	<li><a href="sess1.php">sess1</a></li>
	<li><a href="sess2.php">sess2</a></li>
	<li><a href="secret.php">secret</a></li>
</ul>