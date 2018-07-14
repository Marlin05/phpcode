<?php

class Calculator
{
    public function sum($a, $b)
    {
        return $a + $b;
    }
    
    public function div($a, $b)
    {
        if ($b == 0) throw new Exception();
        return $a / $b;
    }
}
?>