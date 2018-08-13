<?php
class Index extends AController{
	
	public function __construct() {
		//echo __CLASS__;
	}
	// переопределяем абстр. метод
	// создаём объект класса model
	public function get_body() {
		$db = new Model(HOST,USER,PASS,DB);
		// обращаемся к методу public function get_all_db() из model.php
		$text = $db->get_all_db(); // возвр. arr
		// обращаемся к шаблону и передаём arr text получаем ответ и выводим в index.php с помощью get_body
		return $this->render('index',array('title' => 'INDEX PAGE',
											'text' => $text));
	}
}
?>