<?php
//функции для работы с директориями

    mkdir('new dir');
    rmdir('new dir');
    
    $arr = glob('*.php');
    print_r($arr);
    
//рекурсивная функция выводит tree dir

    function printDir($folder, $space = '') {
        $files = scandir($folder);
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') continue;
            $f = $folder.'/'.$file;
            echo $space.$file.'<br />';
            if (is_dir($f)) printDir($f, $space.'&nbsp;&nbsp;');
        }
    }
    echo '<br />';
    //printDir('W:\modules\conemu');
    
    
  
?>
