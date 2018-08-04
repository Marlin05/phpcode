<?php

//header('Content-type: text/html; charset=utf-8');
 
class User {
	//псевдоконстанты
	public function my_method() {
		
		echo 'Текущий класс - '.__CLASS__.'<br>';
		echo 'Текущий метод - '.__METHOD__.'<br>';
		echo 'Текущий файл-'.__FILE__."<br>";
		echo 'Текущий -строка'.__LINE__."<br>";
	}
	// echo 
/*
Текущий класс - User
Текущий метод - User::my_method
Текущий файл-D:\sites\mysite.local\www\rus\les5\User.php
Текущий -строка12
*/
}

$user = new User();
$user->my_method();
?>