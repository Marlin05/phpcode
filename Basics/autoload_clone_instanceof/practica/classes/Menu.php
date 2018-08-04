<?php
class Menu implements IWidgets {
	public $menu;
	// 2 усл. - у него должно быть 2 гл. метода
	//задаём свойствам значения
	//1 метод производит инициализацию
	public function init() {
		$this->menu[] = 'Home';
		$this->menu[] = 'Price';
		$this->menu[] = 'peyment';
		$this->menu[] = 'About';
	}
	// 2 метод возвращает св-во
	public function get_body() {
		return $this->menu;
	}
}
?>