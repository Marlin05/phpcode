<?php

// интерфейсы-нечто напоминающее класс позволяют наследовать несколько классов. описывают те методы, которые должны быть реализованы в классах путём implements 
//в интер указ.тот функционал, кот.будет рел.в классах.
//отличие интер от наследования- класс может насл.только 1 класс род.типа так:
// class Circle extends Shape, Point { в отличии от интер п.16
    interface Draw {
        // внутри описываем все методы, которые должны быть реализованы в классах наследующие
        public function draw(); //в interface все методы реализации не имеют. данный интер реал с помощью implements и название интер 
        //если есть род.классы то зап.будет :
        // class Circle extends Shape implements Draw { т.е после объяв класса род.(Shape) метод не реал. из интер. 
        	
        //все написанные методы в интер. ниже в классах должны быть реал. либо в классах можно указать  public function draw() {}
    }
 	interface Log {
   		    public function log();
		}
 //abstract class Shape implements Draw, Point, Test { - так можно нап.,только указать функционал вначале интер. все методы должны иметь реал.
    
    abstract class Shape implements Draw, Log { //реал. интер.в классе Shape нет т.к. класс абстр.
        
        protected $x;
        protected $y;
        
        public function __toString() {
            return print_r($this, true);
        }
        
    }
    
    class Circle extends Shape {
        
        private $r;
        
        public function __construct($x, $y, $r) {
            $this->x = $x;
            $this->y = $y;
            $this->r = $r;
        }
        
        public function draw() {//реал.метода
            echo 'Рисуем окружность с координатами центра '.$this->x.' и '.$this->y;
            echo '<br />Радиус '.$this->r;
        }
        public function log() {}
        
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
          public function log() {} //обяз.доб.либо будет er.: Class Rectangle contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Log::log) 
    }
    
    $circle = new Circle(5, 8, 10);
    $rect = new Rectangle(20, 20, 40, 10);
    $r = new Rectangle(210, 220, 430, 102);
    $list = [$circle, $rect, $r];
    foreach ($list as $l) {
        //if ($l instanceof Circle) $l->drawCircle();
        //elseif ($l instanceof Rectangle) $l->drawRect();
        $l->draw();
        echo '<br />';
    }
?>