<?php
class View extends AController {
	
	public function __construct() {
		//echo __CLASS__;
	}
	// переопределяем абст. метод
	public function get_body() {
		if(isset($_GET['id'])) {
			$id = (int)$_GET['id'];
			if($id != 0) {
				$db = new Model(HOST,USER,PASS,DB); // запрос в модель
				$text = $db->get_one_db($id);
				// вызываем метод шаблонизатора
				return $this->render('view',array('title'=>'View PAge',
													'text'=> $text));
			}
			else {
				exit('WRONG NUMBER');
			}
		}
		else {
			exit('Wrong PARAMETR');
		}
	}
}
?>