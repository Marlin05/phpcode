<?php

session_start();
define('ADMIN', 'admin'); // name и  login разрешёный

// echo session_id(); // id сессии = названию файла куки

// принимаем данные из формы
// если у нас что-то пришло через POST, то проверяем: если значение login = константе Admin , которые мы разрешаем. п 4 то создаём пер. SESSION['admin'] чтобы попасть на стр. secret.php Если всё ок то сообщение об ошибке или успехе п.45
if(!empty($_POST['login'])){
	if($_POST['login'] === ADMIN){
		$_SESSION['admin'] = ADMIN;
		$_SESSION['res'] = 'Вы успешно вошли'; // res - result
		
	}else{
		$_SESSION['res'] = 'Неверный логин!'; // запись ошибки в сесию
	}
	header("Location: sess1.php"); // редирект решает проблему f5 и сбрасывает данные из формы
	die;
	}


 //  $_SESSION['name'] = 'Андрей';
  // echo $_SESSION ['name']
// $_SESSION['login'] = 'andrey';
 //var_dump($_SESSION ['name']);
// var_dump($_SESSION);
 //unset($_SESSION['name']); //удаляет пер.
 //session_unset(); // удалит всю сесию 
//session_destroy(); // удалит всю сессию и файл сессии в куках
?>
	<!-- реализуем простое меню чтобы вручную не вводить адреса-->
<ul>

	<li><a href="sess1.php">sess1</a></li>
	<li><a href="sess2.php">sess2</a></li>
	<li><a href="secret.php">secret</a></li>
</ul>

<hr>
<!-- вывод сообщения
- если сесс.пер. сущ. то echo -->
<?php
	if(isset($_SESSION['res'])){
		echo $_SESSION['res'];
		unset($_SESSION['res']); // удаляет сообщение Неверный логин после обн.стр.
	}
?> 

<!-- форма авторизации -->

<form action="" method="post">
	<input type="text" name="login">
	<button type="submit">Login</button>
</form>

	