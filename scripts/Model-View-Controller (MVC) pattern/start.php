<?php

// описываем конст. и где подкл.файлы

    set_include_path(get_include_path().PATH_SEPARATOR.'core'.PATH_SEPARATOR.'controllers'); // функция автозагр.классов
    // et_include_path() - прописан в php.ini далее ук.что ещё в папке core и controllers нужно поискать
    spl_autoload_extensions('_class.php'); // расширения классов кот.нужно искать
    spl_autoload_register();
    define('DIR_TMPL', 'D:/sites/mysite.local/tmpl/');
    define('MAIN_LAYOUT', 'main'); // общий вид страницы
?>