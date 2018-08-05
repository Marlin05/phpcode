<?php
    $reg = '/a \dM/';  //буква а любое число буква М
    $str = 'a 8M';
    echo preg_match($reg, $str, $matches);//$matches -массив  
    echo '<br />';
    print_r($matches);
    $str = 'a M';
    echo preg_match($reg, $str);
    
    $reg = '#a \d b#'; // \d любая цифра
    $str = 'abca 8 b3333'; // хоть сколько цифр, главное, чтобы были совпадения
    echo '<br />'.preg_match($reg, $str);
    
    $reg = '#a \D b#';  // /D не является любой цифрой
    $str = 'abca   b3333';
    echo '<br />'.preg_match($reg, $str);
    
    $reg = '#a \w b#'; //любая буква или цифра
    $str = 'abca d b3333';
    echo '<br />'.preg_match($reg, $str);
    
    $reg = '#a \W b#'; //не является любой буквой или цифрой
    $str = 'abca   b3333';
    echo '<br />'.preg_match($reg, $str);
    
    $reg = '#a \s b#';  // все пробельные символы- возвраты каретки, табуляция
    $str = "abca \t b3333";
    echo '<br />'.preg_match($reg, $str);
    
    $reg = '#a \S b#';  //не является табуляцией
    $str = "abca d b3333";
    echo '<br />'.preg_match($reg, $str);
    
    $reg = '#a \n b#'; //переход на новую строку
    $str = "abca \n b3333";
    echo '<br />'.preg_match($reg, $str);
?>