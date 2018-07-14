<?php

class Calculator
{
    public function sum($a, $b)
    {
        return $a + $b;
    }
    
    public function div($a, $b)
    {
		// if ($b == 0) return false 
        if ($b == 0) throw new Exception(); // чтобы вызвать искл. 
        return $a / $b;
    }
}
?>
