<?php
error_reporting(0); //чтобы не было ошибок
include 'DbException.php';
include 'DbException1.php';
class db {
	public function __construct() {
		$db = mysql_connect('localhost','root','');
		if(!$db) {
			throw new DbException('No connection with database<br>');
		}
		// если не удалось выбрать таблицу то выбрасываем иск.
		if(!mysql_select_db('my_bd')) {
			throw new DbException1('No table');
		}
	}
}

// создание объекта заключаетм в try

try {
	$db = new db();
}
catch(DbException $e) {
	echo $e->getMessage();
	exit();
}
catch(DbException1 $e) {
	echo '1111';
	echo $e->getMessage();
	exit();
}
?>