<?php
    class Test
    {
        public $x = 5;
        public $y = 8;
        private $z = 10;
        protected $pr = -5;
    }
    
    class MyArray implements Iterator // класс реализует интерфейс Iterator/ interface- набор методов кот. подлежат обяз. реализ.
   
    {
        private $arr = ['Name' => 'Michael', 'age' => '26', 'bd' => '11.07.1990'];
        //методы:
        public function rewind() { //сбрасывает итератор
            reset($this->arr); // reset -встр. функ.сбрасыв.вн.указ. в 0
        }
        
        public function current() { //получение тек.эл.
            return current($this->arr);
        }
        
        public function key() { // возвр.тек.ключ
            return key($this->arr);
        }
        
        public function next() { //получение след.части элем.кот.мы должны вывести. next-встр.функ для ас.массива
            return next($this->arr);
        }
        
        public function valid() { // возв.либо true либо false
            //необх.проверить-сущ.ли такой ключ -для этого его пол.сначала
            $key = key($this->arr);
            return ($key !== null && $key !== false);//если ключ не эквивалентен null и false -то true
        }
    }
    // 1 метод перебора без итерации
   /* $test = new Test(); //экз класса
    //стандартный перебор объекта как ас.массива
    foreach ($test as $k => $v) echo "$k = $v; ";
    echo '<br />'; //x = 5; y = 8; */
    
    $arr = new MyArray(); //созд.объект класса
    
    foreach ($arr as $k => $v) echo "$k = $v; ";
    echo '<br />'; //Name = Michael; age = 26; bd = 11.07.1990; 

    
    $dir = new DirectoryIterator('W:\modules\conemu'); // итератор DirectoryIterator принимает путь дир. и перебирает все файлы в ней
    foreach ($dir as $file) {
        echo $file->getFilename();
        if ($file->isFile()) echo ' - '.$file->getSize().' байт'; //если объект явл.файлом то echo
        echo '<br />';
    }
?>