<?php
// файл для запуска вывода captcha, ук.в форме index.php

    require_once 'captcha_class.php';
    Captcha::generate(); // вызов статического метода generate, кот. принад.не объекту, а классу, поэтому объект сосдавать не нужно. нужно обратиться к классу и стат.методу generate
?>