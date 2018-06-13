<?php
    $date = new DateTime();
    echo $date->format('d.m.Y H:i:s').'<br />';
    $date = new DateTime('2017-05-20 12:05:50');
    echo $date->format('d.m.Y H:i:s').'<br />';
    $date->setDate(2018, 7, 25);
    $date->setTime(23, 15, 20);
    echo $date->format('d.m.Y H:i:s').'<br />';
    $date->setTimezone(new DateTimeZone('Europe/Moscow'));
    echo $date->getTimezone()->getOffset($date).'<br />'; // запрос к п 9 чтобы узнать разницу ч.поясов->у класса DateTimeZone вызываем метод offset // смещение в сек.10800 -3ч.
    
    $date_1 = new DateTime();
    $date_2 = new DateTime('2017-05-20 12:05:50');
    $interval = $date_2->diff($date_1); //функ.diff-разница 
    //дат. вычитание из d2 -d2
    print_r ($interval);

    /* echo
    14.06.2018 01:05:52
    20.05.2017 12:05:50
 (
    [y] => 1 //разница в годах
    [m] => 0 //месяц
    [d] => 24 //день
    [h] => 13 //час
    [i] => 0
    [s] => 2
    [weekday] => 0
    [weekday_behavior] => 0
    [first_last_day_of] => 0
    [invert] => 0
    [days] => 389
    [special_type] => 0
    [special_amount] => 0
    [have_weekday_relative] => 0
    [have_special_relative] => 0
)*/
    print_r($interval);
    echo '<br />'.$interval->days.'<br />';
    
    $interval = new DateInterval('P2Y1M5DT5H10M15S');// объект клласа DI, где P-число 2 года 1 мес 5 дн. Т-время 5ч 10 м 15 сек
    
    $date_1->add($interval); //прибавляем к тек.дате
    echo $date_1->format('d.m.Y H:i:s').'<br />';
    
    $date = new DateTime();
//итэратор период
    $interval = new DateInterval('PT1H'); //интервал 1 ч.
    $period = new DatePeriod($date, $interval, 5); //принимает дату, п.48 и какое кол-во шагов будет
    foreach ($period as $datetime) echo $datetime->format('d.m.Y H:i:s').'<br />';
?>