<?php

// выводит все стр.
class Page {
	//свойства
	public $title;
	public $content;
	public $footer;
	
	// инициализируем переменные в парам.
	public function __construct($t,$c,$f) {
		$this->title = $t;
		$this->content = $c;
		$this->footer = $f;
		
	}
	//метод вывода свойств на экран
	public function render_body() {
		$str = '<h1>'.$this->title.'</h1>';
		$str .= '<p>'.$this->content."</p>";
		$str .= "<p style='font-size=8px'>".$this->footer."</p>";
		
		return $str;
	}
	// переадр.на метод r_b
	public function test() {
		return $this->render_body();
	} 
	
	
}
// выводит гл.стр
class Index extends Page {
	public $slide;
	public $news;
	
	public function __construct($t,$c,$f,$s,$n) {
		parent::__construct($t,$c,$f);
		$this->slide = $s;
		$this->news = $n;
		
	}
	//расширяем функционал род.класса
	//вызяваем род.метод и сохр.его в вспом.пер.$str
	public function render_body() {
		$str = parent::render_body();
		$str.="<p>".$this->slide."</p>";
		$str.="<p>".$this->news."</p>";
		
		return $str;
	}
	
	
}
//полиморфизм
class Poly {
	public $ob; // класс хранит объекты других  классов
	//метод запис.свойства объектов
	// в пар.перед. имя класса Page и имя пер.в кот.попадёт сам объект
	// т.е. в пер. var попадёт объект только класса Page
	public function get_ob(Page $var) {
		$this->ob[] = $var;// присваиваем св-ву ob знач.пер.var /ob это arr т.к. объектов может быть оч.много
	}
	//метод выводит рез.работы класса Poly
	public function get_result() {
		foreach($this->ob as $item) {
			echo $item->test();// после итер. выз.метод test
		}
	}
}


class X {
	public function get() {
		echo 'This is X';
	}
	//переадр.на метод get
	public function render() {
		$this->get();
	}
}
// переопр.метод get
class Y extends X {
	public function get() {
		echo 'This is Y';
	}
}

class C extends Y {
	public function get() {
		echo 'This is C';
	}
}


$x = new X();
$y = new Y();
$c = new C();

//$x->get();
//$x->render();
//$y->get();
//$y->render();
//$c ->render();
//$c ->get();


class spec {
	public $a;
	protected $b='spec';
	private $_c = 'private';
	private $db;
	
	protected function connect() {
		$this->db = mysql_connect('host','iser','123');
	}
// через метод get vj;yj dspdfnm $b п.134
	public function get() {
		echo $this->b;
	}
}

class test extends spec {
	public function get2() {
		echo $this->c;
	}
}

// объекты классов

$spec = new spec();
$test  = new test();

$spec->get();
//echo '1';
/*$test->get2();
echo '1'; 
*/

$poly = new Poly();

$page = new Page('Page','hello i am page','footer');
//echo $page->render_body();

$index = new Index ('INDEX','HELLO I am index','footer','slide_show','news');
//echo $index->render_body();



$poly->get_ob($page);
$poly->get_ob($index);


$poly->get_result();

// вызываем метод r-b но т.к. он у каждого класса свой реал.эффект полиморфизма
echo $index->render_body();


?>