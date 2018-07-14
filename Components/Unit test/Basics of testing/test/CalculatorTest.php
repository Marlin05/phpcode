<?php
use PHPUnit\Framework\TestCase;

// require_once 'полный путь к файлу Calculator.php';

class CalculatorTest extends TestCase
{

    public function testOne()
    {
        $this->assertEquals(5, 5);
        $this->assertEquals(5, 5);
        $this->assertNotEquals(5, 4);
        $this->assertNull(null);
        $this->assertNotNull(0);
        $this->assertGreaterThan(5, 7);
        $this->assertLessThan(7, 5);
        $this->assertContains(4, [1, 2, 3, 4]);
    }
    
    public function testTwo()
    {
        $calc = new Calculator();
        $this->assertEquals(10, $calc->sum(5, 5));
        $this->assertEquals(5, $calc->sum(5, 0));
        $this->assertEquals(0, $calc->sum(0, 0));
        $this->assertEquals(-8, $calc->sum(-5, -3));
    }
    
    public function testThree() {
        $calc = new Calculator();
        $this->assertEquals(10, $calc->div(20, 2));
        $this->assertEquals(0, $calc->div(0, 10));
        $this->assertFalse($calc->div(5, 0));
        $this->assertTrue(true);
    }
}
?>