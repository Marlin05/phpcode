<?php
include 'config.php';
include 'classes/Page.php';
include 'classes/Database.php';

$page = new Page(); // создаём объект класса Page и проверяем -записано ли что-то в глобальном arr GET
// при нажатии на ссылку статьи в брауз. попад. в эту проверку
//  в пер. текст сохр.рез. и у объекта page выз.метод get_one
// для защиты пер. приводим знач. id к int
// если id не равно 0 то выз. метод get_one 

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	if($id != 0) {
		$text = $page->get_one($id);
		// print_r($text);
		echo $page->get_body($text,'view'); //вместо шаблона main  и цикла foreach
		exit();
	}
	else {
		exit('wrong parameter'); // чтобы не выводился весь arr
	}
}
else {
	$text = $page->get_all();
	echo $page->get_body($text,'main'); // в пер. arr и шаблон кот.необх.подгрузить
	
}
// также необх.добавить ещё порверок
?>