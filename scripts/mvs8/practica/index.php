<?php
include 'config.php';
//header("Content-Type:text/html;charset='cp1251'");
header('Content-type: text/html; charset=utf-8');
function __autoload($file) {
	if(file_exists('controllers/'.$file.'.php')) {
		require_once 'controllers/'.$file.'.php';
	}
	else {
		require_once 'model/'.$file.'.php';
	}
}
//выбираем название контроллера
if(isset($_GET['option'])) {
	$class = strip_tags($_GET['option']);
	
	switch ($class) {
		// если в адр. стр. передаём view то создаём
		case 'view':
		$init = new View();
		break;
		
		default :
		// если что-то другое то переадр. на index контроллер
		$init = new Index();
		break;
	}
}
// если в массиве GET нет ячейки option, то переадр.
else {
	$init = new Index();
}
// после того как выбра контроллер, у него вызывается метод 
echo $init->get_body();
?>