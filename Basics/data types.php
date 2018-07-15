<?php

error_reporting(-1);

// $this = '123';

$var = 'pencil';

/*
boolean: true | false
integer
float
string
*/

/*
$var = true;
// var_dump($var);
// echo gettype($var);
*/

/*
$int = 10;
var_dump($int);
*/

/*
$fl = 1.2;
var_dump($fl);
*/

/*$var = 10;
$str = 'This is \'string\'. $var';

$str2 = "This is \"string\". $var";*/
// var_dump($str2);
// HEREDOC
// NOWDOC

$str3 = <<<HERE
This is "string". $var
HERE;

$str4 = <<<'HERE'
This 'is' "string". $var
HERE;

echo $str3; // This is "string". pencil
echo '<br>';
echo $str4; // This 'is' "string". $var
echo '<br>';

$string = 'Я';

$here = <<<HERE
    Здесь был $string! // Выведет на экран Здесь был Я!
HERE;

$now = <<<'NOW'
    Здесь был $string! // Выведет на экран Здесь был $string!   
NOW;


echo $here; // Здесь был Я! // Выведет на экран Здесь был Я!

echo '<br>';
echo $now; // Здесь был $string! // Выведет на экран Здесь был $string!