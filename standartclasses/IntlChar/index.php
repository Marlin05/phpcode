<?php

// класс для работы с символами. состоит из статических методов т.е. не нужно никаких объектов и обращение прямо к классу:
// на сервере нужно раском. расш. intl в php.ini
    echo IntlChar::ord('N').'<br />'; // получение кода символа N (78) ном.по алфавиту. статический метод ord класса IntlChar
    echo IntlChar::chr(1070).'<br />'; // обратный метод // echo Ю
    echo IntlChar::isalnum('5').'<br />'; // проверяет- является переданный символ строкой или цифрой.true- 1 
    echo IntlChar::isalnum('v').'<br />'; // 1
    echo IntlChar::isalnum(' ').'<br />'; // false - 0
    echo IntlChar::isalpha('5').'<br />'; // является ли символ буквой
    echo IntlChar::ispunct(',').'<br />'; // знак препинания
    echo IntlChar::isspace(' ').'<br />'; // пробел
    echo IntlChar::islower('d').'<br />'; // нижний регистр
    echo IntlChar::islower('D').'<br />'; // false 0
    echo IntlChar::isupper('d').'<br />'; // является ли верхним рег.
    echo IntlChar::isupper('D').'<br />'; // false
?>