<?
require_once __DIR__ .'/vendor/autoload.php';

// задаём пространство имён
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

 //use Zend\Log\Logger;
 //use Zend\Log\Writer;
// create a log channel/объект логера
$logger = new Logger('DEBUG LOGGER'); // в парам.передаёи имя логера
$logger->pushHandler(new StreamHandler(__DIR__ .'/logs/debug/.log'. Logger::DEBUG)); // добавляем логеру обработчик и уровень лога с помощью константы


$infoLogger = new Logger('INFO LOGGER'); // логгер для хранения других видов ообщений
$infoLogger->pushHandler(new StreamHandler(__DIR__ .'/logs/info/.log'. Logger::INFO)); // добавляем логеру обработчик и уровень лога с помощью константы


// у логера вызываем метод
$logger->debug('First degug message', array('user'=>'admin', 'time'=>date('H:i:s.d.m.Y')));
//$log->error('Bar');
//у нового логера вызываем метод инфо, передаём сообщ.для журнала и контекст.
$infoLogger->info('login user from dashboard', array('user'=>'admin', 'time'=>date('H:i:s d/m/Y')));


?>