<?php

class View {
    
    private $dir_tmpl; // сво-во ук.путь к дир.
    
    public function __construct($dir_tmpl) { // приним.путь к дир.
        $this->dir_tmpl = $dir_tmpl; // записыв. его в сво-во обьекта
    }
    // принимаем tmplфайл для вывода:
    public function render($file, $params, $return = false) {
        $template = $this->dir_tmpl.$file.'.tpl'; // получаем путь к файлу полный - дир. имя файла. .tpl- все файлы будут иметь такое расш.
        extract($params); // передаём все парам. функция позв. преобраз. массив из п.11 в перем. пример: а=7 b=9 перем-а, b / эл.с ключём title в  arr преобр.в перем. которая передаётся в main.tpl
        ob_start(); // запускаем входной поток (трубу)
        include($template); // подкл. получивш.файлик с конечной строкой в буфере
        // либо возвр.стр либо вывод в брауз.:
        if ($return) return ob_get_clean(); // если return мы берём строку из трубы буфера и заодно очищаем. т.е. возвр.сод.буфера
        echo ob_get_clean(); // если return не указ. то вывод стр. и очищ.буфера.
    }
    
}

?>