<?php
//класс последних записей
class Last implements IWidgets {
	public $last;
	// 2 усл. - у него должно быть 2 гл. метода
	public function init() {
		$this->last[] = 'STR1';
		$this->last[] = 'STR2';
		$this->last[] = 'STR3';
		$this->last[] = 'STR4';
	}
	
	public function get_body() {
		return $this->last; // возвращает content
	}
}
?>