<?php
use PHPUnit\Framework\TestCase;

require_once 'D:/sites/mysite.local/www/rus/Point.php';
// создаём ещё один тест, чтобы запустить вместе c Calculator.php

class PointTest extends TestCase
{
    //  2 точки
    protected $p_1;
    protected $p_2;
    
    protected function setUp()
    {
		// задаём координаты
        $this->p_1 = new Point(0, 0); 
        $this->p_2 = new Point(3, 4);
    }
    // обнуляем объекты, чтобы не занимали места
    protected function tearDown()
    {
        $this->p_1 = null;
        $this->p_2 = null;
    }
    
    // проверим эквивалентность вызова метода
    public function testOne()
    {
        $this->assertEquals(5, $this->p_1->dist($this->p_2)); // число 5 итоговое расчёта по формуле
        // вызываем метод dist и передаём объект 2
    }
    
}
?>
