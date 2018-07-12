<?
require_once __DIR__ .'/vendor/autoload.php';


  use Zend\Db\Adapter\Adapter as DbAdapter; 
  use Zend\Log\Formatter; 
  use Zend\Log\Writer; 
  use Zend\Log\Logger; 


/*$adapter = new DbAdapter($driverArray);

 $adapter = new Zend\Db\Adapter\Adapter(array(
    'driver' => 'Mysqli',
    'database' => 'localhost',
    'username' => 'root',
    'password' => ''
 ));
*/

  // Адаптер базы данных 
  $db = new DbAdapter([ 
      'driver'   => 'Pdo', 
      'dsn'      => 'mysql:dbname=mysite-local;host=localhost', 
      'username' => 'root', 
      'password' => 'пароль' 
  ]); 



  /* define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysite-local');
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // @ оператор откл.ош.
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');// св-во connect_errno - если есть ош - выход 
    $mysqli->set_charset('utf8'); 
    
    $mysqli->close();
*/


  
// соответствие полей события лога (поля события лога разбирали в предыдущей статье) 
  // колонкам в базе данных, т.е. например, поле времени timestamp из лога 
  // соответствует колонке date в базе 
  $mapping = [ 
      'timestamp' => 'date', 
      'priority'  => 'type', 
      'message'   => 'event', 
  ]; 
   
   
  // создаем объект писателя (Writer) со следующими параметрами 
  // 1) $db - адаптер базы данных 
  // 2) 'log' - таблица логов в базе 
  // 3) $mapping - карта соответствия 
  $writerDb = new Writer\Db($db, 'log', $mapping); // log table 
   
  // объект форматера 
  $formatter = new Formatter\Base(); 
   
  // используется, для преобразования даты события в формат даты MySQL 
  $formatter->setDateTimeFormat('Y-m-d H:i:s'); 
  $writerDb->setFormatter($formatter); 
   
   
  // запись лога в файл  
  $writerFile = new Writer\Stream(__DIR__ . '/test.log'); 
   
   
  // создаем объект класса Logger и регистрируем в нем  
  // объекты "писателей" 
  $logger = new Logger(); 
   
  // объект, пишущий лог в базу данных 
  $logger->addWriter($writerDb, 1); 
   
  // объект, пишущий лог в файл  
  $logger->addWriter($writerFile, 100); 
   
   
  // сообщение лога 
  $logger->info('Informational message');  


  
 

?>