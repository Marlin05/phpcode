<?php

class Types {
	private $vars = array();// закрытое свойство в кот. есть пустой массив

	// создаём стат.масс.в кот.2 ячейки и опис. то что необходимо создать в arr vars
	// 1 ячейка с ключём name и значени строковое
	// 2 ячейка- число с типом integer
   //  типы эл. кот.будем ложить в массив $vars
	
	static $type = array('name' => 'string',
							'number' => 'integer');
	// 1 парам. имя свойства и его значение
	// с пом. эл. set будем ложить типы эл. в закрытый arr $var
	// вначале проверяем - есть ключ со знач name в arr type
	// 2 проверка - есть ли значение свойства name - string namber- integer
	public function __set($name,$value) {
		if(array_key_exists($name,self::$type)) {
			if($this->my_foo(self::$type[$name],$value)) {
				$this->vars[$name] = $value;// если функция вернёт true из п. 18 то создаём ячейку с кл. name и значением value
			}
			else {
				exit('ERROR TYPES');
			}
		}
		// если не выполнится п.17
		else {
			exit('ERROR NAME');
		} 
	}
	// сущ.ли в масс vars ячейка с кл. name
	public function __get($name) {
		if(array_key_exists($name,$this->vars)) {
			return $this->vars[$name];
		}
	}
	// 1 парам. case- условие и 2 -знач.
	protected function my_foo($case,$val) {
		switch($case) {
			case 'string': // проверяет п.18
			return is_string($val); // проверяет явл.ли парам строковым типом передаём парам. value 
			break;
			
			case 'integer':
			return is_integer($val);
			break;
			//если в п.62 63 передадут что-то другое не число и не строку
			default:
			return FALSE;
			
			
		}
	}						
}

// создаём объект класса types
$types = new Types();
// обращаемся к нес.св-ву name и присваиваем знач.стр.
$types->name = 'hello';
echo $types->name;

//$types->number1 = 1;
//echo $types->number1;

// при создании нес. объекта мы должны обращаться только к
/*$types->name;
$types->number;
*/

?>