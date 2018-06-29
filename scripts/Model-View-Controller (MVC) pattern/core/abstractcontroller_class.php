<?php

// все контр.кот.будут создаваться будут насл.от этого:
abstract class AbstractController {
    
    protected $view; // защищённое свойство, оно отвечает за класс class View в core

    
    public function __construct($view) { // в конструктор передаём view
        $this->view = $view; // сохраняем в сво-во
    }
    // доп.: внешний вид 404 может опред. внутр.контр. кот будет доч.классом.
    // но заголовки можно отправлять в род.
    public function action404() {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
    }
    //опысываем метод, кот.будет в каждом дочерн.классе реал.
    abstract protected function render($str); // некая стр.кот.перед.на рендеринг и она будет выводить в брауз. в завис.от шаблона в tplfile кот.будет нах. в template
}

?>