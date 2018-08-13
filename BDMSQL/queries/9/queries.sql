-- 1 вычисляется один раз для каждого запроса и дата не меняется после SLEEP
SELECT NOW();

-- 2
SELECT SYSDATE();

-- 3 вычисляется 1 раз
SELECT CURRENT_TIMESTAMP;

-- 4
SELECT NOW() + 0;

-- 5
SELECT NOW(), SLEEP(2), NOW();

-- 6
SELECT SYSDATE(), SLEEP(2), SYSDATE();

-- 7
SELECT CURDATE(); -- CURRENT_DATE

-- 8
SELECT CURTIME(); -- CURRENT_TIME

-- 9
SELECT odate, DAYOFWEEK(odate) FROM orders;

-- 10 чтобы не подсчитывать день недели в дате
--Возвращает индекс дня недели для аргумента date
-- (1 = воскресенье, 2 = понедельник, ... 7 = суббота).
-- Эти индексные величины соответствуют стандарту ODBC.
SELECT DAYOFWEEK(NOW());

-- 11
SELECT odate, WEEKDAY(odate) FROM orders;

-- 12 берёт последнее число в дате т.е. день  недели
SELECT odate, DAY(odate) FROM orders; -- DAYOFMONTH()

-- 13
SELECT DAYOFYEAR(NOW());

-- 14
SELECT odate, MONTH(odate) FROM orders;

-- 15
SELECT DAYNAME(NOW());

-- 16 
SELECT @@lc_time_names;

-- 17  установить локаль
SET lc_time_names = 'ru_Ru';

-- 18
SELECT MONTHNAME(NOW());

-- 19
SELECT DAY(NOW()), MONTHNAME(NOW());

-- 20
SELECT CONCAT_WS(' ', DAY( NOW()), MONTHNAME(NOW())) AS date;

-- 21 квартал
SELECT QUARTER(NOW());

-- 22
SELECT odate, YEAR(odate) FROM orders;

-- 24
SELECT NOW(), HOUR(NOW());

-- 25
SELECT NOW(), MINUTE(NOW());

-- 26
SELECT NOW(), SECOND(NOW());

-- 27 3/03/2012
SELECT NOW(), DATE_FORMAT(NOW(), '%e/%m/%Y');

-- 28 3 марта 2012
SELECT NOW(), DATE_FORMAT(NOW(), '%e %M %Y');

-- 29
SELECT PERIOD_ADD(DATE_FORMAT(NOW(), '%Y%m'), 2);

-- 30
SELECT PERIOD_ADD(201203, 2);
-- выводит дату +7 мес.
SELECT odate, date_format(odate, '%Y%m'), period_add (date_format(odate, '%Y%m'),7) from orders;
-- 31 возвращает разницу между годами
SELECT PERIOD_DIFF(201205, 201203);

-- 32
SELECT NOW(), ADDDATE(NOW(), INTERVAL 1 SECOND);

-- 33
SELECT NOW(), ADDDATE(NOW(), INTERVAL 2 MINUTE);

-- 34 добавить 2 мин. и 5 сек.
SELECT NOW(), ADDDATE(NOW(), INTERVAL '2:5' DAY_HOUR);

-- 35
SELECT NOW(), NOW() + INTERVAL 1 HOUR;

-- 36
SELECT NOW(), NOW() - INTERVAL 1 HOUR;

-- 37
SELECT NOW(), SUBDATE(NOW(), INTERVAL 2 HOUR);

-- 38 + 10 дней
SELECT NOW(), ADDDATE(NOW(), 10);

-- 39 +10 дней
SELECT NOW(), SUBDATE(NOW(), 10);

-- 40
SELECT NOW(), EXTRACT(MINUTE FROM NOW());

-- 41 час, минута
SELECT NOW(), TIME_FORMAT(NOW(), '%H:%i');

-- 42 1 мин из 60 сек
SELECT SEC_TO_TIME(60);

-- 43
SELECT TIME_TO_SEC('1:00:00');

-- 44
SELECT NOW(), DATE(NOW());

-- 45
SELECT NOW(), TIME(NOW());