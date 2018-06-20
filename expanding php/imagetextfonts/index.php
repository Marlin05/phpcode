<?php
    $im = imagecreatetruecolor(500, 500);
    
    $text = 'Hello World!';
    imageTtfText($im, 15, 50, 100, 100, imagecolorallocate($im, 255, 255, 0), 'fonts/times.ttf', $text); // функция для вывода стр. 1 парам im размер - 15 угол градуса -50  x - 100 y -100 (x y показывают левый нижн.угл) цвет - imagecolorallocate($im, 255, 255, 0) путь к файлу со шрифтами-fonts/times.ttf' текст из п.6 -  $text
    $text = 'Русский текст';
    imageTtfText($im, 15, 50, 100, 300, imagecolorallocate($im, 255, 255, 0), 'fonts/times.ttf', htmlentities($text));
    // функция htmlentities - преобраз. в utf-8
    
    header('Content-Type: image/png');
    imagePng($im);
    imageDestroy($im);
?>