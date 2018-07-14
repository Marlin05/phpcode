<?php
use PHPUnit\Framework\TestCase;

require_once 'D:/sites/mysite.local/www/rus/Calculator.php';

class CalculatorTest extends TestCase
{
    
    protected $calc;
    
    protected function setUp()
    {
        $this->calc = new Calculator();
    }
    
    protected function tearDown()
    {
        $this->calc = null;
    }
    
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
        $this->assertEquals(10, $this->calc->sum(5, 5));
        $this->assertEquals(5, $this->calc->sum(5, 0));
        $this->assertEquals(0, $this->calc->sum(0, 0));
        $this->assertEquals(-8, $this->calc->sum(-5, -3));
    }
    
    public function testThree() {
        $this->assertEquals(10, $this->calc->div(20, 2));
        $this->assertEquals(0, $this->calc->div(0, 10));
        //$this->assertFalse($this->calc->div(5, 0));
        $this->assertTrue(true);
    }
    
    public function testFour()
    {
        $this->setExpectedException('Exception');
        $this->calc->div(5, 0);
    }
    
}
?>
