<?php
     //class Shape { // если фигура непонятная или объекты не будут создаваться, то в таком случае лучше использовать abstract class . 
        
        protected $x; //координаты всех фигур
        protected $y; //метод protected доступен во всех доч. классах в отл от privite
        
        public function __toString() { // добавлена новая функция/ этот полиморфизм будет работать везде по разному при вызове  echo $доч.класс;
           return print_r($this, true); // мы хотим вывести объект $this
        }
        
    }*/


    abstract class Shape { // абстрактный класс не может создавать объекты. нельзя написать $shape = new Shape(); сущ. только для создания доч.классов
        
        abstract public function draw();  // вместо  public function draw () {} метод в обяз.порядке будет реал.в доч.классах. т.е. метод должен быть реал. но конкретная реал.будет в доч классе через public function draw() 
        protected $x; //координаты всех фигур
        protected $y; //метод protected доступен во всех доч. классах в отл от privite
        
        public function __toString() { // добавлена новая функция/ этот универсальный полиморфизм будет работать везде по разному при вызове  echo $доч.класс;
           return print_r($this, true); // мы хотим вывести объект $this
        }
        
    }
    
    class Circle extends Shape { // класс Circle - дочерний класс Shape. берём все св-ва и методы род класса. при этом можем поменять и их сво-ва и методы реал.,добавлять новые методы.
        
        private $r; //защищённое сво-во
        
        public function __construct($x, $y, $r) {
            $this->x = $x; //в методе принимаем 3 параметра и записываем в кач. св-в объекта
            $this->y = $y;
            $this->r = $r;
        }
        
        public function draw() { // реализация метода draw, если класс создаёт объекты и abstruct
            echo 'Рисуем окружность с координатами центра '.$this->x.' и '.$this->y;
            echo '<br />Радиус '.$this->r; //обращаемся к методам protected
        }
    }
    
    class Rectangle extends Shape {
        
        private $w;
        private $h;
        
        public function __construct($x, $y, $w, $h) {
            $this->x = $x; 
            $this->y = $y;
            $this->w = $w;
            $this->h = $h;
        }
        
        public function draw() {
            echo 'Рисуем прямоугольник с координатами левого верхнего угла '.$this->x.' и '.$this->y;
            echo '<br />Ширина '.$this->w.', Высота '.$this->h;
        }
    }
    //создаём объекты классов
    $circle = new Circle(5, 8, 10);
    $rect = new Rectangle(20, 20, 40, 10);
    $r = new Rectangle(210, 220, 430, 102);
    $list = [$circle, $rect, $r]; // помещаем в массив
    // перебираем массив, чтобы вызвать метод draw и вывести список
    foreach ($list as $l) {
        //в ситуации когда есть drawRect, drawCircle т.е. разные названия
        //if ($l instanceof Circle) $l->drawCircle(); // оператор instanceof проверяет принадлежность переменной к какому-то классу - является ли пер.$l объектом класса Circle. если он является $l->drawCircle(); то вызываем метод elseif/ прим. нужно заком. п.16 и п.69
        //elseif ($l instanceof Rectangle) $l->drawRect();
        $l->draw();
        echo '<br />';
        
    }
   // echo $circle;
?>