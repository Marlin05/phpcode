<?php
header("Content-Type:text/html;charset='cp1251'");

// расшир.дир.подг файлов кот.прописаны в phpinit
set_include_path(get_include_path().PATH_SEPARATOR.'classes');

//get_include_path- путь по умолчанию 

function __autoload($class) {
	include $class.'.php';
}

$dir = new Render('classes');
$dir->get_widgets(); // запускает виджет

?>