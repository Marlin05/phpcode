<?php
class minmax {

	private function min() {
		echo 'yes';
	}

	public function max() {
		echo 'no';
	}
	// при обращении к нес.методу класса
	// при private выдаёт значение п.49 
// при вызове нес.метода  $minmax в $method попадает стр.min
	public function __call($method,$params) {
		if(!is_array($params)) {
			return FALSE;
		}
		// находим мин.знач.массива params
		// т.к. $minmax это не arr то в перм.values запис.знач  ячейки params (10,20,3,4,5,1)
		$value = $params[0]; // значение изначально = 1 ячейки
		if($method == 'min') {
			for($i = 0; $i < count($params); $i++) {
				if($params[$i] < $value) {
					$value = $params[$i]; // если знач.эл. меньше то запис.знач. и возвр. мин.число на экран
				}
			}
		}
		
		if($method == 'max') {
			for($i = 0; $i < count($params); $i++) {
				if($params[$i] > $value) {
					$value = $params[$i];
				}
			}
		}
		
		
		return $value;
		
	}
	
}

$minmax = new minmax();

//обращаемся к нес.методу и передаём масс.знач.


echo $minmax->min(10,20,3,4,5,1); // echo 1

echo $minmax->max(10,20,3,4,5,1); // 20

?>