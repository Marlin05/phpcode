<?php

/*function clear(){
	global $db;
	foreach ($_POST as $key => $value) {
		$_POST[$key] = mysqli_real_escape_string($db, $value);
	}
}
*/
/*function save_mess(){
	global $db;
	clear();// функция экранирует символ
	extract($_POST); // создаёт из ключей name и text одноим.пер.
	// $name = mysqli_real_escape_string($db, $_POST['name']); 
	// $text = mysqli_real_escape_string($db, $_POST['text']);
	$query = "INSERT INTO gb (name, text) VALUES ('$name', '$text')";
	mysqli_query($db, $query);
}
*/
function get_all_db(){
	global $db;
	$query = "SELECT * FROM $statti ORDER BY id DESC";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC); // возвр.асс arr
}

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}