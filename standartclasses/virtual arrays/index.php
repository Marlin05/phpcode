<?php
//виртуальный массив-обращение к объекту класса как к массиву

    class MyArray implements ArrayAccess //обращение к ArrayAccess
    {
        private $arr = []; //внутр.массив arr
        //методы
        public function offsetExists($offset) { //проверка сущ.эл. аналог isset ($arr['3']);  метод offsetExists задаёт эл.с индексом $offset
            return isset($this->arr[$offset]); //проверяем -есть такой эл.в массиве или нет. возвращаем рез.оператора isset для массива arr и передаём ключ offset кот передаст пользователь
        }
        //метод получения значения по ключу
        public function offsetGet($offset) {
            return $this->arr[$offset];//возвращаем элемент из внутреннего arr п.6
        }
        //установка значения
        public function offsetSet($offset, $value) {
            $this->arr[$offset] = $value;
        }
       //метод удаления эл. offset - (смещение) 
        public function offsetUnset($offset) {
            unset($this->arr[$offset]);
        }
        
    }
    //использование. создаём объект - переменную $a
    $a = new MyArray(); 
    $a['Name'] = 'Michael'; //добавление эл.
    $a['Age'] = 26; // +1 
    echo $a['Name'].' - '.$a['Age'].'<br />'; //вывод обоих эл.
    echo isset($a['Name']).'<br />'; // проверка на сущ. эл. - здесь мы обращаемся к эл. так как-будто это обычный массив! хотя на самом деле этого массива нет -это объект. // echo 1
    unset($a['Name']); // удаление
    echo isset($a['Name']).'<br />';


?>