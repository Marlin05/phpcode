<?php
    class Test {
        public $x = 5; //свойство x = 5. далее в conctruct принимаем экземпляр этого класса п.10
    }
    class Request {
        
        public $t; //переменная $t является экз. класса Test
        private $data;
        
        public function __construct(Test $t) {
            $this->t = $t; // далее записываем её в объект в п.50
            $this->data = $_REQUEST;
        }
        
        public function __get($name) { //в параметрах свойство name
            if (isset($this->data[$name])) return $this->data[$name];
            return null;
        }
        
        public function __set($name, $value) {
            $this->data[$name] = $value;
        }
        
        public function __isset($name) {  // вернёт  true или false
            return isset($this->data[$name]);
        }
        
        public function __unset($name) { // метод cущ. чтобы перехватить методы кот.не сущ.или к ним нет доступа
            unset($this->data[$name]); //удаления параметра путём удаления ключа в массиве. далее п.79 удаляем свойство a
        }
        
        public function __toString() { // преобразовывает объект  в строку 
            $s = ''; // сформирована строка
            foreach ($this->data as $k => $v) $s .= "$k = $v; ";
            return $s;  // вернёт а = 5
        }
        
        //конструкция clone не создаёт новый объект, только ссылку
        public function __clone() {
            $this->t = clone $this->t; //клонируем также и внутренние объекты, чтобы они не потеряли также взаимосвязь. если не присваивать - вернёт 15
             //$this->a = 15;
        }
        
        public function __call($method, $args) { // вызывается при обращении к несуществующему методу, либо когда метод закрыт mod доступа. если в  get - для свойства, то в call - для методов. в параметрах - метод. аргументы
            echo "$method не существует, поэтому реализовать его не представляется возможным!<br />";
            echo "Переданные параметры: ".print_r($args, true); // выводит как массив через print_r. далее в п.77 обращаемся к объекту request и методу notFound
        }
        
    }
    
    $request = new Request(new Test()); //далее п. 70
    
    echo $request->a.'<br />';
    
    $request->a = 5; 
    echo $request->a.'<br />';
    
    echo isset($request->a).'<br />';
    
    echo $request.'<br />'; 
    
    $r = $request; //ссылка на объект присваивания как жёсткая ссылка только в рамках объекта. в этом случае новый объект не создаётся.
    $request->a = 8; 
    echo $r->a.'<br />';
    
    $r = clone $request; //конструкция помогает создать новый объект
    $request->a = 10; // значение свойства  a меняется, только если создать в public function __clone запись $this->a = 15;
    echo $r->a.'<br />';
    
    echo '---------------------<br />';
    echo $request->t->x.'<br />'; // т.к. t является объектом то точно также обращаемся к x. выводит 5
    $request->t->x = 15; // меняем значение с 5 на 15. присваивание к новому объекту
    echo $r->t->x.'<br />'; // 15
    
    echo '---------------------<br />';
    
    echo $request->notFound(5, 7, 98).'<br />'; // выводит function __call -notFound 
    
    unset($request->a); // теперь, если к нему обратиться  из п.53 echo $request->a. вернёт null благодаря get, если не удалять- 10
    echo $request->b.'<br />';
?>