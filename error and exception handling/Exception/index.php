<?php

//header('Content-type: text/html; charset=utf-8');
/*
try {
	
	echo 'код до ошибки';
	//ERROR
		if(TRUE) {
			throw new Exception();
		}
		
	echo 'код после ошибки';
	
}
catch(Exception $e) {
	echo 'Возникла ошибка';
}


class arr {
	public function view($array) {
		try {
			if(!is_array($array)) {
				throw new Exception();
			}
			foreach($array as $item) {
				echo $item."<br>";
			}
		}
		// в пер. e находится объект класса Exception
		catch(Exception $e) {
			exit('WRONG parametr');
		}
	}
}
*/
//$arr = new arr();
//$arr->view(array(1,2,3));

// в классе метод foo вызывает метод first1 п.46 а метод first1 вызывает метод first2 п.56 метод first2 выбрасывает Exception
/*
class test {
	public function foo() {
		try {
			echo '<br>foo()<br>';
			$this->first1();
			echo 'END foo<br>';
		}
		catch(Exception $e) {
			echo 'My exception'.'<br>';
		}
	}
	
	public function first1() {
		echo 'This is - '.__METHOD__.'<br>';
		$this->first2();
		echo 'END - '.__METHOD__.'<br>';
	}
	public function first2() {
		echo 'THIS is - '.__METHOD__.'<br>';
		throw new Exception();
		echo 'END - '.__METHOD__.'<br>';
	}
}

$test = new test();

echo '<br><br>!!!!!!!!!!!!!!!!!';
// вызываем метод foo
$test->foo();
*/

class test2 {
	public function __construct() {
		echo 'create object';
	}
	
	public function __destruct() {
		echo 'DELETE object';
	}
}

function create() {
	echo 'my create<br>';
	$test2 = new test2();
	echo 'ERROR<br>';
		throw new MyDbException('Возникла ошибка'); // создаётся объект и попадает в $e п.94
}

try {
	create(); // вызываем функцию 
}
catch(MyDbException $e) {
	echo $e->getMessage().'<br>';
	echo $e->getCode().'<br>';
	echo $e->getFile().'<br>';
	echo $e->getLine().'<br>';
	print_r($e->getTrace());
}
//таким образом можно создать свой класс с ошибками
//чтобы использовать необходимо указать вместо Exception MyDBException к примеру п. 88 п 94
class MyDbException extends Exception {
	
	public function __construct($str) {
		parent::__construct($str);
		///kod
	}
}
/*
class Exception {
	protected $message;
	protected $code;
	protected $file;
	protected $line;
	protected $trace;
	public function __construct($message = FALSE,$code = FALSE){
		
	}
	// final переопределить нельзя
	final public function getMessage() {
		
	}
	final public function getCode() {
		
	}
	final public function getFile() {
		
	}
	final public function getLine() {
		
	}
	final public function getTrace() {
		
	}
	public function __toString();
	
}
*/

?>