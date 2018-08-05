<?php

// принимает из arr POST кот.виден записывает и преобразует в стр. имя и текст и дату
function save_mess(){
	$str = $_POST['name'] . '|' . $_POST['text'] . '|' . date('Y-m-d H:i:s'). "\n***\n"; // разделитель *** перевод стр.
	file_put_contents('gb.txt', $str, FILE_APPEND); // сюда всё записывается
}
// считывает сообщения
function get_mess(){
	return file_get_contents('gb.txt');
}

// разделяет строку по разделителю ***
function array_mess($messages){
	$messages = explode("\n***\n", $messages);
	array_pop($messages); // удаляет посл.эл. arr
	return array_reverse($messages); // переворачивает arr 
}

//возвращает рабитую стр.
function get_format_message($message){
	return explode('|', $message);
}

// красиво распечатывает с тэгами
function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}