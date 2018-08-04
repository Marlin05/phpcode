<?php
class Car {
	
	static public $counter = 0;
	
	static public $str = 'hello';
	
	public $var; // обычное св-во
	
	public function __construct() {
		self::$counter++;
	}
	
	public function __destruct() {
		self::$counter--;
	}
	
	public function __clone() {
		self::$counter++;
	}
	
	static public function st_method() {
		echo self::$str;  // обращение к ст.св-ву
		// ст.методы не раб с обычными св-вами
		
	}
	
}

$car = new Car();
$car1 = new Car();
$car2 = new Car();

$car3 = clone $car;

unset($car2);

Car::st_method(); // обращение к ст.методу
echo Car::$counter; // hello

?>