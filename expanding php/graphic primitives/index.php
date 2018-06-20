<?php

// создаём холст 
    $im = imagecreatetruecolor(500, 500); //1п.
    
    // берём кисть и краску
    $color = imageColorAllocate($im, 100, 150, 20); // идентификатор цвета 1 парам - im, 2- red,3 green, 4 blue/ числа могут быть от 0 до 255 - размер кисти
    
    // рисуем
    imageSetThickness($im, 3); // толщина рамки px
    imageRectangle($im, 10, 10, 150, 200, $color); // прямоугольник 1 парам- im, и координаты левого верхн. и правого нижн. и посл.парам- цвет
    
    imageFilledRectangle($im, 170, 10, 250, 200, $color); // рисует закрашенный прямоуг.
    
    imageLine($im, 10, 220, 10, 300, imageColorAllocate($im, 255, 0, 0)); // линия с коорд. нач.точки и кон.
    
    imageArc($im, 50, 220, 100, 150, 0, 360, $color); // элипс и окружность. в парам. ук. коорд.прямоуг. в кот. она вписывается. 1 парам.- коорд. левого верх.угла. x- 50 y -220 3 парам ширина  100 и 150 и высота 0  4 парам- угол дуги (отсчет по час.стрелке) 0, 360 5 парам - цвет
    // массив для многоуг.для п.33
    $points = [];
    $points[] = 100; // x 0
    $points[] = 200; // y 0
    $points[] = 150; // x1 
    $points[] = 220; // y1
    $points[] = 250; //  x2
    $points[] = 270; // y2
    $points[] = 350; //  x3
    $points[] = 120; // y3
    $points[] = 250; // x4
    $points[] = 120; // y4
    $points[] = 100; // x5
    $points[] = 200; // y5
    
    imagePolygon($im, $points, 5, imageColorAllocate($im, 255, 0, 0)); // многоугольник. 1 парам- im 2 -массив с точками, 3 парам - кол-во точек 4 -цвет
    //imageFilledPolygon($im, $points, 5, imageColorAllocate($im, 250, 0, 0)); // закрашенный многоуг.
    
    imageSetPixel($im, 400, 50, $color); // цвет произ.px  - x 400 50- y
    
    $color = imageColorAt($im, 400, 50); // цвет px из п.36
    // проверить цвет точки
  /*  print_r(imageColorsForIndex($im, $color));
    /* echo
    Array
(
    [red] => 100
    [green] => 150
    [blue] => 20
    [alpha] => 0
)
    exit;*/
    
    $color = imageColorAllocateAlpha($im, 255, 0, 0, 100); // прозрачность 1 парам im RGB, alpha -100 (может быть от 0 до 127)
    imageFilledRectangle($im, 180, 20, 300, 180, $color); // закрашенный прям.
     
    imageCopyResized($im, $im, 250, 100, 0, 0, 100, 100, 100, 150); // копирует изо 1 парам im -конечн.дескр, x y для обоих, нач.высота и ширина для обоих
    
    imageFill($im, 70, 190, imageColorAllocate($im, 255, 255, 255)); // закр.замкн.обл.1 парам - desc, 2 - любая точка из замкн.обл. цвет закр. - imageColorAllocate($im, 255, 255, 255) 
    // установка цвета в виде текстуры - закр.прямоуг.
    $tile = imagecreatefromjpeg('t.jpg'); // создаём дескр. текстуры
    imageSetTile($im, $tile); // указ.текстуру 1 дескр идёт на изо, 2 на текстуру.
    imageFill($im, 70, 130, IMG_COLOR_TILED); // в парамн ужно попасть в эту обл. и константа IMG_COLOR_TILED
    
    header('Content-Type: image/png');//2п.
    imagePng($im); //3 п.
    imagePng($im, 'image.png'); // 4п. сохранение файла
    imageDestroy($tile); // выход из декс. 
    imageDestroy($im); // удаление дескриптора обяз.
?>