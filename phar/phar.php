<?php
    /*$phar = new Phar('test.phar');
    if (Phar::canWrite()) {
        $phar->startBuffering();
        //$phar->addFile('index.php');
        //$phar->addEmptyDir('newdir');
        $phar['test.php'] = '<?php echo "Hello World!";';
        $phar->stopBuffering();
    }
    else echo 'PHAR-архивы доступны только для чтения!';*/
    $phar = new Phar('mvc.phar');
    if (Phar::canWrite()) {
        $phar->buildFromDirectory('D:/sites/mysite.local/');
        $phar->setDefaultStub('index.php');
    }
    else echo 'PHAR-архивы доступны только для чтения!';

    
?>