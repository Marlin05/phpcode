<?php
// класс занимается подгрузкой методов Last и IWidgets
class Render {
	public $dir;
	public $name; // хранит имя виджетов
	public $content;
	// передаём в констр. папку classes и с пом. фун всё сод попадёт как ячейки arr для dir
	public function __construct($dir) {
		if(is_dir($dir)) {
			$this->dir = scandir($dir); // записываем сод. dir ,функция scandir возвр arr сод dir
			//print_r($this->dir); // в index.php echo
			// Array ( [0] => . [1] => .. [2] => Archive.php [3] => IWidgets.php [4] => Last.php [5] => Menu.php )
		}
		else {
			exit('Wrong dir');
		}
		//$this->get_name(); вызываем метод
	}
	// откинем ненужные ячейки  . ..  IWidgets.php чтобы работать только с файлами виджета
	public function get_name() {
		foreach($this->dir as $item) {
			if($item == '.' || $item == '..' || $item == 'IWidgets.php') {
				continue;
			}
			$this->name[] = $item; // в сво-во записываем Last.php  Menu.php )
			
		}
		//print_r($this->name);
	}
	public function get_widgets() {
		$this->get_name();
		foreach($this->name as $file) {
			$class = basename($file,'.php'); // передаёт файл без расширения
			
		//echo $class; // ArchiveLastMenu
			$ob = new $class; // создаём объект
			// проверяем что этот объект принадлежит классу кот. унасл.интерфейсу Iwiget
			if($ob instanceof IWidgets) {
				$ob->init();
				$this->content[] = $ob->get_body(); // в сво-во записываем метод get-body кот.возвр. content
				
				unset($ob); // удаляем т.к. на след. итерации снова созд.объект
			}
			else {
				unset($ob);
				continue;
	     	}
		}
		$this->view();
	}
	
	protected function view() {
		foreach($this->content as $item) {
			echo '<div style="border:1px solid #074776;width:200px; padding:20px">';
				foreach($item as $result) {
					echo '<p>'.$result.'</p>';
				} 
			echo '</div>';
		}
	}
}
?>