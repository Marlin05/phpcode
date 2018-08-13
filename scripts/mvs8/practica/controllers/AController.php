<?php
abstract class AController {
	
	abstract function get_body();
	
	// шаблонизатор
	// 1 парам-имя файла кот.необх.подгрузить 
	// в перем. массив params - title,text
	// имя пер.-ключ а знач знач. яч с ключ.
	// extract создаёт пер. и знач ключа array('key'=>val); array('key2'=>val2);
	//$params =array('title'=>'val','text'=>'text')
	protected function render($file,$params) {
		extract($params); // создаёт пер. text title п.12 п 15 view.php
		ob_start();
		include('views/'.$file.'.php');
		return ob_get_clean();
	}
}
?>