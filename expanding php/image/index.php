<?php
    $data = getimagesize('a.jpg'); // получение данных
    //print_r($data);
    // echo Array
/*(
    [0] => 1920 // ширина 
    [1] => 1200 // высота
    [2] => 2 // тип. 2 соотв. jpeg 1 - gif 3 - png
    [3] => width="1920" height="1200"
    [bits] => 8
    [channels] => 3
    [mime] => image/jpeg
)*/
// просто вывести html 
// <img scr='a.jpg'/>

// получить картинку из обращ. через index.php- создаём холст и пом.изо.:

    $im = imagecreatefromjpeg('a.jpg'); // дескриптор $im аналог $f = fopen ('a.txt', 'r'); / функ.генер.изо из jpeg 
    header('Content-Type: image/jpeg'); // в кач.знач. посыл.заг.
    imageJpeg($im); // отсылает данные в брауз. из п. 20 
    // коорд.из нач. с левого верхн.угла
    /*echo imageSX($im).'<br />'; // ширина изо
    echo imageSY($im).'<br />';
    imageJpeg($im, 'b.jpg');*/ // функ.может выводить в брауз.так и сохр. в файл (size сжимается)
    
    imageDestroy($im); // обяз.функ. осв.память аналог fclose ();
?>