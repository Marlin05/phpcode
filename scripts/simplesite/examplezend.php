<?
require_once __DIR__ .'/vendor/autoload.php';


// задаём пространство имён

  use Zend\Log\Logger;
  use Zend\Log\Writer\Stream; 
  
 //use Zend\Log\Logger;
 //use Zend\Log\Writer;
// create a log channel/объект логера
$logger = new Logger(); // в парам.передаёи имя логера
/*$logger->pushHandler(new StreamHandler(__DIR__ .'/logs/debug/.log'. Logger::DEBUG)); // добавляем логеру обработчик и уровень лога с помощью константы*/
// отправляем  ошибки в консоль
  $writer = new Stream ('zend.log');
  $logger-> addWriter ($writer);
   $logger -> log(Logger::INFO,'Некая информация');
  

 

?>