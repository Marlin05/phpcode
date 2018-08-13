<?php



//Singlton - для работы с 1 объектом класса

/* 1 способ записи
class Counter {

	static $instance = NULL;
	protected $count = 0;
	// проверка:записан ли объект в статик св-во instance
	static function get_instance() {
		if(self::$instance != NULL) {
			return self::$instance;
		} // если нет -создать, записать и вернуть
		return self::$instance = new Counter();	
	}
	
	private function __construct() {
		echo 'CREATE OBJECT';
	}
	
	private function __clone() {
		
	}
	
	public function set() {
		$this->count++;
	}
	public function get() {
		return $this->count;
	}
	
	
}

*/
class Counter {

	static $instance = NULL;
	protected $count = 0;
	
	// если в пер.есть объект кот.прин.классу Counter то возвр.знач.стат.св-ва instance. если нет- то необходимо создать этот объект
	static function get_instance() {
		if(self::$instance instanceof self) {
			return self::$instance;
		}
		return self::$instance = new self;	
	}
	
	private function __construct() {
		echo 'CREATE OBJECT';
	}
	
	private function __clone() {
		
	}
	
	public function set() {
		$this->count++;
	}
	public function get() {
		return $this->count;
	}
	
	
}

//$counter = new Counter();
// вызов статического метода
// в ob попадает объект counter 
$ob = Counter::get_instance();
$ob->set();
// в пер.2 ссылка на $ob
$ob1 = Counter::get_instance();
$ob1->set(); //св-во ув. на 1
$ob2 = Counter::get_instance();
$ob2->set();

echo $ob->get(); //echo 3
?>