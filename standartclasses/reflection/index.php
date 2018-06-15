<?php

//отражения
    class User {
        
        public $x = 5;
        
        public function getX() {
            return $x;
        }
    }
    
    $obj = 'DateTime';
    $obj = new $obj(); // аналог записи $obj = new DateTime();
    if ($obj instanceof DateTime) echo $obj->format('Y.m.d H:i:s'); // проверка: если obj DateaTime echo - дата
    
    $rc = new ReflectionClass('ReflectionMethod'); // в классе RC в кач.параме.передаём имя класса кот.хотим исследовать
    echo $rc.'<br /><br />'; // вывод инфо о классе
    
    $rc = new ReflectionClass('User');
    echo $rc->getStartLine().'<br />'; // вызов метода класса RC из описания/ для вывода необходимо создать класс User п.2 и п. 18 // echo 2 строка
    echo $rc->getEndLine().'<br />'; // где класс завершает работу echo 9
    $pr = $rc->getProperty('x'); // иссл. свойств echo ReflectionProperty Object ( [name] => x [class] => User ) 

    print_r($pr);
    echo '<br />';
    $m = $rc->getMethod('getX'); // иссл.методов необх. создать п.6 'getX'-передаём имя в виде строки
    print_r($m); // объект явл.объектом класса RM echo ReflectionMethod Object ( [name] => getX [class] => User ) 
    echo '<br />';
?>