<?php
    require_once 'start.php';
    Route::start();

    /*$phar = new Phar('test.phar');
    if (Phar::canWrite()) {
        $phar->startBuffering();
      //  $phar->addFile('index.php');
        //$phar->addEmptyDir('newdir');
        $phar['red.txt'] = '"Hello World!"';
        echo 'Кол-во элементов в архиве: '.$phar->count().'<br />';
        //$phar ->delete('red.txt');
        echo 'Кол-во элементов в архиве: '.$phar->count().'<br />';
       // $phar->compress(PHAR::BZ2);
       // $phar->compress(PHAR::GZ);


        $phar->stopBuffering();
    }
    else echo 'PHAR-архивы доступны только для чтения!';
    require_once 'phar://test.phar/red.txt';*/

    
?>