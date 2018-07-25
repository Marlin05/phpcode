<?php

// setcookie('test', 'My Value', time()+3600*24);
/*setcookie('test', '', time() - 3600);
setcookie('test2', '', time() - 3600, '/');

echo $_COOKIE['test'];
echo '<br>';
echo $_COOKIE['test2'];*/

isset($_COOKIE['counter']) ? setcookie('counter', ++$_COOKIE['counter'], time()+3600, '/') : setcookie('counter', 1, time()+3600, '/');

echo isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 1;