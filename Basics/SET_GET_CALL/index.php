<?php

class Page {

	private $header;  //закрытое свойство
	// для вывода исп.метод внутри класса без маг.методов
	
	public $content; 

	public $footer;
	
	// в конструкторе присваиваем св-вам переданные значения
	public function __construct($h,$c,$f) {
		$this->header = $h;
		$this->content = $c;
		$this->footer = $f;
	}
	
	public function __toString() {
		return $this->header.'<br>'.$this->content.'<br>'.$this->footer;
	}
	// вспомог. способ без метода toString
	/*
	public function view() {

		return $this->header.'<br>'.$this->content.'<br>'.$this->footer;

	}*/

	
	// принимает 2 парам. 1 - название нес.св-ва 
	// 2 - значение 
	// метод для обращений к нес.свойствам
	/*public function __set($name,$value) {
		//exit ('ERROR');// для защиты от обращений к нес.свойствам
		$this->$name = $value; // в св-во header попадёт стр. hello
		//echo 'Вы вызываете свойство - '.$name.'со значением-'.$value;
		// echo 'Вы вызываете свойство - titleсо значением-Hello world'
		 //echo 'Error';
	}


	// исп.для перехвата вывода на экран нес.св-ва
	public function __get($name) {
		//echo '<br>Вы пытаетесь вывести свойство - '.$name;
		// Вы пытаетесь вывести свойство - title
		//echo 'Error vivod'; // при обр.к закрытому св-ву
		return $this->$name;
	}
	// в пер.name попадает get_body
	public function __call($name,$params) {
		echo 'Вызван метод с парам -'.$name.'C параметрами -<br>';
		print_r($params);
		// если забыл наз.метода view
		/*if($name == 'print') {
			$this->view();
		}
		if($name == 'echo') {
			$this->view();
		
	}
	
	*/
}

$page = new Page('HEADER','CONTENT','FOOTER');

//$page->title = 'Hello world';

//echo $page->title; //'Hello world';

//$page->header = 'Hello world';

//echo $page->header;

// обращение к нес.методу
//$page->get_body('a','b','c');
// echo Вызван метод с парам -get_bodyC параметрами -
// Array ( [0] => a [1] => b [2] => c )

echo $page; // вывести объект через to string
 // как будто page стр. через to string
//echo "$page"; //тип данных объект нельзя вывести только если конвертировать toString в стр. п.17 echo 
/*HEADER
CONTENT
FOOTER
*/
//иначе error  Object of class Page could not be converted to string



//echo $page->view(); // если без to_string c методом view
?>