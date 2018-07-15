<?php

$a = 100;
$b =12.7; // дробь -float
$c = 'Howdy Ho!'; // строка - string, str
$d = "Howdy Ho!"; // string, str
$e = array(
'Jonny',
'Flame',
'Abraham',
'Walker'
); // массив - array
$f = array(
'name' => 'Abraham',
'surname' => 'Tugalov',
'age' => 20,
'byear' => 1996,
 'education' => array('school in 2003', 'college in 2013'),
'married' => false,
'smoking' => false,
'geek' => true
	); // многомерный массив - array
$j = false; // boolean, bool
echo $f['education'][0];

