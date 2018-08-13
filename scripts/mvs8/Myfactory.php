<?php
// шаблон помогает создавать объекты классов
class MyFactory {
	
	// в парам пом.имя класа объект которого нужно создать
	// если получ.подкл. файл то возвращаем объект.если нет- искл.
	static function factory($name) {
		if(include $name.'.php') {
			return new $name;
		}
		else {
			throw new Exception('Wrong File');
		}
	}
}
// создаём $ob и в неё запис.рез.раб.статич.метода.
// в пара.ук.имя класа объект кот.нужно пол.
try {
	//$object = MyFactory::factory('Mysql');
}
catch(Exception $e) {
	exit($e->getMessage());
}


abstract class User {
	
	public $name;
	// получает имя и записывает в св-во
	public function __construct($name) {
		$this->name = $name;// присваиваем св-ву значение
	}
	
	public function get_name () {
		return $this->name;
	}
}

// переопределяем метод
//вызываем ро.класс чтобы пол.имя
class Moderator extends User {
	
	public function get_name() {
		$str = parent::get_name();
		return $str.__CLASS__;
	}
}
class Admin extends User {
	
	public function get_name() {
		$str = parent::get_name();
		return $str.__CLASS__;
	}
}
class Guest extends User {
	
	public function get_name() {
		$str = parent::get_name();
		return $str.__CLASS__;
	}
}
// создаёт объекты классов
// в парам имя класса объект кот.хотим получить
// если в стр. передаём имя Moderator то стат.метод возвр.объект класса модератор и тд.
class UserFactory {
	static function create($name,$userName) {
		switch($name) {
			case 'Moderator':
			return new Moderator($userName);
			case 'Admin':
			return new Admin($userName);
			case 'Guest':
			return new Guest($userName);
			
			default:
			
			exit('Wrong');
		}
	}
}
// созд. перем и обращаемся к стат.методу 
$admin = UserFactory::create('Moderator','Vasya');
// выводим переобр.метод.
echo $admin->get_name(); // VasyaModerator / пер.$str.имя__CLASS__;

?>